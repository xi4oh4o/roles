<?php
/**
 * Roles - Db
 * @package Roles
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
//Load Configuration files
require_once( $_SERVER['DOCUMENT_ROOT'].'/app/config/config/php');
/**
 * Using Static Method return PDO instance
 * @access public
 * @global object $GLOBALS['PDOS'][$Key]
 * @param string $DSN, $User, $Pass, $parms
 * @return instance unique PDO
 */
class PDOFactory {
    protected $GLOBALS = NULL;
    public static function GetPDO( $DSN, $User, $Pass, $Parms ) {
        $Key = md5(serialize(array( $DSN, $User, $Pass, $Parms )));
        if( !( $GLOBALS['PDOS'][$Key] instanceof PDO)) {
            try {
                $GLOBALS['PDOS'][$Key] = new PDO( $DSN, $User, $Pass, $Parms );
            } catch ( PDOException $e ) {
                if (DEBUG_MODE) {
                    $displayHash['db_error'] = $e->getMessage();
                }
                require_once( VIEW_PATH."db_faults.php" );
                exit(0);
            }
        }
        return ( $GLOBALS['PDOS'][$Key] );
    }
}
?>
