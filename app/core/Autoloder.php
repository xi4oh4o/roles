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

    private function loader($classname) {
        if( is_file( $classname.'php' )):
            require_once $classname.'.php';
        else:
            throw new exception( "unable to load $classname. ");
    }
}
