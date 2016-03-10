<?php
namespace Xqddd\Notifications;

/**
 * Notice class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Notice extends Notification
{

    /**
     * Notice constructor.
     *
     * @param Label $label
     * @param Message $message
     * @param Context $context
     */
    public function __construct(Label $label, Message $message, Context $context)
    {
        $type = new Type(TypeList::NOTICE);

        parent::__construct($label, $message, $type, $context);
    }
}
