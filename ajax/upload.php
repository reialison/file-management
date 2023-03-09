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
die("Debug File - can't delete");
foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $name = $_FILES["images"]["name"][$key];
        move_uploaded_file( $_FILES["images"]["tmp_name"][$key], "uploads/" . $_FILES['images']['name'][$key]);
    }
}


echo "<h2>Successfully Uploaded Images</h2>";
