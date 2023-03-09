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
 * #      Copyright:  (c) 2009 - 2014 - Criticalgear.com
 * #
 * #*******************************************************************************/
require_once("../includes/dbconnect.php"); //Load the settings
$ids = isset($_GET['ids']) && is_array($_GET['ids']) ? $_GET['ids'] : array();
$msg = $msgSuccess = '';
if($demo){
    echo(json_encode(array("mes" => "<div class='loginMessage loginError'>User deletion not allowed in preview version</div>", "mesSuc" => '')));
} else {
    foreach ($ids as $id) {
        $res = mysqli_query($mysqli, "SELECT *  FROM {$db_pr}users WHERE id='" . $id . "' LIMIT 1");
        $extData = mysqli_fetch_assoc($res);
        @rmdir("../" . $extData['username']);
        mysqli_query($mysqli, "DELETE FROM {$db_pr}users WHERE id='" . $id . "' LIMIT 1");
    }
    $msgSuccess = "<div class='loginMessage loginSuccess'>Selected users has been successfully deleted</div>";
    echo(json_encode(array("mes" => $msg, "mesSuc" => $msgSuccess)));
}