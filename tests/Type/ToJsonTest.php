<?php
namespace Tests\Type;

use Xqddd\Notifications\Type;

class ToJsonTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with options and 'string' will return the string representation in a JSON string
     */
    public function testWhenCalledWithOptionsAndStringWillReturnTheStringRepresentationInAJSONString()
    {
        $typeValue = 'testing';
        $type = new Type($typeValue);

        $options = 0;

        static::assertInternalType(
            'string',
            $type->toJson($options, 'string')
        );
        static::assertEquals(
            json_encode($typeValue, $options),
            $type->toJson($options, 'string')
        );

        return [
            $typeValue,
            $type,
            $options
        ];
    }

    /**
     * When called with options, 'array' and true or without the third parameter will return the associative array representation in a JSON string
     *
     * @depends testWhenCalledWithOptionsAndStringWillReturnTheStringRepresentationInAJSONString
     *
     * @param array $params
     */
    public function testWhenCalledWithOptionsArrayAndTrueOrWithoutTheThirdParameterWillReturnTheAssociativeArrayRepresentationInAJSONString($params)
    {
        /** @var Type $type */
        list($typeValue, $type, $options) = $params;

        static::assertEquals(
            json_encode(
                [
                    'type' => $typeValue
                ],
                $options
            ),
            $type->toJson($options, 'array', true)
        );
        static::assertEquals(
            json_encode(
                [
                    'type' => $typeValue
                ],
                $options
            ),
            $type->toJson($options, 'array')
        );
    }

    /**
     * When called with 'array' and false will return the non associative array representation
     *
     * @depends testWhenCalledWithOptionsAndStringWillReturnTheStringRepresentationInAJSONString
     *
     * @param array $params
     */
    public function testWhenCalledWithFalseWillReturnTheNonAssociativeArrayRepresentation($params)
    {
        /** @var Type $type */
        list($typeValue, $type, $options) = $params;

        static::assertEquals(
            json_encode(
                [$typeValue],
                $options
            ),
            $type->toJson($options, 'array', false)
        );
    }

}
