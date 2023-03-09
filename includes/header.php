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
 ?>
    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>File Management System<?php echo !empty($_SESSION["username"])?" - Welcome {$_SESSION["username"]}":""?>!</title>
        <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link rel="stylesheet" type="text/css" href="css/tipTip.css">
        <link href='//fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.js"></script>
        <script src="//code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
        <link  href="//code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css" rel="stylesheet">
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="includes/viewimage/colorbox.css" />
        <script src="includes/viewimage/colorbox.js"></script>
        <script src="includes/viewimage/displayimage.js"></script>
        <style type="text/css" title="currentStyle">
            @import "includes/media/css/demo_page.css";
            @import "includes/media/css/demo_table.css";
        </style>
        <script type="text/javascript" language="javascript" src="includes/media/js/jquery.dataTables.js"></script>

    </head>
<body>
    <div id="header">
        <h1><a href="main.php">File Management System</a></h1>
    <span>
      Welcome back, <strong><?php echo getUser($_SESSION["idUser"]); ?></strong>!&nbsp;
        <a href="profile.php">Profile</a>&nbsp;/&nbsp;<a href="logout.php">Logout</a> <img src="images/icons/icon_power.png" width="10" height="12" />
    </span>
    </div>

<?php require("includes/menu.php");?>
