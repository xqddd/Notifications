<?php
namespace Tests\Message;

use Xqddd\Notifications\Message;

class GetValueTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called will return the value stored
     */
    public function testWhenCalledWillReturnTheValueStored()
    {
        $messageValue = 'testing';
        $message = new Message($messageValue);

        static::assertSame(
            $messageValue,
            $message->getValue()
        );
    }
}
