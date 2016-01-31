<?php
namespace Tests\Message;

use Xqddd\Notifications\Message;

class ToStringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called will return the string representation
     */
    public function testWhenCalledWillReturnTheStringRepresentation()
    {
        $messageValue = 'testing';
        $message = new Message($messageValue);

        static::assertInternalType(
            'string',
            $message->toString()
        );
        static::assertEquals(
            $messageValue,
            $message->toString()
        );
    }
}
