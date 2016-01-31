<?php
namespace Xqddd\Notifications;

/**
 * Error class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Error extends Notification
{

    /**
     * Error constructor.
     *
     * @param Label $label
     * @param Message $message
     */
    public function __construct(Label $label, Message $message)
    {
        $type = new Type(TypeList::ERROR);

        parent::__construct($label, $message, $type);
    }
}
