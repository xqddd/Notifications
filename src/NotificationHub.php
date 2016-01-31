<?php
namespace Xqddd\Notifications;

use Psr\Log\LoggerInterface;

/**
 * NotificationHub class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class NotificationHub
{
    const DEFAULT_GROUP = 'Generic';

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var NotificationCollection[]
     */
    protected $notificationCollections = [];

    /**
     * NotificationHub constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Check if a group of notification collections exists
     *
     * @param $group
     * @return bool
     */
    public function exists($group)
    {
        return array_key_exists($group, $this->notificationCollections);
    }

    /**
     * Get a notification collection by its group
     *
     * @param $group
     * @return NotificationCollection|null
     */
    public function get($group)
    {
        return $this->exists($group)
            ? $this->notificationCollections[$group]
            : null;
    }

    /**
     * Add a notification collection
     *
     * @param NotificationCollection $notificationCollection
     * @param string $group
     */
    public function add(NotificationCollection $notificationCollection, $group = null)
    {
        if (null === $group) {
            $group = static::DEFAULT_GROUP;
        }
        if ($this->exists($group)) {
            $this->notificationCollections[$group]->addMany($notificationCollection);
        } else {
            $this->notificationCollections[$group] = $notificationCollection;
        }
    }

    /**
     * Place a notification collection by its group
     * Warning! This overwrites the group if it already exists
     *
     * @param NotificationCollection $notificationCollection
     * @param string $group
     * @return bool
     */
    public function place(NotificationCollection $notificationCollection, $group)
    {
        return $this->notificationCollections[$group] = $notificationCollection;
    }

    /**
     * Remove a notification collection by its group
     *
     * @param string $group
     */
    public function clear($group = self::DEFAULT_GROUP)
    {
        if ($this->exists($group)) {
            unset($this->notificationCollections[$group]);
        }
    }

    /**
     * Check if there are any notification collections on the hub
     *
     * @return bool
     */
    public function hasAny()
    {
        return (!empty($this->notificationCollections));
    }

    /**
     * Log all the Notifications and clear them
     */
    public function flush()
    {
        $this->logAll();
        $this->clearAll();
    }

    /**
     * Iterate through all the notification collections and log all the notifications
     */
    protected function logAll()
    {
        /**
         * @var string $group
         * @var NotificationCollection $notificationCollection
         */
        foreach ($this->notificationCollections as $group => $notificationCollection) {
            /**
             * @var string $label
             * @var Notification $notification
             */
            foreach ($notificationCollection as $label => $notification) {
                $this->logger->log(
                    $notification->getType(),
                    $group . ' ' . $notification,
                    $notification->toArray()
                );
            }
        }
    }

    /**
     * Remove all the Notification Collections
     */
    public function clearAll()
    {
        /*	
         * Free the memory	
         */
        unset($this->notificationCollections);
        /*	
         * Reset the array	
         */
        $this->notificationCollections = [];
    }

    /**
     * Get all the notification collections
     *
     * @param bool $keepGrouping Whether to keep the grouping or merge all the collections into default group
     * @return NotificationCollection[]
     */
    public function getAll($keepGrouping = true)
    {
        return (true === $keepGrouping)
            ? $this->notificationCollections
            : $this->getMergedNotificationGroups();
    }

    /**
     * Get all the notification colllections merged into default group
     *
     * @return NotificationCollection[]
     */
    protected function getMergedNotificationGroups()
    {
        $returnNotificationCollection = new NotificationCollection();
        foreach ($this->notificationCollections as $notificationCollection) {
            $returnNotificationCollection->addMany($notificationCollection);
        }
        return [
            self::DEFAULT_GROUP => $returnNotificationCollection
        ];
    }
}