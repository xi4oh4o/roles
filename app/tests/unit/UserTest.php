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
class UserTest extends PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $user = new User;
        $this->assertTrue(User::loginVertify( $username, $password ));
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
}

