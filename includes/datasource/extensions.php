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
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
/* Array of database columns which should be read and sent back to DataTables. Use a space where
 * you want to insert a non-database field (for example a counter or static image)
 */
$aColumns = array('id', 'name');
/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "id";

/* Database connection information */
$root = dirname(dirname(__FILE__));
include_once($root . '/dbconnect.php');
/* DB table to use */
$sTable = "{$db_pr}extensions";
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
 * no need to edit below this line
 */
/* 
 * Local functions
 */
function fatal_error($sErrorMessage = '')
{
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    die($sErrorMessage);
}

/* 
 * Paging
 */
$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
}
/*
 * Ordering
 */
$sOrder = "ORDER BY name ASC";
if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY  ";
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= "`" . $aColumns[intval($_GET['iSortCol_' . $i])] . "` " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
        }
    }
    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == "ORDER BY") {
        $sOrder = "";
    }
}
/* 
 * Filtering
 * NOTE this does not match the built-in DataTables filtering which does it
 * word by word on any field. It's possible to do here, but concerned about efficiency
 * on very large tables, and MySQL's regex functionality is very limited
 */
$sWhere = "name";
if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
    $sWhere = "WHERE (";
    for ($i = 0; $i < count($aColumns); $i++) {
        if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
            $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . mysqli_real_escape_string($mysqli,$_GET['sSearch']) . "%' OR ";
        }
    }
    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ')';
}
/* Individual column filtering */
for ($i = 0; $i < count($aColumns); $i++) {
    if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
        if ($sWhere == "") {
            $sWhere = "WHERE ";
        } else {
            $sWhere .= " AND ";
        }
        $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . mysqli_real_escape_string($mysqli,$_GET['sSearch_' . $i]) . "%' ";
    }
}
/*
 * SQL queries
 * Get data to display
 */
$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS `" . str_replace(" , ", " ", implode("`, `", $aColumns)) . "`
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
		";
$rResult = mysqli_query($mysqli,$sQuery) or fatal_error('MySQL Error: ' . mysqli_errno($mysqli));
/* Data set length after filtering */
$sQuery = "
		SELECT FOUND_ROWS()
	";
$rResultFilterTotal = mysqli_query($mysqli,$sQuery) or fatal_error('MySQL Error: ' . mysqli_errno($mysqli));
$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
$iFilteredTotal     = $aResultFilterTotal[0];
/* Total data set length */
$sQuery = "
		SELECT COUNT(`" . $sIndexColumn . "`)
		FROM   $sTable
	";
$rResultTotal = mysqli_query($mysqli,$sQuery) or fatal_error('MySQL Error: ' . mysqli_errno($mysqli));
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal       = $aResultTotal[0];
/*
 * Output
 */
$output = array("sEcho" => intval($_GET['sEcho']), "iTotalRecords" => $iTotal, "iTotalDisplayRecords" => $iFilteredTotal, "aaData" => array());
while ($aRow = mysqli_fetch_array($rResult)) {
    $row = array();
    for ($i = 0; $i < count($aColumns); $i++) {
        if ($aColumns[$i] == "version") {
            /* Special output formatting for 'version' column */
            $row[] = ($aRow[$aColumns[$i]] == "0") ? '-' : $aRow[$aColumns[$i]];
        } else if ($aColumns[$i] != ' ') {
            /* General output */
            $row[] = $aRow[$aColumns[$i]];
        }
    }
    $output['aaData'][] = $row;
}
echo json_encode($output);
?>