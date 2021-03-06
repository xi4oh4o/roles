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
    /**
     * listUser method
     * For all the user data is returned.
     */
    public static function listUser( $args ) {
        //Get PDO Object
        $Db = Db::GetPDO( DB_DSN, DB_USER, DB_PASS, NULL);
        //Select All User
        $selectAllUserSQL = "
            SELECT
            `uid`,`username`,`email`,`bio`,`groups`
            FROM
            `roles_user`
            WHERE 1";
        $queryAllUser = $Db->prepare( $selectAllUserSQL );
        try {
            $queryAllUser->execute();
        } catch (Exception $e) { return ;}
        $AllUserResult = $queryAllUser->fetchAll();
        echo '<tr><th>Username</th><th>Email</th><th>Bio</th><th>Operation</th></tr>';
        foreach ($AllUserResult as $value) {
            echo "
                <tr>
                <td>".$value['username']."</td>
                <td>".$value['email']."</td>
                <td>".$value['bio']."</td>";
            if ( $args == 0 ) {
                echo "
                <td><a href='view/{$value['username']}'>View</a> | <a href='edit/{$value['username']}'>Edit</a> | <a href='delete/{$value['uid']}'>Delete</a></td>
                </tr>";
            } else {
                echo "
                    <td><a href='view/{$value['username']}'>View</a> | <a href='edit/{$value['username']}'>Edit</a> | Delete</td>
                    ";
            }
        }
    }

    public static function viewUser() {
        //@todo According to the URI parameter query details
    }

    public static function updateUser() {
        //@todo According to the URI parameter update specific users
    }

    public static function deleteUser() {
        //@todo According to the URI to delete a particular user
    }

    /**
     * Validation of the $args parameter
     * @param array $args
     * @return string succeed or failure.
     */
    public static function verifyUser( $args ) {
        $username = $args['username'];
        $password = $args['password'];
        //Get PDO Object
        $Db = Db::GetPDO( DB_DSN, DB_USER, DB_PASS, NULL);
        //Select User and Salt
        $selectUserSQL = "
            SELECT
            `uid`,`username`,`groups`
            FROM
            `roles_user`
            WHERE `username` = '{$username}'";
        //Prepare and Execute SQL statment
        $queryUser = $Db->prepare( $selectUserSQL );
        try {
            $queryUser->execute();
        } catch (Exception $e) { return; }
        $userResult = $queryUser->fetch();
        $selectSalt = "
            SELECT
            `salt`,`hash`
            FROM
            `roles_salt`
            WHERE `sid` = '{$userResult['uid']}'
        ";
        $querySalt = $Db->prepare( $selectSalt );
        try {
            $querySalt->execute();
        } catch (Exception $e) { return; }
        $saltResult = $querySalt->fetch();
        //Generate Salt hash Used to verify
        $salt = $saltResult['salt'];
        $hash = md5( $password );
        $salt_hash = md5( $salt.$hash );
        //Print the verify return value
        if ( $salt_hash == $saltResult['hash'] ) {
            //Set Session
            session_start();
            $_SESSION['groups']   = $userResult['groups'];
            $_SESSION['is_login'] = true;
            //Return Ajax interaction
            echo 'succeed';
        } else {
            echo 'failure';
        }
    }
}
