<?php
/**
 * Roles - Autoloder
 * @package Roles
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
class Autoloder
{
    public function __construct() {
        spl_autoload_register(array($this, 'loaderCore'));
        spl_autoload_register(array($this, 'loaderModels'));
    }

    private function loaderCore($className) {
        if ( is_file( CORE_PATH . $className.'.php' ))
            require CORE_PATH . $className.'.php';
    }

    private function loaderModels($className) {
        if ( is_file( MODEL_PATH . $className.'.php' )) {
            require MODEL_PATH . $className.'.php';
        } else {
            throw new exception( "unable to load $className. ");
        }
    }
}
