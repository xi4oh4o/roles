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
defined( 'CONTROLLER_PATH' ) or define( 'CONTROLLER_PATH', APP_PATH.'controllers/');
defined( 'MODEL_PATH' ) or define( 'MODEL_PATH', APP_PATH.'models/');
defined( 'VIEW_PATH' ) or define( 'VIEW_PATH', APP_PATH.'views/');
defined( 'ASSETS_PATH' ) or define( 'ASSETS_PATH', 'assets/');
/*
|----------
|DEBUG MODE
|----------
*/
defined( 'DEBUG_MODE' ) or define( 'DEBUG_MODE', true);
/*
|------------------
|database configure
|------------------
*/
define( 'DB_USER', 'roles');
define( 'DB_PASS', '912913');
define( 'DB_DSN', 'mysql:host=localhost;dbname=roles' );

