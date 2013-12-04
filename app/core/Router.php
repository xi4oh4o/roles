<?php
/**
 * Roles - Router
 * @package Roles
 * @author Howe Isamu <xi4oh4o@gmail.com>
 * Simple implementation controller require
 */
class Router
{
    protected $urlPATH, $controllerName, $actionName;
    function __construct() {
        // Get the path from the URI parameter
        $this->urlPATH = $_SERVER['REQUEST_URI'];
        $params = explode( '/', $this->urlPATH );
        //Set the default path parameter
        if ( $params ) {
            $this->controllerName = empty( $params[1] ) ? 'site' : $params[1];
            if ( count($params) > 1 ) {
                $this->actionName = empty( $params[2] ) ? 'index' : $params[2];
            }
        }
        $this->dispatch();
    }

    private function disponseView( Controller $controller, $actionReturnData ) {
        if ( !is_bool( $actionReturnData ) ) {
            $controller->loadView( $actionReturnData );
        }
    }

    public function dispatch() {
        //Capitalize the first letter transformation URI path.
        $controllerClassName = ucfirst( $this->controllerName )."Controller";
        //Load controller files.
        $controllerFile = CONTROLLER_PATH . "/$controllerClassName.php";
        require_once $controllerFile;
        //Initialize the controller and perform the action.
        $controller = new $controllerClassName;
        $controller->_init( $this->controllerName, $this->actionName );
        $action = $this->actionName;
        $action .= "Action";
        $actionReturnData = $controller->$action();
        $this->disponseView( $controller, $actionReturnData );
    }
}
