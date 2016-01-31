<?php
namespace Tests\Label;

use Xqddd\Notifications\Label;

class ToArrayTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called will return the array representation
     */
    public function testWhenCalledWillReturnTheArrayRepresentation()
    {
        $labelValue = 'testing';
        $label = new Label($labelValue);

        static::assertInternalType(
            'array',
            $label->toArray()
        );

        return [
            $labelValue,
            $label
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
        /** @var Label $label */
        list($labelValue, $label) = $params;

        static::assertEquals(
            [
                'label' => $labelValue
            ],
            $label->toArray(true)
        );
        static::assertEquals(
            [
                'label' => $labelValue
            ],
            $label->toArray()
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
        /** @var Label $label */
        list($labelValue, $label) = $params;

        static::assertEquals(
            [$labelValue],
            $label->toArray(false)
        );
    }

}
