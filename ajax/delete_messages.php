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
require_once("../includes/functions.php"); //Load the functions
//print_r($_REQUEST);
$ids = isset($_GET['ids']) && is_array($_GET['ids']) ? $_GET['ids'] : array();
$msg = $msgSuccess = '';
if (count($ids)) {
    $sql = "DELETE FROM {$db_pr}messages WHERE id IN('" . join("','", $ids) . "')";
    //print $sql;
    if (mysqli_query($mysqli,$sql)) {
        $msgSuccess = "<div class='loginMessage loginSuccess'>Selected messages has been successfully deleted</div>";
    } else {
        $msg = "<div class='loginMessage loginError'>Error</div>";
    }
} else {
    $msg = "<div class='loginMessage loginError'>Please, select messages you wand to delete</div>";
}
echo(json_encode(array("mes" => $msg, "mesSuc" => $msgSuccess)));
