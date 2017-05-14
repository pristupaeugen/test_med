<?php

namespace AppBundle\Repository;

/**
 * CountryRepository
 */
class CountryRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Search countries with drug matches count
     * @param $data is criteria for search
     * @return array
     */
    public function getCountriesWithMatchCounts($data)
    {
        $drug = $this->getEntityManager()->getRepository('AppBundle:Drug')->find($data['id']);
        if (empty($drug)) {

            return null;
        }

        $counts = $this->getEntityManager()->getRepository('AppBundle:DrugMatch')
            ->getMatchesCountsByCountries($drug->getMatchCode());

        $countryCounts = [];
        foreach ($counts as $count) {

            $countryCounts[$count['country_id']] = $count['country_count'];
        }

        $countriesList = [];
        $countries = $this->getEntityManager()->getRepository('AppBundle:Country')->findAll();
        foreach ($countries as $country) {

            $country->setMatchesCount((isset($countryCounts[$country->getId()]) ? $countryCounts[$country->getId()] : 0));
            if ($country->getMatchesCount() > 0) {

                $countriesList[] = $country;
            }
        }

        return $countriesList;
    }
}
