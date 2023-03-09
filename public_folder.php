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
######################### DO NOT MODIFY (UNLESS SURE) ########################
session_start();
require_once("includes/dbconnect.php"); //Load the settings
require_once("includes/functions.php"); //Load the functions
$msg = "";
$id = (!empty($_REQUEST["id"])) ? strip_tags(str_replace("'", "`", $_REQUEST["id"])) : '';
$folderInfo = getPublicFolder($id,$md5_salt);
$showFiles = true;
if(getSettings("public_directory")==2){
    $showFiles = false;
    $folderInfo['name']="";
    $msg = '<div class="loginMessage loginError">Public view disabled by administrator.</div>';
}else{
    $showFiles = true;
}
if($folderInfo===false){
    $folderInfo['name']="";
    $msg = '<div class="loginMessage loginError">Sorry, folder not found</div>';
    $showFiles = false;
}
    ?>
    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Advanced File Manager<?php echo !empty($_SESSION["username"])?" - Welcome {$_SESSION["username"]}":""?>!</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
        <link rel="stylesheet" type="text/css" href="../css/tipTip.css">
        <link href='//fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.js"></script>
        <script src="//code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
        <link  href="//code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css" rel="stylesheet">
        <script src="../js/main.js"></script>
        <link rel="stylesheet" href="../includes/viewimage/colorbox.css" />
        <script src="../includes/viewimage/colorbox.js"></script>
        <script src="../includes/viewimage/displayimage.js"></script>
        <style type="text/css" title="currentStyle">
            @import "../includes/media/css/demo_page.css";
            @import "../includes/media/css/demo_table.css";
        </style>
        <script type="text/javascript" language="javascript" src="../includes/media/js/jquery.dataTables.js"></script>

    </head>

<body>
<div id="header">
    <h1><a href="../main.php">File Management System</a></h1>

</div>
<div class="clear"></div>
<div id="content">
    <link href="../includes/jplayer/skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../includes/jplayer/jquery.jplayer.min.js"></script>
<?php if($showFiles){?>
    <script type="text/javascript" src="js/admin/public_folder.js"></script>
<?php }?>
    <div id="content-main">
<br>
        <h2><?php echo($folderInfo['name']) ?></h2>
        <div class="clear"></div>
        <div id='msg'><?php echo $msg; ?></div>
        <br/>
        <?php if($showFiles){?>
        <div id="dynamic">
            <form action="#" id="formTable">
                <table cellpadding="0" cellspacing="0" border="0" class="display lra" id="table">
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th width="35%">Title</th>
                        <th width="15%">Size</th>
                        <th width="8%">Extension</th>
                        <th width="25%">Date Uploaded</th>
                        <th width="18%">Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="6" class="dataTables_empty">Loading data from server</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Extension</th>
                        <th>Date Uploaded</th>
                        <th>Link</th>
                    </tr>
                    </tfoot>
                </table>
            </form>
        </div>
        <?php }?>
        <div class="spacer"></div>
        <br/><br/>
    </div>
    <br/><br/>
    <span id="folder"></span>
    <div id="imgValue"></div>
    <div id="audioValue"></div>
    <div id="videoValue"></div>
    <div id="pdfValue"></div>
    <div id="codeValue"></div>
    <div id="docValue"></div>
    </div>
<div class="footer">
    <a target="_blank" href="http://www.criticalgears.io"><img border="0" src="../images/madebycircle.png"></a>
</div>
</body>
</html>
