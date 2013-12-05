<?php
/**
 * Roles - User Model
 * @package Roles
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
/**
 * createUser Function
 * using generate random salt confusing password,
 * and save confusing password.
 * @var $salt integer 1/10 Million random Num
 * @var $hash string md5 encrypt password
 * @var $salt_hash string salt+hash after md5 encrypt
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
class User
{
    public static function createUser( $POST ) {
        $salt      = mt_rand( 100000, 999999 );
        $hash      = md5( $passwd );
        $salt_hash = md5( $salt.$hash );
    }
}

