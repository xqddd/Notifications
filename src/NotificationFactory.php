<?php
namespace Xqddd\Notifications;

use Xqddd\Notifications\Exceptions\InvalidNotificationLabelException;
use Xqddd\Notifications\Exceptions\InvalidNotificationMessageException;
use Xqddd\Notifications\Exceptions\InvalidNotificationTypeException;

/**
 * Notification Factory class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class NotificationFactory
{

    /**
     * Build a notification
     *
     * @param string $labelValue
     * @param string $messageValue
     * @param string $typeValue
     * @return Notification
     */
    public function build($labelValue, $messageValue, $typeValue = 'notification')
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $type = $this->buildType($typeValue);

        return new Notification($label, $message, $type);
    }

    /**
     * Build a debug notification
     *
     * @param $labelValue
     * @param $messageValue
     * @return Debug
     */
    public function buildDebug($labelValue, $messageValue)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        
        return new Debug($label, $message);
    }


    /**
     * Build an informative notification
     *
     * @param $labelValue
     * @param $messageValue
     * @return Info
     */
    public function buildInfo($labelValue, $messageValue)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);

        return new Info($label, $message);
    }

    /**
     * Build a notice
     *
     * @param $labelValue
     * @param $messageValue
     * @return Notice
     */
    public function buildNotice($labelValue, $messageValue)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);

        return new Notice($label, $message);
    }

    /**
     * Build a warning
     *
     * @param $labelValue
     * @param $messageValue
     * @return Warning
     */
    public function buildWarning($labelValue, $messageValue)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);

        return new Warning($label, $message);
    }

    /**
     * Build an error
     *
     * @param $labelValue
     * @param $messageValue
     * @return Error
     */
    public function buildError($labelValue, $messageValue)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);

        return new Error($label, $message);
    }

    /**
     * Build a critical
     *
     * @param $labelValue
     * @param $messageValue
     * @return Critical
     */
    public function buildCritical($labelValue, $messageValue)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);

        return new Critical($label, $message);
    }

    /**
     * Build an alert
     *
     * @param $labelValue
     * @param $messageValue
     * @return Alert
     */
    public function buildAlert($labelValue, $messageValue)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);

        return new Alert($label, $message);
    }

    /**
     * Build an emergency
     *
     * @param $labelValue
     * @param $messageValue
     * @return Emergency
     */
    public function buildEmergency($labelValue, $messageValue)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);

        return new Emergency($label, $message);
    }

    /**
     * Build a notification label
     *
     * @param mixed $labelValue
     * @return Label
     */
    protected function buildLabel($labelValue)
    {
        try {
            $label = new Label($labelValue);
        } catch (InvalidNotificationLabelException $e) {
            /*
             * @todo handle this case
             */
        }
        return $label;
    }

    /**
     * Build a notification type
     *
     * @param mixed $typeValue
     * @return Type
     */
    protected function buildType($typeValue)
    {
        try {
            $type = new Type($typeValue);
        } catch (InvalidNotificationTypeException $e) {
            /*
             * @todo handle this case
             */
        }
        return $type;
    }

    /**
     * Build a notification message
     *
     * @param mixed $messageValue
     * @return Message
     */
    protected function buildMessage($messageValue)
    {
        try {
            $message = new Message($messageValue);
        } catch (InvalidNotificationMessageException $e) {
            /*
             * @todo handle this case
             */
        }
        return $message;
    }

}
