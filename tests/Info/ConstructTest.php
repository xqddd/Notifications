<?php
namespace Tests\Info;

use Xqddd\Notifications\Label;
use Xqddd\Notifications\Message;
use Xqddd\Notifications\Info;

class ConstructTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with proper attributes will store the attributes
     */
    public function testWhenCalledWithProperAttributesWillStoreTheAttributes()
    {
        $label = new Label('label');
        $message = new Message('message');

        $Info = new Info($label, $message);

        static::assertSame(
            $label,
            \PHPUnit_Framework_Assert::readAttribute($Info, 'label')
        );
        static::assertSame(
            $message,
            \PHPUnit_Framework_Assert::readAttribute($Info, 'message')
        );
    }


    /**
     * When called with improper parameters will throw an exception
     *
     * @dataProvider nonStringValues
     *
     * @param $labelValue
     * @param $messageValue
     * @param $typeValue
     */
    public function testWhenCalledWithImproperParametersWillThrowAnException($labelValue, $messageValue, $typeValue)
    {
        $label = new Label('label');
        $message = new Message('message');

        try {
            $Info = new Info($labelValue, $message);
        } catch (\PHPUnit_Framework_Error $e) {
            static::assertStringStartsWith(
                'Argument 1 passed to Xqddd\Notifications\Info::__construct() must be an instance of Xqddd\Notifications\Label,',
                $e->getMessage()
            );
            static::assertEquals(4096, $e->getCode());
        }

        try {
            $Info = new Info($label, $messageValue);
        } catch (\PHPUnit_Framework_Error $e) {
            static::assertStringStartsWith(
                'Argument 2 passed to Xqddd\Notifications\Info::__construct() must be an instance of Xqddd\Notifications\Message,',
                $e->getMessage()
            );
            static::assertEquals(4096, $e->getCode());
        }
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
            $intReturn,
            $objectReturn,
            $mixedReturn
        ];
    }

}
