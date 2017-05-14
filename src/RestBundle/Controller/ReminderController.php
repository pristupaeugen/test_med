<?php

// src/RestBundle/Controller/ReminderController.php
namespace RestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use FOS\RestBundle\Controller\FOSRestController;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use AppBundle\Entity\Reminder;
use AppBundle\Entity\ReminderAlarm;

use RestBundle\Exception\ReminderNotExistException;
use RestBundle\Exception\ParamNotExistException;
use RestBundle\Exception\FormException;

use RestBundle\Form\ReminderType;


/**
 * Class ReminderController
 * @package RestBundle\Controller
 */
class ReminderController extends FOSRestController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * @ApiDoc(
     *  section     = "Reminder",
     *  description = "Get reminders",
     *  headers={
     *    {
     *      "name"        = "token",
     *      "description" = "Authorization key",
     *      "required"    = true
     *    }
     *  },
     *  output={
     *    "class"      = "AppBundle\Entity\Reminder",
     *    "collection" = true
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     401 = "Authentication required"
     *   }
     * )
     */
    public function getRemindersAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $reminders = $user->getReminders();

        return $reminders;
    }

    /**
     * @param Request $request
     * @return User|\Symfony\Component\Form\Form
     *
     * @ApiDoc(
     *  section     = "Reminder",
     *  description = "Update reminder",
     *  parameters={
     *      {"name"="id",        "dataType"="integer", "required"=true, "description"="Reminder id"},
     *      {"name"="enabled",   "dataType"="boolean", "required"=true, "description"=""},
     *      {"name"="duration",  "dataType"="integer",  "required"=true, "description"=""},
     *      {"name"="frequency", "dataType"="string",  "required"=true, "description"=""},
     *      {"name"="increment", "dataType"="string",  "required"=true, "description"=""},
     *      {"name"="alarms", "dataType"="array",  "required"=true, "description"=""},
     *      {"name"="alarms[][time]", "dataType"="integer",  "required"=true, "description"=""},
     *      {"name"="alarms[][dose_value]", "dataType"="integer",  "required"=true, "description"=""},
     *      {"name"="alarms[][dose_label]", "dataType"="string",  "required"=true, "description"=""}
     *  },
     *  output={
     *    "class"="AppBundle\Entity\Reminder"
     *  },
     *  statusCodes = {
     *     200 = "Successful",
     *     400 = "Form validation error"
     *   }
     * )
     */
    public function updateReminderAction(Request $request)
    {
        $em   = $this->getDoctrine()->getManager();
        $data = json_decode($request->getContent(), true);

        $paramNames = ['id', 'enabled', 'start_date_timestamp', 'alarms'];
        foreach ($paramNames as $paramName) {

            if (!isset($data[$paramName])) {

                throw new ParamNotExistException("Parameter {$paramName} doesn't exist");
            }
        }

        $reminderId = $data['id'];
        unset($data['id']);

        $reminder = $em->getRepository('AppBundle:Reminder')->find($reminderId);
        if (empty($reminder)) {

            throw new ReminderNotExistException('Reminder doesn\'t exist');
        }

        $data['enabled'] = (bool)$data['enabled'];

        $dateTime = new \DateTime();
        $dateTime->setTimestamp($data['start_date_timestamp']);

        $reminder->setStartDate($dateTime);
        unset($data['start_date_timestamp']);

        $form = $this->createForm(ReminderType::class, $reminder, array('csrf_protection' => false));

        $form->submit($data);

        if ($form->isValid()) {

            $dbReminder = $this->getDoctrine()->resetManager()->getRepository('AppBundle:Reminder')->find($reminderId);
            foreach ($dbReminder->getAlarms() as $alarm) {

                $dbReminder->removeAlarm($alarm);
                $em->remove($alarm);
            }

            foreach ($reminder->getAlarms() as $alarm) {

                $alarm->setReminder($dbReminder);
                $dbReminder->addAlarm($alarm);
            }

            $dbReminder->setStartDate($reminder->getStartDate());
            $dbReminder->setFrequency($reminder->getFrequency());
            $dbReminder->setIncrement($reminder->getIncrement());
            $dbReminder->setDuration($reminder->getDuration());
            $dbReminder->setEnabled($reminder->getEnabled());

            $em->persist($dbReminder);
            $em->flush();

            return $dbReminder;
        }

        $formErrorConvertorManager = $this->get('rest.rest_form_error_convertor');
        throw new FormException($formErrorConvertorManager->getErrorMessage($form));
    }
}