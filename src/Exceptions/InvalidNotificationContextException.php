<?php
namespace Xqddd\Notifications\Exceptions;

use Xqddd\Exceptions\InvalidArgumentException;

/**
 * Exception for invalid notification context
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications\Exceptions
 */
class InvalidNotificationContextException extends InvalidArgumentException
{

    /**
     * The exception message
     *
     * @var string
     */
    protected $message = 'Invalid [%s] notification context: [%s] expected - [%s] given.';

    /**
     * The exception code
     *
     * @var int
     */
    protected $code = Codes::INVALID_NOTIFICATION_CONTEXT;

    /**
     * The exception string code
     *
     * @var string
     */
    protected $stringCode = 'INVALID_NOTIFICATION_CONTEXT';
}
