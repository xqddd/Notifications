<?php
namespace Xqddd\Notifications\Exceptions;

use Xqddd\Exceptions\DomainException;

/**
 * Exception for an inappropriate notification type
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications\Exceptions
 */
class NotificationTypeDomainException extends DomainException
{

    /**
     * The exception message
     *
     * @var string
     */
    protected $message = 'The provided notification type [%s] does not exist or does not belong to the current domain [%s].';

    /**
     * The exception code
     *
     * @var int
     */
    protected $code = Codes::NOTIFICATION_TYPE_DOMAIN;

    /**
     * The exception string code
     *
     * @var string
     */
    protected $stringCode = 'NOTIFICATION_TYPE_DOMAIN';
}
