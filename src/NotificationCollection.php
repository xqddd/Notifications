<?php
namespace Xqddd\Notifications;

/**
 * Notification collection class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class NotificationCollection extends \ArrayObject implements Presentable
{

    /**
     * Check if a notification exists
     *
     * @param $label
     * @return bool
     */
    public function exists($label)
    {
        return $this->offsetExists($label);
    }

    /**
     * Get a notification by label
     *
     * @param string $label
     * @return Notification|false
     */
    public function get($label)
    {
        return $this->offsetGet($label);
    }

    /**
     * Add a notification
     *
     * @param NotificationInterface $Notification
     */
    public function add(NotificationInterface $Notification)
    {
        if ($Notification->getLabel() !== null) {
            $this->offsetSet(
                $Notification->getLabel()->toString(),
                $Notification);
        } else {
            $this->append($Notification);
        }
    }

    /**
     * Add multiple notifications from another collection
     *
     * @param NotificationCollection $NotificationCollection
     */
    public function addMany(NotificationCollection $NotificationCollection)
    {
        foreach ($NotificationCollection as $Notification) {
            $this->add($Notification);
        }
    }

    /**
     * Verify if there are any notifications
     *
     * @return boolean
     */
    public function hasAny()
    {
        return ($this->count() > 0);
    }

    /**
     * Get the notifications formatted as a string
     *
     * @return string
     */
    public function toString()
    {
        $collectionString = '';

        /** @var Notification $item */
        foreach ($this->getArrayCopy() as $label => $item) {
            $collectionString .= $item->toString();
            $collectionString .= PHP_EOL;
        }

        return $collectionString;
    }

    /**
     * Get the notifications formatted as an array
     *
     * @param bool $assoc
     * @return array
     */
    public function toArray($assoc = true)
    {
        $collection = [];

        /** @var Notification $item */
        foreach ($this->getArrayCopy() as $label => $item) {
            $collection[$label] = $item->toArray($assoc);
        }

        return $collection;
    }

    /**
     * Get the notifications formatted as a short array
     *
     * @param bool $assoc
     * @return array
     */
    public function toShortArray($assoc = true)
    {
        $collection = [];

        /** @var Notification $item */
        foreach ($this->getArrayCopy() as $label => $item) {
            $collection[$label] = $item->toShortArray($assoc);
        }

        return $collection;
    }

    /**
     * Get the notifications formatted as a custom data structure
     *
     * @param string $structure
     * @param bool $assoc
     * @return mixed
     */
    public function toOutput($structure = 'shortArray', $assoc = true)
    {
        switch ($structure) {
            case 'string':
                $output = $this->toString();
                break;
            case 'array':
                $output = $this->toArray($assoc);
                break;
            case 'shortArray':
            default:
                $output = $this->toShortArray($assoc);
                break;
        }
        return $output;
    }

    /**
     * @param int $options
     * @param string $structure
     * @param bool $assoc
     * @return string
     */
    public function toJson($options = 0, $structure = 'shortArray', $assoc = true)
    {
        return json_encode(
            $this->toOutput($structure, $assoc),
            $options
        );
    }

    public function __toString()
    {
        return $this->toString();
    }
}
