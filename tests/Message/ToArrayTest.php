<?php
namespace Tests\Message;

use Xqddd\Notifications\Message;

class ToArrayTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called will return the array representation
     */
    public function testWhenCalledWillReturnTheArrayRepresentation()
    {
        $messageValue = 'testing';
        $message = new Message($messageValue);

        static::assertInternalType(
            'array',
            $message->toArray()
        );

        return [
            $messageValue,
            $message
        ];
    }

    /**
     * When called with true or without parameter will return the associative array representation
     *
     * @depends testWhenCalledWillReturnTheArrayRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithTrueOrWithoutParameterWillReturnTheAssociativeArrayRepresentation($params)
    {
        /** @var Message $message */
        list($messageValue, $message) = $params;

        static::assertEquals(
            [
                'message' => $messageValue
            ],
            $message->toArray(true)
        );
        static::assertEquals(
            [
                'message' => $messageValue
            ],
            $message->toArray()
        );
    }

    /**
     * When called with false will return the non associative array representation
     *
     * @depends testWhenCalledWillReturnTheArrayRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithFalseWillReturnTheNonAssociativeArrayRepresentation($params)
    {
        /** @var Message $message */
        list($messageValue, $message) = $params;

        static::assertEquals(
            [$messageValue],
            $message->toArray(false)
        );
    }

}
