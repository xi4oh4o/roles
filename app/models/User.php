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
    public static function listUser() {
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
                <td>".$value['bio']."</td>
                <td><a href='edit/{$value['uid']}'>Edit</a> | <a href='delete/{$value['uid']}'>Delete</a></td>
                </tr>";
        }
    }

    public static function updateUser() {}

    public static function deleteUser() {}

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
            `username`,`groups`,`salt`,`hash`
            FROM
            `roles_user`,`roles_salt`
            WHERE `username` = '{$username}'";
        //Prepare and Execute SQL statment
        $queryUser = $Db->prepare($selectUserSQL);
        try {
            $queryUser->execute();
        } catch (Exception $e) { return; }
        $userResult = $queryUser->fetch();

        //Generate Salt hash Used to verify
        $salt = $userResult['salt'];
        $hash = md5( $password );
        $salt_hash = md5( $salt.$hash );
        //Print the verify return value
        if ( $salt_hash == $userResult['hash'] ) {
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
