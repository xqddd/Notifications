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
     * @param Context $context
     */
    public function __construct(Label $label, Message $message, Context $context)
    {
        $type = new Type(TypeList::CRITICAL);

        parent::__construct($label, $message, $type, $context);
    }
}
