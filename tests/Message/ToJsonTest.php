<?php
namespace Tests\Message;

use Xqddd\Notifications\Message;

class ToJsonTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with options and 'string' will return the string representation in a JSON string
     */
    public function testWhenCalledWithOptionsAndStringWillReturnTheStringRepresentationInAJSONString()
    {
        $messageValue = 'testing';
        $message = new Message($messageValue);

        $options = 0;

        static::assertInternalType(
            'string',
            $message->toJson($options, 'string')
        );
        static::assertEquals(
            json_encode($messageValue, $options),
            $message->toJson($options, 'string')
        );

        return [
            $messageValue,
            $message,
            $options
        ];
    }

    /**
     * When called with options, 'array' and true or without the third parameter will return the associative array representation in a JSON string
     *
     * @depends testWhenCalledWithOptionsAndStringWillReturnTheStringRepresentationInAJSONString
     *
     * @param array $params
     */
    public function testWhenCalledWithOptionsArrayAndTrueOrWithoutTheThirdParameterWillReturnTheAssociativeArrayRepresentationInAJSONString($params)
    {
        /** @var Message $message */
        list($messageValue, $message, $options) = $params;

        static::assertEquals(
            json_encode(
                [
                    'message' => $messageValue
                ],
                $options
            ),
            $message->toJson($options, 'array', true)
        );
        static::assertEquals(
            json_encode(
                [
                    'message' => $messageValue
                ],
                $options
            ),
            $message->toJson($options, 'array')
        );
    }

    /**
     * When called with 'array' and false will return the non associative array representation
     *
     * @depends testWhenCalledWithOptionsAndStringWillReturnTheStringRepresentationInAJSONString
     *
     * @param array $params
     */
    public function testWhenCalledWithFalseWillReturnTheNonAssociativeArrayRepresentation($params)
    {
        /** @var Message $message */
        list($messageValue, $message, $options) = $params;

        static::assertEquals(
            json_encode(
                [$messageValue],
                $options
            ),
            $message->toJson($options, 'array', false)
        );
    }

}
