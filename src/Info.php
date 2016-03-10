<?php
namespace Xqddd\Notifications;

/**
 * Info class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Info extends Notification
{

    /**
     * Info constructor.
     *
     * @param Label $label
     * @param Message $message
     * @param Context $context
     */
    public function __construct(Label $label, Message $message, Context $context)
    {
        $type = new Type(TypeList::INFO);

        parent::__construct($label, $message, $type, $context);
    }
}
