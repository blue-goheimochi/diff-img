<?php

class DiffImgTest extends \PHPUnit_Framework_TestCase
{
    public function testSample()
    {
        $val = \DiffImg\Compare::test();
        $this->assertEquals('test', $val);
    }
}
