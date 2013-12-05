<?php
/**
 * phpUnit SaltTest
 * @package Roles User
 * @usage phpunit app/tests/unit
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
/*
|--------------------------
| Unit test Salt Components
|--------------------------
*/
require '../../components/Salt.php';
class SaltTest extends PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $salt_hash = Salt::generateSalt( '912913' );
        $this->assertRegExp( '/\w{32}\b/', $salt_hash );
    }
}
