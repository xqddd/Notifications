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
     * @param $messageValue
     * @param $typeValue
     * @param $contextValue
     * @return Notification
     */
    public static function build($labelValue, $messageValue, $typeValue, $contextValue = null)
    {
        return static::getNotificationFactory()->build($labelValue, $messageValue, $typeValue, $contextValue);
    }


    /**
     * Build a debug notification
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Debug
     */
    public static function debug($labelValue, $messageValue, $contextValue = null)
    {
        return static::getNotificationFactory()->buildDebug($labelValue, $messageValue, $contextValue);
    }


    /**
     * Build an informative notification
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Info
     */
    public static function info($labelValue, $messageValue, $contextValue = null)
    {
        return static::getNotificationFactory()->buildInfo($labelValue, $messageValue, $contextValue);
    }

    /**
     * Build a notice
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Notice
     */
    public static function notice($labelValue, $messageValue, $contextValue = null)
    {
        return static::getNotificationFactory()->buildNotice($labelValue, $messageValue, $contextValue);
    }

    /**
     * Build a warning
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Warning
     */
    public static function warning($labelValue, $messageValue, $contextValue = null)
    {
        return static::getNotificationFactory()->buildWarning($labelValue, $messageValue, $contextValue);
    }

    /**
     * Build an error
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Error
     */
    public static function error($labelValue, $messageValue, $contextValue = null)
    {
        return static::getNotificationFactory()->buildError($labelValue, $messageValue, $contextValue);
    }

    /**
     * Build a critical
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Critical
     */
    public static function critical($labelValue, $messageValue, $contextValue = null)
    {
        return static::getNotificationFactory()->buildCritical($labelValue, $messageValue, $contextValue);
    }

    /**
     * Build an alert
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Alert
     */
    public static function alert($labelValue, $messageValue, $contextValue = null)
    {
        return static::getNotificationFactory()->buildAlert($labelValue, $messageValue, $contextValue);
    }

    /**
     * Build an emergency
     *
     * @param $labelValue
     * @param $messageValue
     * @param $contextValue
     * @return Emergency
     */
    public static function emergency($labelValue, $messageValue, $contextValue = null)
    {
        return static::getNotificationFactory()->buildEmergency($labelValue, $messageValue, $contextValue);
    }
}
