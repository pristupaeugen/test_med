<?php

// src/RestBundle/Controller/MatchController.php
namespace RestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use FOS\RestBundle\Controller\FOSRestController;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use RestBundle\Exception\MedicineNotExistException;
use RestBundle\Exception\ParamNotExistException;


/**
 * Class MatchController
 * @package RestBundle\Controller
 */
class MatchController extends FOSRestController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Match",
     *  description = "Get matches list",
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
    public function getMatchesAction(Request $request)
    {
        $em        = $this->getDoctrine()->getManager();
        $medicines = $this->get('security.token_storage')->getToken()->getUser()
                          ->getMatches();

        return $medicines;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Match",
     *  description = "Add match to my list",
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
    public function addMatchAction(Request $request)
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
        if (!$user->getMatches()->contains($medicine)) {

            $user->addMatch($medicine);

            $em->persist($user);
            $em->flush();
        }

        $medicine->setInMyMatch(true);

        return $medicine;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Match",
     *  description = "Remove match from my list",
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
    public function removeMatchAction(Request $request)
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
        if (!$user->getMatches()->contains($medicine)) {

            throw new MedicineNotExistException('Medicine doesn\'t exist in my list');
        }

        $user->removeMatch($medicine);

        $em->persist($user);
        $em->flush();

        $medicine->setInMyMatch(false);

        return $medicine;
    }
}