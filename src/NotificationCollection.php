<?php
namespace Xqddd\Notifications;

use Xqddd\Notifications\Exceptions\InvalidNotificationLabelException;

/**
 * Notification collection class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class NotificationCollection extends \ArrayObject
{

	/**
	 * Get a notification by label
	 *
	 * @param string $label
	 * @return mixed
	 * @throws InvalidNotificationLabelException
	 */
	public function getNotification($label)
	{
		if (!is_string($label)) {
            throw new InvalidNotificationLabelException(
				'label',
				'string',
				gettype($label)
			);
		}

		return $this->offsetGet($label);
	}

	/**
	 * Add a notification
	 *
	 * @param NotificationInterface $Notification
	 */
	public function addNotification(NotificationInterface $Notification)
	{
		if ($Notification->getLabel() !== null) {
			$this->offsetSet($Notification->getLabel(), $Notification);
		} else {
			$this->append($Notification);
		}
	}

	/**
	 * Verify if there are any notifications
	 *
	 * @return boolean
	 */
	public function hasNotifications()
	{
		if ($this->count() > 0) {
			return true;
		}

		return false;
	}

	/**
	 *
	 * @return array
	 */
	public function toString()
	{
		$collection = [];

		foreach ($this->getArrayCopy() as $item) {
			$collection[] = $item->toString();
		}

		return $collection;
	}

	/**
	 *
	 * @return array
	 */
	public function toArray()
	{
		$collection = [];

		foreach ($this->getArrayCopy() as $item) {
			$collection[] = $item->toArray();
		}

		return $collection;
	}

	/**
	 *
	 * @param boolean $fullStructure
	 * @return string
	 */
	public function toJson($fullStructure = true)
	{
		$collection = [];

		foreach ($this->getArrayCopy() as $item) {
			$collection[] = json_decode($item->toJson($fullStructure));
		}

		return json_encode($collection);
	}

}
