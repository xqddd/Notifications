<?php
namespace Tests\Label;

use Xqddd\Notifications\Label;

class ToOutputTest extends \PHPUnit_Framework_TestCase
{

    /**
     * When called with 'string' will return the string representation
     */
    public function testWhenCalledWithStringWillReturnTheStringRepresentation()
    {
        $labelValue = 'testing';
        $label = new Label($labelValue);

        static::assertInternalType(
            'string',
            $label->toOutput('string')
        );
        static::assertEquals(
            $labelValue,
            $label->toOutput('string')
        );

        return [
            $labelValue,
            $label
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
        /** @var Label $label */
        list($labelValue, $label) = $params;

        static::assertEquals(
            [
                'label' => $labelValue
            ],
            $label->toOutput('array', true)
        );
        static::assertEquals(
            [
                'label' => $labelValue
            ],
            $label->toOutput('array')
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
        /** @var Label $label */
        list($labelValue, $label) = $params;

        static::assertEquals(
            [$labelValue],
            $label->toOutput('array', false)
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
        /** @var Label $label */
        list($labelValue, $label) = $params;

        static::assertEquals(
            [
                'label' => $labelValue
            ],
            $label->toOutput('r4nd0m$tr1ng', true)
        );
        static::assertEquals(
            [
                'label' => $labelValue
            ],
            $label->toOutput('r4nd0m$tr1ng')
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
        /** @var Label $label */
        list($labelValue, $label) = $params;

        static::assertEquals(
            [$labelValue],
            $label->toOutput('r4nd0m$tr1ng2', false)
        );
    }
}
