<?php
namespace Tests\Type;

use Xqddd\Notifications\Type;

class ToArrayTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called will return the array representation
     */
    public function testWhenCalledWillReturnTheArrayRepresentation()
    {
        $typeValue = 'testing';
        $type = new Type($typeValue);

        static::assertInternalType(
            'array',
            $type->toArray()
        );

        return [
            $typeValue,
            $type
        ];
    }

    /**
     * When called with true or without parameter will return the associative array representation
     *
     * @depends testWhenCalledWillReturnTheArrayRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithTrueOrWithoutParameterWillReturnTheAssociativeArrayRepresentation($params)
    {
        /** @var Type $type */
        list($typeValue, $type) = $params;

        static::assertEquals(
            [
                'type' => $typeValue
            ],
            $type->toArray(true)
        );
        static::assertEquals(
            [
                'type' => $typeValue
            ],
            $type->toArray()
        );
    }

    /**
     * When called with false will return the non associative array representation
     *
     * @depends testWhenCalledWillReturnTheArrayRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithFalseWillReturnTheNonAssociativeArrayRepresentation($params)
    {
        /** @var Type $type */
        list($typeValue, $type) = $params;

        static::assertEquals(
            [$typeValue],
            $type->toArray(false)
        );
    }

}
