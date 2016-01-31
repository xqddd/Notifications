<?php
namespace Tests\Message;

use Xqddd\Notifications\Message;

class EqualsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with a different object with same class and value will return true
     */
    public function testWhenCalledWithADifferentObjectWithSameClassAndValueWillReturnTrue()
    {
        $messageValue = 'testing';
        $message = new Message($messageValue);
        $messageTwo = new Message($messageValue);

        static::assertTrue(
            $message->equals($messageTwo)
        );
    }

    /**
     * When called with a different object with same class and different value will return false
     */
    public function testWhenCalledWithADifferentObjectWithSameClassAndDifferentValueWillReturnFalse()
    {
        $messageValue = 'testing';
        $messageValueTwo = 'notTesting';
        $message = new Message($messageValue);
        $messageTwo = new Message($messageValueTwo);

        static::assertFalse(
            $message->equals($messageTwo)
        );
    }

    /**
     * When called with a different object with different class will throw an exception
     */
    public function testWhenCalledWithADifferentObjectWithDifferentClassWillThrowAnException()
    {
        $messageValue = 'testing';
        $messageValueTwo = 'notTesting';
        $message = new Message($messageValue);
        $messageTwo = new \stdClass();
        $messageTwo->value = $messageValueTwo;


        try {
            $message->equals($messageTwo);
        } catch (\PHPUnit_Framework_Error $e) {
            static::assertStringStartsWith(
                'Argument 1 passed to Xqddd\Notifications\Message::equals() must be an instance of Xqddd\Notifications\Message,',
                $e->getMessage()
            );
            static::assertEquals(4096, $e->getCode());
        }
    }
}
