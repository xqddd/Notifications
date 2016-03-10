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
     * @param Context $context
     */
    public function __construct(Label $label, Message $message, Context $context)
    {
        $type = new Type(TypeList::EMERGENCY);

        parent::__construct($label, $message, $type, $context);
    }
}
