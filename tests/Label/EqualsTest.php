<?php
namespace Tests\Label;

use Xqddd\Notifications\Label;

class EqualsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with a different object with same class and value will return true
     */
    public function testWhenCalledWithADifferentObjectWithSameClassAndValueWillReturnTrue()
    {
        $labelValue = 'testing';
        $label = new Label($labelValue);
        $labelTwo = new Label($labelValue);

        static::assertTrue(
            $label->equals($labelTwo)
        );
    }

    /**
     * When called with a different object with same class and different value will return false
     */
    public function testWhenCalledWithADifferentObjectWithSameClassAndDifferentValueWillReturnFalse()
    {
        $labelValue = 'testing';
        $labelValueTwo = 'notTesting';
        $label = new Label($labelValue);
        $labelTwo = new Label($labelValueTwo);

        static::assertFalse(
            $label->equals($labelTwo)
        );
    }

    /**
     * When called with a different object with different class will throw an exception
     */
    public function testWhenCalledWithADifferentObjectWithDifferentClassWillThrowAnException()
    {
        $labelValue = 'testing';
        $labelValueTwo = 'notTesting';
        $label = new Label($labelValue);
        $labelTwo = new \stdClass();
        $labelTwo->value = $labelValueTwo;


        try {
            $label->equals($labelTwo);
        } catch (\PHPUnit_Framework_Error $e) {
            static::assertStringStartsWith(
                'Argument 1 passed to Xqddd\Notifications\Label::equals() must be an instance of Xqddd\Notifications\Label,',
                $e->getMessage()
            );
            static::assertEquals(4096, $e->getCode());
        }
    }
}
