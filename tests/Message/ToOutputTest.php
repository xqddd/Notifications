<?php
namespace Tests\Message;

use Xqddd\Notifications\Message;

class ToOutputTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with 'string' will return the string representation
     */
    public function testWhenCalledWithStringWillReturnTheStringRepresentation()
    {
        $messageValue = 'testing';
        $message = new Message($messageValue);

        static::assertInternalType(
            'string',
            $message->toOutput('string')
        );
        static::assertEquals(
            $messageValue,
            $message->toOutput('string')
        );

        return [
            $messageValue,
            $message
        ];
    }

    /**
     * When called with 'array' and true or without the second parameter will return the associative array representation
     *
     * @depends testWhenCalledWithStringWillReturnTheStringRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithArrayAndTrueOrWithoutTheSecondParameterWillReturnTheAssociativeArrayRepresentation($params)
    {
        /** @var Message $message */
        list($messageValue, $message) = $params;

        static::assertEquals(
            [
                'message' => $messageValue
            ],
            $message->toOutput('array', true)
        );
        static::assertEquals(
            [
                'message' => $messageValue
            ],
            $message->toOutput('array')
        );
    }

    /**
     * When called with 'array' and false will return the non associative array representation
     *
     * @depends testWhenCalledWithStringWillReturnTheStringRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithFalseWillReturnTheNonAssociativeArrayRepresentation($params)
    {
        /** @var Message $message */
        list($messageValue, $message) = $params;

        static::assertEquals(
            [$messageValue],
            $message->toOutput('array', false)
        );
    }


    /**
     * When called with random string and true or without the second parameter will return the associative array representation
     *
     * @depends testWhenCalledWithStringWillReturnTheStringRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithRandomStringAndTrueOrWithoutTheSecondParameterWillReturnTheAssociativeArrayRepresentation($params)
    {
        /** @var Message $message */
        list($messageValue, $message) = $params;

        static::assertEquals(
            [
                'message' => $messageValue
            ],
            $message->toOutput('r4nd0m$tr1ng', true)
        );
        static::assertEquals(
            [
                'message' => $messageValue
            ],
            $message->toOutput('r4nd0m$tr1ng')
        );
    }

    /**
     * When called with random string and false will return the non associative array representation
     *
     * @depends testWhenCalledWithStringWillReturnTheStringRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithRandomStringAndFalseWillReturnTheNonAssociativeArrayRepresentation($params)
    {
        /** @var Message $message */
        list($messageValue, $message) = $params;

        static::assertEquals(
            [$messageValue],
            $message->toOutput('r4nd0m$tr1ng2', false)
        );
    }
}
