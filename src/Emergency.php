<?php
namespace Xqddd\Notifications;

/**
 * Emergency class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Emergency extends Notification
{

    /**
     * Emergency constructor.
     *
     * @param Label $label
     * @param Message $message
     */
    public function __construct(Label $label, Message $message)
    {
        $type = new Type(TypeList::EMERGENCY);

        parent::__construct($label, $message, $type);
    }
}
