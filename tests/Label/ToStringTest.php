<?php
namespace Tests\Label;

use Xqddd\Notifications\Label;

class ToStringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called will return the string representation
     */
    public function testWhenCalledWillReturnTheStringRepresentation()
    {
        $labelValue = 'testing';
        $label = new Label($labelValue);

        static::assertInternalType(
            'string',
            $label->toString()
        );
        static::assertEquals(
            $labelValue,
            $label->toString()
        );
    }
}
