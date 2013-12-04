<?php
/**
 * Roles - Configuration
 * @package Roles
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
/*
|--------------
|Directory Path
|--------------
*/
defined( 'APP_PATH' ) or define( 'APP_PATH', $_SERVER['DOCUMENT_ROOT'].'/app/' );
defined( 'CONF_PATH' ) or define( 'CONF_PATH', APP_PATH.'config/');
defined( 'CORE_PATH' ) or define( 'CORE_PATH', APP_PATH.'core/');
defined( 'VIEW_PATH' ) or define( 'VIEW_PATH', APP_PATH.'views/');
/*
|------------------
|database configure
|------------------
*/
define( 'DB_USER', 'roles');
define( 'DB_PASS', '912913');
define( 'STRDSN', 'mysql:host=localhost;dbname=roles' );

