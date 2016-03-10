<?php
namespace Xqddd\Notifications;

use Xqddd\Notifications\Exceptions\InvalidNotificationContextException;
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
     * @param $contextValue
     * @return Notification
     */
    public function build($labelValue, $messageValue, $typeValue = 'notification', $contextValue = null)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $type = $this->buildType($typeValue);
        $context = $this->buildContext($contextValue);

        return new Notification($label, $message, $type, $context);
    }

    /**
     * Build a debug notification
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Debug
     */
    public function buildDebug($labelValue, $messageValue, $contextValue = null)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $context = $this->buildContext($contextValue);
        
        return new Debug($label, $message, $context);
    }


    /**
     * Build an informative notification
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Info
     */
    public function buildInfo($labelValue, $messageValue, $contextValue = null)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $context = $this->buildContext($contextValue);

        return new Info($label, $message, $context);
    }

    /**
     * Build a notice
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Notice
     */
    public function buildNotice($labelValue, $messageValue, $contextValue = null)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $context = $this->buildContext($contextValue);

        return new Notice($label, $message, $context);
    }

    /**
     * Build a warning
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Warning
     */
    public function buildWarning($labelValue, $messageValue, $contextValue = null)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $context = $this->buildContext($contextValue);

        return new Warning($label, $message, $context);
    }

    /**
     * Build an error
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Error
     */
    public function buildError($labelValue, $messageValue, $contextValue = null)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $context = $this->buildContext($contextValue);

        return new Error($label, $message, $context);
    }

    /**
     * Build a critical
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Critical
     */
    public function buildCritical($labelValue, $messageValue, $contextValue = null)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $context = $this->buildContext($contextValue);

        return new Critical($label, $message, $context);
    }

    /**
     * Build an alert
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Alert
     */
    public function buildAlert($labelValue, $messageValue, $contextValue = null)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $context = $this->buildContext($contextValue);

        return new Alert($label, $message, $context);
    }

    /**
     * Build an emergency
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Emergency
     */
    public function buildEmergency($labelValue, $messageValue, $contextValue = null)
    {
        $label = $this->buildLabel($labelValue);
        $message = $this->buildMessage($messageValue);
        $context = $this->buildContext($contextValue);

        return new Emergency($label, $message, $context);
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

    /**
     * Build a notification context
     *
     * @param mixed $contextValue
     * @return Context
     */
    protected function buildContext($contextValue)
    {
        try {
            $context = new Context($contextValue);
        } catch (InvalidNotificationContextException $e) {
            /*
             * @todo handle this case
             */
        }
        return $context;
    }
}
