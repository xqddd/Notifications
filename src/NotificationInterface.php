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
     * Get the notification type
     *
     * @return string
     */
    public function getType();

    /**
     * Get the notification message
     *
     * @return string
     */
    public function getMessage();
}
