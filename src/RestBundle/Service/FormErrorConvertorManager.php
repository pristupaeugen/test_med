<?php

namespace RestBundle\Service;

use Symfony\Component\Form\Form;

/**
 * Class FormErrorConvertorManager
 * @package RestBundle\Service
 */
class FormErrorConvertorManager
{
    const SKIPPED_ERROR_KEYS = ['email'];

    /**
     * @param Form $form
     * @return string
     */
    public function getErrorMessage(Form $form)
    {
        $errorMsg = '';
        $children = $form->all();
        foreach ($children as $key => $child) {

            if ($form[$key]->getErrors()->count()) {

                $errorMsg = ltrim((string)$form[$key]->getErrors(true), 'ERROR:');

                if (!in_array($key, self::SKIPPED_ERROR_KEYS)) {

                    $errorMsg = '[' . $key . ']: ' . $errorMsg;
                }

                break;
            }
        }

        return trim($errorMsg);
    }
}