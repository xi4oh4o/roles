<?php
/**
 * Roles - User Controller
 * @package Roles Controller
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
class UserController extends Controller
{

    /**
     * Index Action
     * User the default
     */
    function indexAction() {
    }
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
            $this->is_login = true;
        } else {
            $this->is_login = false;
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
                User::listUser( $_SESSION['groups'] );
            }
        }
    }
    /**
     * view Action
     * The view action shows detailed information
     */
    function viewAction() {
        $params = explode( '/',$_SERVER['REQUEST_URI'] );
        $this->tips = "<h3>You are view detailed user：" . $params['3'] . "</h3>";
    }
    /**
     * edit Action
     * According to the user editor
     * @todo According to the parameters to achieve user information editing.
     */
    function editAction() {
        $params = explode( '/',$_SERVER['REQUEST_URI'] );
        $this->tips = "<h3>You are editing user：" . $params['3'] . "</h3>";
    }
    /**
     * delete Action
     * According to the user id to delete the user
     * @todo According to the parameters to delete the user
     */
    function deleteAction() {
        $params = explode( '/', $_SERVER['REQUEST_URI'] );
        $this->tips = "<h3>You are delete user：" . $params['3'] . "</h3>";
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
