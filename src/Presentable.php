<?php
namespace Xqddd\Notifications;

/**
 * Interface Presentable
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
interface Presentable
{

    /**
     * Get the string representation of the object
     *
     * @return string
     */
    public function toString();

    /**
     * Get the array representation of the object
     *
     * @param bool $assoc Whether the array returned should be associative or not
     * @return array
     */
    public function toArray($assoc = true);

    /**
     * Get the public representation of the object
     *
     * Depending of its implementation, this can be any type and it represents the
     * object's public data available to any external usage
     *
     * Any complex representation logic that does not fit with the more common "toString" and "toArray" methods
     * should be implemented here
     *
     * @param string $structure The type of structure to be returned (e.g.: the logic may be implemented with a switch)
     * @param bool $assoc Whether the structure returned should be associative or not
     * @return mixed
     */
    public function toOutput($structure, $assoc = true);

    /**
     * Get the JSON representation of the object
     *
     * This should usually be used as a JSON wrapper for the public representation of the object ("toOutput" method)
     *
     * @param int $options
     * @param string $structure The type of structure to be returned (e.g.: the logic may be implemented with a switch)
     * @param bool $assoc Whether the JSON structure returned should be associative or not
     * @return string
     */
    public function toJson($options = 0, $structure, $assoc = true);

    public function __toString();
}
