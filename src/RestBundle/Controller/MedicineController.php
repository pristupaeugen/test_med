<?php

// src/RestBundle/Controller/MedicineController.php
namespace RestBundle\Controller;

use AppBundle\Event\RemoveFromUserListEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use FOS\RestBundle\Controller\FOSRestController;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use RestBundle\Exception\MedicineNotExistException;
use RestBundle\Exception\ParamNotExistException;

use AppBundle\Event\AddToUserListEvent;


/**
 * Class MedicineController
 * @package RestBundle\Controller
 */
class MedicineController extends FOSRestController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Pharmacist",
     *  description = "Get medicines list",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  output={
     *    "class"      = "AppBundle\Entity\Drug",
     *    "collection" = true
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required"
     *   }
     * )
     */
    public function getMedicinesAction(Request $request)
    {
        $em        = $this->getDoctrine()->getManager();
        $medicines = $this->get('security.token_storage')->getToken()->getUser()
                          ->getMedicines();

        return $medicines;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Pharmacist",
     *  description = "Add medicine to my list",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  parameters={
     *      {"name"="id", "dataType"="integer", "required"=true, "description"="It is medicine id"}
     *  },
     *  output={
     *    "class"      = "AppBundle\Entity\Drug",
     *    "collection" = true
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required",
     *     404 = "Medicine doesn't exist"
     *   }
     * )
     */
    public function addMedicineAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if (empty($data['id'])) {

            throw new ParamNotExistException("Parameter id doesn't exist");
        }

        $id = $data['id'];
        if (empty($id)) {

            throw new MedicineNotExistException('Medicine with empty id doesn\'t exist');
        }

        $em        = $this->getDoctrine()->getManager();
        $medicine  = $em->getRepository('AppBundle:Drug')
            ->find($id);

        if (empty($medicine)) {

            throw new MedicineNotExistException('Medicine doesn\'t exist');
        }

        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (!$user->getMedicines()->contains($medicine)) {

            $user->addMedicine($medicine);

            $em->persist($user);
            $em->flush();

            // dispatch add to user list event
            $event = new AddToUserListEvent();
            $event->setUser($user);
            $event->setDrug($medicine);

            $this->get("event_dispatcher")->dispatch('app.event.add_drug_to_user_list_event', $event);
        }

        $medicine->setInMyPharmacist(true);

        return $medicine;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Pharmacist",
     *  description = "Remove medicine from my list",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  parameters={
     *      {"name"="id", "dataType"="integer", "required"=true, "description"="It is medicine id"}
     *  },
     *  output={
     *    "class"      = "AppBundle\Entity\Drug",
     *    "collection" = true
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required",
     *     404 = "Medicine doesn't exist"
     *   }
     * )
     */
    public function removeMedicineAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if (empty($data['id'])) {

            throw new ParamNotExistException("Parameter id doesn't exist");
        }

        $id = $data['id'];
        if (empty($id)) {

            throw new MedicineNotExistException('Medicine with empty id doesn\'t exist');
        }

        $em        = $this->getDoctrine()->getManager();
        $medicine  = $em->getRepository('AppBundle:Drug')
            ->find($id);

        if (empty($medicine)) {

            throw new MedicineNotExistException('Medicine doesn\'t exist');
        }

        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (!$user->getMedicines()->contains($medicine)) {

            throw new MedicineNotExistException('Medicine doesn\'t exist in my list');
        }

        $user->removeMedicine($medicine);

        $em->persist($user);
        $em->flush();

        // dispatch remove from user list event
        $event = new RemoveFromUserListEvent();
        $event->setUser($user);
        $event->setDrug($medicine);

        $this->get("event_dispatcher")->dispatch('app.event.remove_drug_from_user_list_event', $event);

        $medicine->setInMyPharmacist(false);

        return $medicine;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Pharmacist",
     *  description = "Get medicine labels list",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  parameters={
     *      {"name"="id", "dataType"="integer", "required"=true, "description"="It is medicine id"}
     *  },
     *  output={
     *    "class"      = "AppBundle\Entity\DrugLabel",
     *    "collection" = true
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required"
     *   }
     * )
     */
    public function getLabelsAction(Request $request)
    {
        $data = $request->query->all();
        if (empty($data['id'])) {

            throw new ParamNotExistException("Parameter id doesn't exist");
        }

        $labels = $this->getDoctrine()->getManager()->getRepository('AppBundle:DrugLabel')->getLabelsByDrug($data['id']);

        return $labels;
    }
}