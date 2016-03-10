<?php
namespace Xqddd\Notifications;

/**
 * Warning class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Warning extends Notification
{

    /**
     * Warning constructor.
     *
     * @param Label $label
     * @param Message $message
     * @param Context $context
     */
    public function __construct(Label $label, Message $message, Context $context)
    {
        $type = new Type(TypeList::WARNING);

        parent::__construct($label, $message, $type, $context);
    }
}
