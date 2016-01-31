<?php
namespace Tests\Label;

use Xqddd\Notifications\Label;

class __ToStringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When the object is treated as a string will return the string representation
     */
    public function testWhenTheObjectIsTreatedAsAStringWillReturnTheStringRepresentation()
    {
        $labelValue = 'testing';
        $label = new Label($labelValue);

        static::assertEquals(
            $labelValue . '_suffix',
            $label . '_suffix'
        );
    }
}
