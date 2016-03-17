<?php
namespace Xqddd\Notifications;

use Xqddd\Notifications\Exceptions\InvalidNotificationMessageException;
use Xqddd\Presentable\Presentable;
use Xqddd\Presentable\PresentableTrait;

/**
 * Notification Message attribute class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Message implements Presentable
{
    use PresentableTrait;

    /**
     * The message string value
     *
     * @var string
     */
    protected $value;

    /**
     * Message constructor.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        $this->validateValue($value);
        $this->setValue($value);
    }

    /**
     * Check if a given value passes validations
     *
     * @param mixed $value
     * @throws InvalidNotificationMessageException
     */
    protected function validateValue($value)
    {
        if (!is_string($value)) {
            throw new InvalidNotificationMessageException(
                'message',
                'string',
                gettype($value)
            );
        }
    }

    /**
     * Get the message string value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the message string value
     *
     * @param string $value
     */
    protected function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param Message $message
     * @return bool
     */
    public function equals(Message $message)
    {
        return $this->value === $message->getValue();
    }

    /**
     * Get the string representation of the message
     *
     * @return string
     */
    public function toString()
    {
        return $this->getValue();
    }

    /**
     * Get the array representation of the message
     *
     * @param bool $assoc
     * @return array
     */
    public function toArray($assoc = true)
    {
        return (true === $assoc)
            ? [
                'message' => $this->getValue()
            ]
            : [
                $this->getValue()
            ];
    }
}
