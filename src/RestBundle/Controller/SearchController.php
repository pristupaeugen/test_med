<?php

// src/RestBundle/Controller/SearchController.php
namespace RestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use FOS\RestBundle\Controller\FOSRestController;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use RestBundle\Exception\ParamNotExistException;
use RestBundle\Exception\ParamIsNotValidException;

/**
 * Class SearchController
 * @package RestBundle\Controller
 */
class SearchController extends FOSRestController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Pharmacist",
     *  description = "Find medicines in database",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  parameters={
     *      {"name"="name", "dataType"="string", "required"=true, "description"="Name is used in LIKE constructions"},
     *      {"name"="country_id", "dataType"="integer", "required"=true, "description"="Country id is used to find medicines"},
     *      {"name"="page", "dataType"="integer", "required"=true, "description"="Page is used to find medicines"},
     *      {"name"="page_size", "dataType"="integer", "required"=true, "description"="Page size is used to find medicines"}
     *  },
     *  output={
     *    "class"      = "AppBundle\Entity\Drug",
     *    "collection" = true
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required",
     *     404 = "Parameter doesn't exist"
     *   }
     * )
     */
    public function findMedicinesAction(Request $request)
    {
        $data = $request->query->all();
        foreach (['name', 'country_id', 'page', 'page_size'] as $dataKey) {

            if (empty($data[$dataKey])) {

                throw new ParamNotExistException("Parameter {$dataKey} doesn't exist");
            }
        }

        foreach (['page', 'page_size'] as $dataKey) {

            if ($data[$dataKey] < 0) {

                throw new ParamIsNotValidException("Parameter {$dataKey} isn't valid");
            }
        }

        $userMedicines = $this->get('security.token_storage')->getToken()->getUser()->getMedicines();

        $em            = $this->getDoctrine()->getManager();
        $medicines     = $em->getRepository('AppBundle:Drug')
                            ->search($data, $userMedicines);

        return $medicines;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Match",
     *  description = "Find matches in database",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  parameters={
     *      {"name"="id", "dataType"="integer", "required"=true, "description"="Drug id is used to find matches"},
     *      {"name"="country_id", "dataType"="integer", "required"=true, "description"="Country id is used to find medicines"},
     *      {"name"="manufacturer_id", "dataType"="integer", "required"=false, "description"="Manufacturer id is used to find medicines"},
     *      {"name"="page", "dataType"="integer", "required"=true, "description"="Page is used to find medicines"},
     *      {"name"="page_size", "dataType"="integer", "required"=true, "description"="Page size is used to find medicines"}
     *  },
     *  output={
     *    "class"      = "AppBundle\Entity\DrugMatch",
     *    "collection" = true
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required",
     *     404 = "Parameter doesn't exist"
     *   }
     * )
     */
    public function findMatchesAction(Request $request)
    {
        $data = $request->query->all();
        foreach (['id', 'country_id'] as $dataKey) {

            if (empty($data[$dataKey])) {

                throw new ParamNotExistException("Parameter {$dataKey} doesn't exist");
            }
        }

        $em      = $this->getDoctrine()->getManager();
        $matches = $em->getRepository('AppBundle:DrugMatch')->search($data);

        return $matches;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Match",
     *  description = "Find matches count by countries in database",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  parameters={
     *      {"name"="id", "dataType"="integer", "required"=true, "description"="Drug id is used to find matches"}
     *  },
     *  output={
     *    "class"      = "AppBundle\Entity\Country",
     *    "collection" = true
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required",
     *     404 = "Parameter doesn't exist"
     *   }
     * )
     */
    public function findCountryMatchesAction(Request $request)
    {
        $data = $request->query->all();
        foreach (['id'] as $dataKey) {

            if (empty($data[$dataKey])) {

                throw new ParamNotExistException("Parameter {$dataKey} doesn't exist");
            }
        }

        $em       = $this->getDoctrine()->getManager();
        $countries = $em->getRepository('AppBundle:Country')->getCountriesWithMatchCounts($data);

        return $countries;
    }
}