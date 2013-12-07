<?php
/**
 * Roles - Site Index Controller
 * @package Roles
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
class SiteController extends Controller
{
    function indexAction() {
        /**
         * Verify the login
         * If true then ump straight to the panel.
         */
        session_start();
        if ( isset( $_SESSION['is_login']) && $_SESSION['is_login'] === true ) {
            header('Location: /user/panel');
        }
    }
}
