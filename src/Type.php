<?php
namespace Xqddd\Notifications;

use Xqddd\Notifications\Exceptions\InvalidNotificationTypeException;
use Xqddd\Notifications\Exceptions\NotificationTypeDomainException;
use Xqddd\Notifications\Exceptions\TypeList;

/**
 * Notification Type attribute class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Type implements Presentable
{
    use PresentableTrait;

    /**
     * The type string value
     *
     * @var string
     */
    protected $value;

    /**
     * Type constructor.
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
     * @throws InvalidNotificationTypeException
     */
    protected function validateValue($value)
    {
        if (!is_string($value)) {
            throw new InvalidNotificationTypeException(
                'type',
                'string',
                gettype($value)
            );
        }
    }

    /**
     * Get the type string value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the type string value
     *
     * @param string $value
     */
    protected function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param Type $type
     * @return bool
     */
    public function equals(Type $type)
    {
        return $this->value === $type->getValue();
    }

    /**
     * Get the string representation of the type
     *
     * @return string
     */
    public function toString()
    {
        return $this->getValue();
    }

    /**
     * Get the array representation of the type
     *
     * @param bool $assoc
     * @return array
     */
    public function toArray($assoc = true)
    {
        return (true === $assoc)
            ? [
                'type' => $this->getValue()
            ]
            : [
                $this->getValue()
            ];
    }
}
