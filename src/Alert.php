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
     * @param Context $context
     */
    public function __construct(Label $label, Message $message, Context $context)
    {
        $type = new Type(TypeList::ALERT);

        parent::__construct($label, $message, $type, $context);
    }
}
