<?php
namespace Tests\Label;

use Xqddd\Notifications\Label;

class GetValueTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called will return the value stored
     */
    public function testWhenCalledWillReturnTheValueStored()
    {
        $labelValue = 'testing';
        $label = new Label($labelValue);

        static::assertSame(
            $labelValue,
            $label->getValue()
        );
    }
}
