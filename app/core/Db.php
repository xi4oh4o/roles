<?php
/**
 * Roles - Db
 * @package Roles
 * @author Howe Isamu <xi4oh4o@gmail.com>
 */
//Load Configuration files
require_once( $_SERVER['DOCUMENT_ROOT'].'/app/config/config.php' );
/**
 * Using Static Method return PDO instance
 * @access public
 * @global object $GLOBALS['PDOS'][$Key]
 * @param string $strDSN, $strUser, $strPass, $arParms
 * @example $dbh = Db::GetPDO( DB_DSN, DB_USER, DB_PASS, NULL);
 * @return instance unique PDO
 */
class Db {
    protected $GLOBALS = NULL;
    public static function GetPDO( $strDSN, $strUser, $strPass, $arParms ) {
        $strKey = md5( serialize( array( $strDSN, $strUser, $strPass, $arParms ) ) );

        if ( @!$GLOBALS["PDOS"][$strKey] instanceof PDO ) {
            try {
                $GLOBALS["PDOS"][$strKey] = new PDO( $strDSN, $strUser,
                $strPass, $arParms );
            } catch ( PDOException $e ) {
                if ( DEBUG_MODE ) {
                    echo $e->getMessage();
                }

            }
        }
        return ( $GLOBALS["PDOS"][$strKey] );
    }
}
