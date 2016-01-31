<?php
namespace Tests\Type;

use Xqddd\Notifications\Type;

class ConstructTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with string value will store the value
     */
    public function testWhenCalledWithStringValueWillStoreTheValue()
    {
        $typeValue = 'testing';
        $type = new Type($typeValue);

        static::assertSame(
            $typeValue,
            \PHPUnit_Framework_Assert::readAttribute($type, 'value')
        );
    }

    /**
     * When called with non string value will throw an exception
     *
     * @dataProvider nonStringValues
     *
     * @param mixed $typeValue
     *
     * @expectedException \Xqddd\Notifications\Exceptions\InvalidNotificationTypeException
     * @expectedExceptionCode 302
     * @expectedExceptionMessageRegExp /Invalid \[(\w)*\] notification type: \[(\w)*\] expected - \[(\w)*\] given./
     */
    public function testWhenCalledWithNonStringValueWillThrowAnException($typeValue)
    {
        $type = new Type($typeValue);
    }

    public function nonStringValues()
    {
        /**
         * An array of integers
         * @var array
         */
        $intReturn = [123, 456, 789];

        $object1 = new \stdClass();
        $object1->test = 123;
        $object2 = new \stdClass();
        $object2->wow = 456;
        $object3 = new \stdClass();
        $object3->great = 789;

        /**
         * An array of objects
         * @var array
         */
        $objectReturn = [$object1, $object2, $object3];

        /**
         * An array of mixed values
         * @var array
         */
        $mixedReturn = [123, $object2, $intReturn];

        return [
            array_merge(
                $intReturn,
                $objectReturn,
                $mixedReturn
            )
        ];
    }

}
