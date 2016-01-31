<?php
namespace Tests\Label;

use Xqddd\Notifications\Label;

class ToJsonTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with options and 'string' will return the string representation in a JSON string
     */
    public function testWhenCalledWithOptionsAndStringWillReturnTheStringRepresentationInAJSONString()
    {
        $labelValue = 'testing';
        $label = new Label($labelValue);

        $options = 0;

        static::assertInternalType(
            'string',
            $label->toJson($options, 'string')
        );
        static::assertEquals(
            json_encode($labelValue, $options),
            $label->toJson($options, 'string')
        );

        return [
            $labelValue,
            $label,
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
        /** @var Label $label */
        list($labelValue, $label, $options) = $params;

        static::assertEquals(
            json_encode(
                [
                    'label' => $labelValue
                ],
                $options
            ),
            $label->toJson($options, 'array', true)
        );
        static::assertEquals(
            json_encode(
                [
                    'label' => $labelValue
                ],
                $options
            ),
            $label->toJson($options, 'array')
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
        /** @var Label $label */
        list($labelValue, $label, $options) = $params;

        static::assertEquals(
            json_encode(
                [$labelValue],
                $options
            ),
            $label->toJson($options, 'array', false)
        );
    }

}
