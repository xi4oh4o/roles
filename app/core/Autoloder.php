<?php
/**
 * Roles - Autoloder
 * @package Roles
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
class Autoloder
{
    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }

    private function loader($className) {
        if ( is_file( CORE_PATH . $className.'.php' )) {
            require CORE_PATH . $className.'.php';
        } else {
            throw new exception( "unable to load $className. ");
        }
    }
}
