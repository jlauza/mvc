<?php

use PHPUnit\Framework\TestCase;

class MyFrameworkTest extends TestCase
{
    public function testAddition()
    {
        $result = 2 + 2;
        $this->assertEquals(4, $result);
    }

    public function testStringConcatenation()
    {
        $str1 = "Hello";
        $str2 = "World";
        $result = $str1 . $str2;
        $this->assertEquals("HelloWorld", $result);
    }
}
