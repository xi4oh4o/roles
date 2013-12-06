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
    public static function createUser( $args ) {
        $salt      = mt_rand( 100000, 999999 );
        $hash      = md5( $password );
        $salt_hash = md5( $salt.$hash );
        $Db = Db::GetPDO( DB_DSN, DB_USER, DB_PASS, NULL);
        $insertUser = "INSERT INTO `roles`.`roles_user` (`uid`,
            `username`, `email`, `bio`, `groups`) VALUES (NULL,
            '{$username}', '{$email}', '{$bio}', '{$groups}')";
    }

    public static function readUser() {}

    public static function updateUser() {}

    public static function deleteUser() {}

    public static function verifyUser( $args ) {
        $username = $args['username'];
        $password = $args['password'];
        //Get PDO Object
        $Db = Db::GetPDO( DB_DSN, DB_USER, DB_PASS, NULL);
        //Select User and Salt
        $selectUserSQL = "
            SELECT
            `username`,`salt`,`hash`
            FROM
            `roles_user`,`roles_salt`
            WHERE `username` = '{$username}'";
        //Prepare and Execute SQL statment
        $queryUser = $Db->prepare($selectUserSQL);
        try {
            $queryUser->execute();
        } catch (Exception $e) { return; }
        $user = $queryUser->fetch();

        //Generate Salt hash Used to verify
        $salt = $user['salt'];
        $hash = md5( $password );
        $salt_hash = md5( $salt.$hash );
        //Print the verify return value
        echo $salt_hash == $user['hash'] ? 'succeed' : 'failure';
    }
}
