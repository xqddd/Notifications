<?php
namespace Xqddd\Notifications;

use Xqddd\Notifications\Exceptions\InvalidNotificationLabelException;

/**
 * Notification Label attribute class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Label implements Presentable
{
    use PresentableTrait;

    /**
     * The label string value
     *
     * @var string
     */
    protected $value;

    /**
     * Label constructor.
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
     * @throws InvalidNotificationLabelException
     */
    protected function validateValue($value)
    {
        if (!is_string($value)) {
            throw new InvalidNotificationLabelException(
                'label',
                'string',
                gettype($value)
            );
        }
    }

    /**
     * Get the label string value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the label string value
     *
     * @param string $value
     */
    protected function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param Label $label
     * @return bool
     */
    public function equals(Label $label)
    {
        return $this->value === $label->getValue();
    }

    /**
     * Get the string representation of the label
     *
     * @return string
     */
    public function toString()
    {
        return $this->getValue();
    }

    /**
     * Get the array representation of the label
     *
     * @param bool $assoc
     * @return array
     */
    public function toArray($assoc = true)
    {
        return (true === $assoc)
            ? [
                'label' => $this->getValue()
            ]
            : [
                $this->getValue()
            ];
    }
}
