<?php
namespace Xqddd\Notifications;

/**
 * A trait implementing the "toOutput" and "toJson" methods with a basic usage
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
trait PresentableTrait
{

    public abstract function toString();

    public abstract function toArray($assoc = true);

    /**
     * Get the public representation of the object
     *
     * @param string $structure
     * @param bool $assoc
     * @return array|string
     */
    public function toOutput($structure, $assoc = true)
    {
        switch ($structure) {
            case 'string':
                $output = $this->toString();
                break;
            case 'array':
            default:
                $output = $this->toArray($assoc);
                break;
        }
        return $output;
    }

    /**
     * Get the JSON representation of the object
     *
     * @param int $options
     * @param string $structure
     * @param bool $assoc
     * @return string
     */
    public function toJson($options = 0, $structure, $assoc = true)
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
