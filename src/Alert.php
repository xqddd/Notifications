<?php
namespace Xqddd\Notifications;

/**
 * Alert class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Alert extends Notification
{

    /**
     * Alert constructor.
     *
     * @param Label $label
     * @param Message $message
     */
    public function __construct(Label $label, Message $message)
    {
        $type = new Type(TypeList::ALERT);

        parent::__construct($label, $message, $type);
    }
}
