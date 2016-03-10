<?php
namespace Xqddd\Notifications\Exceptions;

use Xqddd\Exceptions\Codes as BaseCodes;

/**
 * Notifications exception codes list
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications\Exceptions
 */
class Codes extends BaseCodes
{

    const INVALID_NOTIFICATION_LABEL = 102;

    const INVALID_NOTIFICATION_MESSAGE = 202;

    const NOTIFICATION_TYPE_DOMAIN = 301;

    const INVALID_NOTIFICATION_TYPE = 302;

    const INVALID_NOTIFICATION_CONTEXT = 402;
}
