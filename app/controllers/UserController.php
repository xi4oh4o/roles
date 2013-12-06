<?php
/**
 * Roles - User Controller
 * @package Roles Controller
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
class UserController extends Controller
{
    function verifyAction() {
        if (isset($_POST))
        User::verifyUser( $_POST );
    }
}
