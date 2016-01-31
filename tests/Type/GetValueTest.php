<?php
namespace Tests\Type;

use Xqddd\Notifications\Type;

class GetValueTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called will return the value stored
     */
    public function testWhenCalledWillReturnTheValueStored()
    {
        $typeValue = 'testing';
        $type = new Type($typeValue);

        static::assertSame(
            $typeValue,
            $type->getValue()
        );
    }
}
