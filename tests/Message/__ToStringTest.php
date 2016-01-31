<?php
namespace Tests\Message;

use Xqddd\Notifications\Message;

class __ToStringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When the object is treated as a string will return the string representation
     */
    public function testWhenTheObjectIsTreatedAsAStringWillReturnTheStringRepresentation()
    {
        $messageValue = 'testing';
        $message = new Message($messageValue);

        static::assertEquals(
            $messageValue . '_suffix',
            $message . '_suffix'
        );
    }
}
