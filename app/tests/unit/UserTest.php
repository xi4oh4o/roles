<?php
/**
 * phpUnit UserTest
 * @package Roles
 * @usage phpunit app/tests/unit
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
/*
|------------------------------------
| Unit test User model crud function
|------------------------------------
 */
require '../../models/User.php';
require '../../core/Db.php';
class UserTest extends PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
    }

    public function testRead()
    {
    }

    public function testUpdate()
    {
    }

    public function testDelete()
    {
    }

    public function testVertify()
    {
        $args = array(
            'username' => 'admin',
            'password' => 'admin'
        );

        $this->assertEquals( 'succeed', User::verifyUser( $args ) );
    }
}

