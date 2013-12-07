<?php
/**
 * Roles - Salt Components
 * @package Roles User
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
/**
 * Salt encrypt Password Class
 * @example Salt::generateSalt( $password )
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
/**
 * Had been abolished
 */
class Salt
{
    /**
     * generateSalt Function
     * using generate random salt confusing password.
     * and save confusing password.
     * @var $salt integer 1/10 Million random Num
     * @var $hash string md5 encrypt password
     * @var $salt_hash string salt+hash after md5 encrypt
     * @author Howe Isamu <xi4oh4o@gmail.com>
     */
    public static function generateSalt( $passwd ) {
        $salt      = mt_rand( 100000, 999999 );
        $hash      = md5( $passwd );
        $salt_hash = md5( $salt.$hash );
        return $salt_hash;
    }
}
