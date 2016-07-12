<?php
namespace Xqddd\Notifications;

use Xqddd\Notifications\Exceptions\InvalidNotificationContextException;
use Xqddd\Presentable\Presentable;
use Xqddd\Presentable\PresentableTrait;

/**
 * Notification Context attribute class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Context implements Presentable
{
    use PresentableTrait;

    /**
     * The context object value
     *
     * @var object
     */
    protected $value;

    /**
     * Context constructor.
     *
     * @param object $value
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
     * @throws InvalidNotificationContextException
     */
    protected function validateValue($value)
    {
        if (!is_null($value) && !is_object($value)) {
            throw new InvalidNotificationContextException(
                'context',
                'object',
                gettype($value)
            );
        }
    }

    /**
     * Get the context object value
     *
     * @return object
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the context object value
     *
     * @param object $value
     */
    protected function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param Context $label
     * @return bool
     */
    public function equals(Context $label)
    {
        return $this->value === $label->getValue();
    }

    /**
     * Get the string representation of the context
     *
     * @return string
     */
    public function toString()
    {
        return ($this->getValue() instanceof Presentable)
            ? $this->getValue()->toString()
            : json_encode($this->getValue());
    }

    /**
     * Get the array representation of the context
     *
     * @param bool $assoc
     * @return array
     */
    public function toArray($assoc = true)
    {
        return (true === $assoc)
            ? [
                'context' => $this->getValue()
            ]
            : [
                $this->getValue()
            ];
    }
}
