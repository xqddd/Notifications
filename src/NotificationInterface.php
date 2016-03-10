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
     * @return Label
     */
    public function getLabel();

    /**
     * Get the notification type
     *
     * @return Type
     */
    public function getType();

    /**
     * Get the notification message
     *
     * @return Message
     */
    public function getMessage();

    /**
     * Get the notification message
     *
     * @return Context
     */
    public function getContext();
}
