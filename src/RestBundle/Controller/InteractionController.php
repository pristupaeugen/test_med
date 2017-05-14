<?php

// src/RestBundle/Controller/InteractionController.php
namespace RestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use FOS\RestBundle\Controller\FOSRestController;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use RestBundle\Exception\MedicineNotExistException;
use RestBundle\Exception\ParamNotExistException;


/**
 * Class InteractionController
 * @package RestBundle\Controller
 */
class InteractionController extends FOSRestController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Interaction",
     *  description = "Add interaction to my list",
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
    public function addInteractionAction(Request $request)
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
        if (!$user->getInteractions()->contains($medicine)) {

            $user->addInteraction($medicine);

            $em->persist($user);
            $em->flush();
        }

        $medicine->setInMyInteractions(true);

        return $medicine;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Interaction",
     *  description = "Remove interaction from my list",
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
    public function removeInteractionAction(Request $request)
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
        if (!$user->getInteractions()->contains($medicine)) {

            throw new MedicineNotExistException('Medicine doesn\'t exist in my list');
        }

        $user->removeInteraction($medicine);

        $em->persist($user);
        $em->flush();

        $medicine->setInMyInteractions(false);

        return $medicine;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Interaction",
     *  description = "Find interactions list",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  parameters={
     *      {"name"="ids[]", "dataType"="integer", "required"=true, "description"="It is medicine id"}
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required"
     *   }
     * )
     */
    public function findInteractionsAction(Request $request)
    {
        $data = $request->query->all();
        if (empty($data['ids'])) {

            throw new ParamNotExistException("Parameter ids doesn't exist");
        }

        foreach ($data['ids'] as $key => $id) {

            if (empty($id)) {

                unset($data['ids'][$key]);
            }
        }

        if (empty($data['ids'])) {

            throw new ParamNotExistException("Parameter ids is empty");
        }

        if (count($data['ids']) < 2) {

            throw new ParamNotExistException("Should point two ore more drug ids");
        }

        $em           = $this->getDoctrine()->getManager();
        $interactions = $em->getRepository('AppBundle:DrugInteraction')->findInteractions($data['ids']);

        return $interactions;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Interaction",
     *  description = "Get interactions",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required"
     *   }
     * )
     */
    public function getInteractionsAction(Request $request)
    {

//        $cachedCategories = $this->get('cache.app')->getItem('categories');
//        if (!$cachedCategories->isHit()) {
//            $categories = [12,13,14];
//            $cachedCategories->set($categories);
//            $this->get('cache.app')->save($cachedCategories);
//        } else {
//            $categories = $cachedCategories->get();
//            var_dump($categories);die;
//        }




        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userInteractions = $user->getInteractions();
        if (count($userInteractions) == 0) {

            return [];
        }

        $ids = [];
        foreach ($userInteractions as $userInteraction) {

            $ids[] = $userInteraction->getId();
        }

        $em           = $this->getDoctrine()->getManager();
        $interactions = $em->getRepository('AppBundle:DrugInteraction')->findInteractions($ids);

        return $interactions;
    }
}