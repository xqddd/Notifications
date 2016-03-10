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
     * @param Context $context
     */
    public function __construct(Label $label, Message $message, Context $context)
    {
        $type = new Type(TypeList::ERROR);

        parent::__construct($label, $message, $type, $context);
    }
}
