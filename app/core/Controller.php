<?php
/**
 * Roles - Base Controller
 * @package Roles
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
class Controller
{
    private $_controllerName, $_viewName;

    public function _init( $controllerName, $viewName ) {
        $this->_controllerName = $controllerName;
        $this->_viewName = $viewName;
        $this->init();
    }

    function init(){}

    function loadView( $viewData ) {
        if (empty( $this->_viewName )) return;
        require_once VIEW_PATH . "/{$this->_controllerName}/{$this->_viewName}.php";
    }
}
