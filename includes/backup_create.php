<?php
/********************************************************************************
 * #                      Advanced File Manager v3.0.1
 * #******************************************************************************
 * #      Author:     CriticalGears
 * #      Email:      info@criticalgears.com
 * #      Website:    http://www.criticalgears.io
 * #
 * #
 * #      Version:    3.0.1
 * #      Copyright:  (c) 2009 - 2020 - Criticalgears.io
 * #
 * #*******************************************************************************/
require_once("dbconnect.php"); //Load the settings
require_once("functions.php"); //Load the functions
if($demo){
    echo "Operation not permitted in preview of the product.";
} else {
    $backup_directory = "backup_db/";
    $files = glob($backup_directory . "*.sql");
    foreach ($files as $file) {
        unlink($file);
    }
    getBackup($db_host, $db_user, $db_password, $db_name);
    $backup_directory = "backup_db/";
    $dbfile = array();
    $files = glob($backup_directory . "*.sql");
    $i = 0;
    foreach ($files as $file) {
        $dbfile[] = $file;
        $i++;
    }

    rsort($dbfile);
    echo "includes/" . $dbfile[0];
}


?>