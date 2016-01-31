<?php
namespace Tests\Type;

use Xqddd\Notifications\Type;

class ToStringTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called will return the string representation
     */
    public function testWhenCalledWillReturnTheStringRepresentation()
    {
        $typeValue = 'testing';
        $type = new Type($typeValue);

        static::assertInternalType(
            'string',
            $type->toString()
        );
        static::assertEquals(
            $typeValue,
            $type->toString()
        );
    }
}
