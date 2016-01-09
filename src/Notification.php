<?php
namespace Xqddd\Notifications;

use Xqddd\Notifications\Exceptions\InvalidNotificationLabelException;
use Xqddd\Notifications\Exceptions\InvalidNotificationMessageException;

/**
 * Notification class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Notification implements NotificationInterface
{

    /**
     * The notification label
     *
     * @var string
     */
    protected $label;

    /**
     * The notification message
     *
     * @var string
     */
    protected $message;

    /**
     * Notification constructor.
     *
     * @param $message
     * @param null $label
     */
    public function __construct($message, $label = null)
    {
        if (!is_null($label)) {
            $this->setLabel($label);
        }
        $this->setMessage($message);
    }

    /**
     * Get the notification label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the notification label
     *
     * @param string $label
     * @throws InvalidNotificationLabelException
     */
    protected function setLabel($label)
    {
        if (!is_string($label)) {
            throw new InvalidNotificationLabelException(
                'label',
                'string',
                gettype($label)
            );
        }

        $this->label = $label;
    }

    /**
     * Get the notification message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the notification message
     *
     * @param string $message
     * @throws InvalidNotificationMessageException
     */
    protected function setMessage($message)
    {
        if (!is_string($message)) {
            throw new InvalidNotificationMessageException(
                'message',
                'string',
                gettype($message)
            );
        }

        $this->message = $message;
    }

    /**
     * Get the notification message formatted to string
     *
     * @return string
     */
    public function toString()
    {
        return $this->getMessage();
    }

	/**
	 * @return array
	 */
    public function toArray()
    {
        $attribute = [
            'label' => $this->getLabel(),
            'message' => $this->getMessage()
        ];

        return $attribute;
    }

	/**
	 * @param bool $fullStructure
	 * @return string
	 */
    public function toJson($fullStructure = false)
    {
        if (true === $fullStructure) {
            $structure = $this->toArray();
        } else {
            $structure = $this->toString();
        }

        $jsonStructure = json_encode($structure);

        return $jsonStructure;
    }

    public function __toString()
    {
        return $this->toString();
    }

}
