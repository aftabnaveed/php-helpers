<?php

namespace AndreasGlaser\Helpers\Test;

use AndreasGlaser\Helpers\ArrayHelper;

/**
 * Class ArrayHelperTest
 *
 * @package AndreasGlaser\Helpers\Test
 * @author  Andreas Glaser
 */
class ArrayHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test array
     *
     * @var array
     */
    protected $array = [];

    /**
     * Associative test array
     *
     * @var array
     */
    protected $arrayAssoc = [];

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->array = [
            123,
            'Test',
            new \stdClass(),
            [],
            true,
            false
        ];

        $this->arrayAssoc = [
            'Index1' => 123,
            'Index2' => 'Test',
            'Index3' => new \stdClass(),
            'Index4' => [],
            'Index5' => true,
            'Index6' => false
        ];
    }

    public function testGet()
    {
        foreach ($this->array AS $key => $value) {
            $this->assertEquals($value, ArrayHelper::get($this->array, $key));
        }

        foreach ($this->arrayAssoc AS $key => $value) {
            $this->assertEquals($value, ArrayHelper::get($this->arrayAssoc, $key));
        }
    }
}
 