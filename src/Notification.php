<?php
namespace Xqddd\Notifications;
use Xqddd\Presentable\Presentable;

/**
 * Notification class
 *
 * @author Andrei Pirjoleanu <andreipirjoleanu@gmail.com>
 * @package Xqddd\Notifications
 */
class Notification implements NotificationInterface, Presentable
{

    /**
     * The notification label
     *
     * @var Label
     */
    protected $label;

    /**
     * The notification message
     *
     * @var Message
     */
    protected $message;

    /**
     * The notification type
     *
     * @var Type
     */
    protected $type;

    /**
     * @var Context
     */
    protected $context;

    /**
     * Notification constructor.
     *
     * @param Label $label
     * @param Type $type
     * @param Message $message
     * @param Context $context
     */
    public function __construct(Label $label, Message $message, Type $type, Context $context)
    {
        $this->setLabel($label);
        $this->setMessage($message);
        $this->setType($type);
        $this->setContext($context);
    }

    /**
     * Get the notification label
     *
     * @return Label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the notification label
     *
     * @param Label $label
     */
    protected function setLabel(Label $label)
    {
        $this->label = $label;
    }


    /**
     * Get the notification message
     *
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the notification message
     *
     * @param Message $message
     */
    protected function setMessage(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification type
     *
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the notification type
     *
     * @param Type $type
     */
    protected function setType(Type $type)
    {
        $this->type = $type;
    }

    /**
     * Get the notification context
     *
     * @return Context
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set the notification context
     *
     * @param Context $context
     */
    protected function setContext(Context $context)
    {
        $this->context = $context;
    }

    /**
     * Get the notification formatted as a string
     *
     * @return string
     */
    public function toString()
    {
        return sprintf(
            '%s: [%s] - %s - {%s}',
            ucfirst($this->getType()->toString()),
            $this->getLabel()->toString(),
            $this->getMessage()->toString(),
            $this->getContext()->toString()
        );
    }

    /**
     * Get the notification formatted as an array
     *
     * @param bool $assoc
     * @return array
     */
    public function toArray($assoc = true)
    {
        return array_merge(
            $this->getLabel()->toArray($assoc),
            $this->getMessage()->toArray($assoc),
            $this->getType()->toArray($assoc),
            $this->getContext()->toArray($assoc)
        );
    }

    /**
     * Get the notification formatted as a short array
     *
     * If associative: [$label => $message]
     * Else: [$message]
     *
     * @param bool $assoc
     * @return array
     */
    public function toShortArray($assoc = true)
    {
        if (true === $assoc) {
            return [
                $this->getLabel()->toString() => $this->getMessage()->toString()
            ];
        } else {
            return [
                $this->getMessage()->toString()
            ];
        }
    }

    /**
     * Get the notification formatted as a custom data structure
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
     * Get the notification formatted as a JSON string, by using a custom data structure
     *
     * @param string $structure
     * @param bool $assoc
     * @param int $options
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
