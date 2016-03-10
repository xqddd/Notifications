<?php
namespace Xqddd\Notifications;

/**
 * Debug class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Debug extends Notification
{

    /**
     * Debug constructor.
     *
     * @param Label $label
     * @param Message $message
     * @param Context $context
     */
    public function __construct(Label $label, Message $message, Context $context)
    {
        $type = new Type(TypeList::DEBUG);

        parent::__construct($label, $message, $type, $context);
    }
}
