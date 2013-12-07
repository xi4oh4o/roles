<?php
/**
 * Roles - User Controller
 * @package Roles Controller
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
class UserController extends Controller
{

    /**
     * Verify Action
     * Validation of the POST parameter
     * and set session
     */
    function verifyAction() {
        if (!empty($_POST)) {
            User::verifyUser( $_POST );
        } else {
            print 'authentication failer';
            return 'failure';
        }
    }

    /**
     * Panel Action
     * User panel Use to display user information
     */
    function panelAction() {
        session_start();
        if ( isset( $_SESSION['is_login']) && $_SESSION['is_login'] === true ) {
            if ( isset( $_POST['condition'] ) && $_POST['condition'] == 'getList' ) {
            }
        } else {
            echo "Unauthorized access";
        }
    }
    /**
     * list Action
     * User List Use to display user list
     */
    function listAction() {
        session_start();
        if ( isset( $_SESSION['is_login']) && $_SESSION['is_login'] === true ) {
            if ( isset( $_POST['condition'] ) && $_POST['condition'] == 'getList' ) {
                User::listUser();
            }
        }
    }
    /**
     * logout Action
     * Used to quit the user
     */
    function logoutAction() {
        //Start and Destroy All Session.
        session_start();
        session_destroy();
        //redirect to index
        header('Location: /');
    }
}
