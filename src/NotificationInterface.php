<?php
namespace Xqddd\Notifications;

/**
 * Notification interface
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
interface NotificationInterface
{

    /**
     * Get the notification label
     *
     * @return string
     */
    public function getLabel();

    /**
     * Get the notification message
     *
     * @return string
     */
    public function getMessage();

    /**
     * Get the notification message formatted to string
     *
     * @return string
     */
    public function toString();

    public function __toString();

}
