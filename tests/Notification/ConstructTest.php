<?php
namespace Tests\Notifications\DomainException;

use Xqddd\Notifications\Notification;

class ConstructTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with string values will store the values
     */
    public function testWhenCalledWithStringValuesWillStoreTheValues()
    {
        $message = 'message';
        $label = 'label';

        $Notification = new Notification($message, $label);

        static::assertSame(
            $message,
            \PHPUnit_Framework_Assert::readAttribute($Notification, 'message')
        );
        static::assertSame(
            $label,
            \PHPUnit_Framework_Assert::readAttribute($Notification, 'label')
        );
    }

    /**
     * When called with non-string message will throw exception
     * @dataProvider nonStringValues
     * @param mixed $message
     * @param mixed $label
     * @expectedException \Xqddd\Notifications\Exceptions\InvalidNotificationMessageException
     * @expectedExceptionCode 202
     * @expectedExceptionMessageRegExp /Invalid \[(\w)*\] notification message: \[(\w)*\] expected - \[(\w)*\] given./
     */
    public function testWhenCalledWithNonStringMessageWillThrowException($message, $label)
    {
        $Notification = new Notification($message, 'label');
    }

    /**
     * When called with non-string label will throw exception
     * @dataProvider nonStringValues
     * @param mixed $message
     * @param mixed $label
     * @expectedException \Xqddd\Notifications\Exceptions\InvalidNotificationLabelException
     * @expectedExceptionCode 102
     * @expectedExceptionMessageRegExp /Invalid \[(\w)*\] notification label: \[(\w)*\] expected - \[(\w)*\] given./
     */
    public function testWhenCalledWithNonStringLabelWillThrowException($message, $label)
    {
        $Notification = new Notification('message', $label);
    }

    public function nonStringValues()
    {
        /**
         * An array of ints
         * @var array
         */
        $intReturn = [123, 456];

        $object1 = new \stdClass();
        $object1->test = 123;
        $object2 = new \stdClass();
        $object2->wow = 456;
        /**
         * An array of objects
         * @var array
         */
        $objectReturn = [$object1, $object2];

        /**
         * An array of mixed values
         * @var array
         */
        $mixedReturn = [123, $object2];

        return [
            $intReturn,
            $objectReturn,
            $mixedReturn
        ];
    }

}
