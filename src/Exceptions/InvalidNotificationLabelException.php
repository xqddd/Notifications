<?php
namespace Xqddd\Notifications\Exceptions;

use Xqddd\Exceptions\InvalidArgumentException;

/**
 * Exception for invalid notification label
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications\Exceptions
 */
class InvalidNotificationLabelException extends InvalidArgumentException
{

    /**
     * The exception message
     *
     * @var string
     */
    protected $message = 'Invalid [%s] notification label: [%s] expected - [%s] given.';

    /**
     * The exception code
     *
     * @var int
     */
    protected $code = Codes::INVALID_NOTIFICATION_LABEL;

    /**
     * The exception string code
     *
     * @var string
     */
    protected $stringCode = 'INVALID_NOTIFICATION_LABEL';
}
