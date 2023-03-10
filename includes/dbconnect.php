<?php
                error_reporting(E_ALL ^ E_NOTICE);
                date_default_timezone_set("America/Toronto");
                $script_dir          = '/dms1/'; // IF IN ROOT leave like this: '/'  if in root/files   then    '/files/'
                $upload_dir          = '/dms1/uploads/'; //NOTE: TRAILING FORWARD SLASHES! FULL PATH to current folder relative to root, DON'T FORGET TO SET permissions for this folder to 777 on UNIX servers.
                $upload_notify_email = 'reialison@pointonesolutions.com.ph'; //email for notifications of new file upload.

                $db_host = 'localhost'; //hostname
                $db_user = 'root'; // username
                $db_password = ''; // password
                $db_name = 'dms1'; //database name

                $db_pr = 'afm_'; //database prefix

                $md5_salt = '53568a19ff4e0d671f0bac1b6e19a8f6';

                $demo        = false;
                @$mysqli = @mysqli_connect($db_host, $db_user, $db_password, $db_name);

                if (!$mysqli) {
                    header("Location:install.php");
                    exit();
                }
              ?>