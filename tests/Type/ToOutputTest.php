<?php
namespace Tests\Type;

use Xqddd\Notifications\Type;

class ToOutputTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with 'string' will return the string representation
     */
    public function testWhenCalledWithStringWillReturnTheStringRepresentation()
    {
        $typeValue = 'testing';
        $type = new Type($typeValue);

        static::assertInternalType(
            'string',
            $type->toOutput('string')
        );
        static::assertEquals(
            $typeValue,
            $type->toOutput('string')
        );

        return [
            $typeValue,
            $type
        ];
    }

    /**
     * When called with 'array' and true or without the second parameter will return the associative array representation
     *
     * @depends testWhenCalledWithStringWillReturnTheStringRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithArrayAndTrueOrWithoutTheSecondParameterWillReturnTheAssociativeArrayRepresentation($params)
    {
        /** @var Type $type */
        list($typeValue, $type) = $params;

        static::assertEquals(
            [
                'type' => $typeValue
            ],
            $type->toOutput('array', true)
        );
        static::assertEquals(
            [
                'type' => $typeValue
            ],
            $type->toOutput('array')
        );
    }

    /**
     * When called with 'array' and false will return the non associative array representation
     *
     * @depends testWhenCalledWithStringWillReturnTheStringRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithFalseWillReturnTheNonAssociativeArrayRepresentation($params)
    {
        /** @var Type $type */
        list($typeValue, $type) = $params;

        static::assertEquals(
            [$typeValue],
            $type->toOutput('array', false)
        );
    }


    /**
     * When called with random string and true or without the second parameter will return the associative array representation
     *
     * @depends testWhenCalledWithStringWillReturnTheStringRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithRandomStringAndTrueOrWithoutTheSecondParameterWillReturnTheAssociativeArrayRepresentation($params)
    {
        /** @var Type $type */
        list($typeValue, $type) = $params;

        static::assertEquals(
            [
                'type' => $typeValue
            ],
            $type->toOutput('r4nd0m$tr1ng', true)
        );
        static::assertEquals(
            [
                'type' => $typeValue
            ],
            $type->toOutput('r4nd0m$tr1ng')
        );
    }

    /**
     * When called with random string and false will return the non associative array representation
     *
     * @depends testWhenCalledWithStringWillReturnTheStringRepresentation
     *
     * @param array $params
     */
    public function testWhenCalledWithRandomStringAndFalseWillReturnTheNonAssociativeArrayRepresentation($params)
    {
        /** @var Type $type */
        list($typeValue, $type) = $params;

        static::assertEquals(
            [$typeValue],
            $type->toOutput('r4nd0m$tr1ng2', false)
        );
    }
}
