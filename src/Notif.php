<?php
namespace Xqddd\Notifications;

/**
 * Notification Factory Facade
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Notif
{

    /**
     * @var NotificationFactory
     */
    protected static $notificationFactory;

    /**
     * @return NotificationFactory
     */
    protected static function getNotificationFactory()
    {
        if (! static::$notificationFactory instanceof NotificationFactory) {
            static::$notificationFactory = new NotificationFactory();
        }
        return static::$notificationFactory;
    }

    /**
     * Build a Notification
     *
     * @param $labelValue
     * @param $typeValue
     * @param $messageValue
     * @return Notification
     */
    public static function build($labelValue, $typeValue, $messageValue)
    {
        return static::getNotificationFactory()->build($labelValue, $typeValue, $messageValue);
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
        return static::getNotificationFactory()->buildDebug($labelValue, $messageValue);
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
        return static::getNotificationFactory()->buildInfo($labelValue, $messageValue);
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
        return static::getNotificationFactory()->buildNotice($labelValue, $messageValue);
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
        return static::getNotificationFactory()->buildWarning($labelValue, $messageValue);
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
        return static::getNotificationFactory()->buildError($labelValue, $messageValue);
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
        return static::getNotificationFactory()->buildCritical($labelValue, $messageValue);
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
        return static::getNotificationFactory()->buildAlert($labelValue, $messageValue);
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
        return static::getNotificationFactory()->buildEmergency($labelValue, $messageValue);
    }
}
