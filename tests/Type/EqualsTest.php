<?php
namespace Tests\Type;

use Xqddd\Notifications\Type;

class EqualsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with a different object with same class and value will return true
     */
    public function testWhenCalledWithADifferentObjectWithSameClassAndValueWillReturnTrue()
    {
        $typeValue = 'testing';
        $type = new Type($typeValue);
        $typeTwo = new Type($typeValue);

        static::assertTrue(
            $type->equals($typeTwo)
        );
    }

    /**
     * When called with a different object with same class and different value will return false
     */
    public function testWhenCalledWithADifferentObjectWithSameClassAndDifferentValueWillReturnFalse()
    {
        $typeValue = 'testing';
        $typeValueTwo = 'notTesting';
        $type = new Type($typeValue);
        $typeTwo = new Type($typeValueTwo);

        static::assertFalse(
            $type->equals($typeTwo)
        );
    }

    /**
     * When called with a different object with different class will throw an exception
     */
    public function testWhenCalledWithADifferentObjectWithDifferentClassWillThrowAnException()
    {
        $typeValue = 'testing';
        $typeValueTwo = 'notTesting';
        $type = new Type($typeValue);
        $typeTwo = new \stdClass();
        $typeTwo->value = $typeValueTwo;


        try {
            $type->equals($typeTwo);
        } catch (\PHPUnit_Framework_Error $e) {
            static::assertStringStartsWith(
                'Argument 1 passed to Xqddd\Notifications\Type::equals() must be an instance of Xqddd\Notifications\Type,',
                $e->getMessage()
            );
            static::assertEquals(4096, $e->getCode());
        }
    }
}
