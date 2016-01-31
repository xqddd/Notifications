<?php
namespace Xqddd\Notifications;

/**
 * Critical class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Critical extends Notification
{

    /**
     * Critical constructor.
     *
     * @param Label $label
     * @param Message $message
     */
    public function __construct(Label $label, Message $message)
    {
        $type = new Type(TypeList::CRITICAL);

        parent::__construct($label, $message, $type);
    }
}
