<?php
namespace Tests\Type;

use Xqddd\Notifications\Type;

class __ToStringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When the object is treated as a string will return the string representation
     */
    public function testWhenTheObjectIsTreatedAsAStringWillReturnTheStringRepresentation()
    {
        $typeValue = 'testing';
        $type = new Type($typeValue);

        static::assertEquals(
            $typeValue . '_suffix',
            $type . '_suffix'
        );
    }
}
