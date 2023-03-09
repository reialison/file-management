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
$showForm = true;

    ######################### DO NOT MODIFY (UNLESS SURE) END ########################
        $license = (!empty($_REQUEST['license'])) ? strip_tags(str_replace("'", "`", $_REQUEST['license'])) : '';
        $username = (!empty($_REQUEST['username'])) ? strip_tags(str_replace("'", "`", $_REQUEST['username'])) : '';
        $db__pr = (!empty($_REQUEST['db__pr'])) ? strip_tags(str_replace("'", "`", $_REQUEST['db__pr'])) : '';
        if (!empty($_REQUEST["install"]) && $_REQUEST['install'] == "yes") {


            if ($license == "" || $username == '') {
                $msg = "<div class='loginMessage loginError'>Some fields were left empty. All fields are mandatory. Try again</div>";
            } else {
                eval(base64_decode("JGl0ZW1fbmFtZSA9ICI2MTY5MyI7DQokZW52YXRvX2FwaWtleSA9ICdrdnRrYnExMXg5N3dqOWptbzhjdW02ZHJqc200c3c5Nyc7DQokZW52YXRvX3VzZXJuYW1lID0gIkNyaXRpY2FsR2VhcnMiOw=="));
                $license_to_check = preg_replace('/[^a-zA-Z0-9_ -]/s', '', !empty($license) ? $license : "");
                $continue         = false;
	            if (!empty($username) && !empty($license_to_check)) {

		            $data    = array(
			            "license"  => $license_to_check,
			            "username" => $username,
			            "product"  => "61693",
		            );
		            $api_url = "http://validate.criticalgears.io?" . http_build_query( $data );

		            if ( $data = file_get_contents( $api_url ) ) {

			            if ( $json_data = json_decode( $data, true ) ) {
				            if ( isset( $json_data['res'] ) && $json_data['res'] ) {
					            $continue = true;
				            } else {
					            $msg .= "<div class='loginMessage loginError'> {$json_data['msg']} </div>";
				            }

			            } else {

				            $msg .= "<div class='loginMessage loginError'>Error! Wrong API response format</div>";
			            }
		            } else {

			            $msg .= "<div class='loginMessage loginError'>Something went terribly wrong! Try again later</div>";
		            }

	            } else {

		            $msg .= "<div class='loginMessage loginError'>License Key, Username and Domain fields are required</div>";
	            }
                if ($continue) {
                    if(!isset($db_pr)){
                        $db__pr = trim($db__pr,"_");
                        $dbConnectString = file_get_contents("includes/dbconnect.php");
                        $dbConnectStringTmp= explode('$db_host',$dbConnectString);
                        $dbConnectString = $dbConnectStringTmp[0]."\n\$db_pr='{$db__pr}_';\n\$db_host".$dbConnectStringTmp[1]."\$db_host".$dbConnectStringTmp[2];
                        $dbConnectString = file_put_contents("includes/dbconnect.php",$dbConnectString);
                    }


                    require_once("includes/upgrade.php");
                    $showForm = false;
                    $msg .= "<div class='loginMessage loginSuccess'>Advanced File Management has been successfully upgraded to v3.<br>
                            <a href='index.php'>Back to home page</a></div>";
                }
            }
        }
        include "includes/header_static.php";
        ?>

        <h1 class="header_install">File Management System - Upgrade</h1>
        <div id="content">


            <div class="content_block">
                <div class="install_container">
                    <div class="login">
                        <strong><?php echo $msg; ?></strong>

                        <?php if ($showForm) { ?>
                            <form action="" enctype="multipart/form-data" method="post" name="ff1"
                                  class="form-horizontal inner-form inner-form-upgrade" >
                                <input type="hidden" name="install" value="yes"/>

                                <p class="alert alert-warning">At the moment, it is possible to upgrade only from v2.0 to new v3.0</p>
                                <h3>Envato License Verification</h3>
                                <p>
                                    Please enter your ITEM PURCHASE CODE (located in the license certificate from Envato. You can login to your codecanyon account and go to downloads,
                                    you will see green button DOWNLOAD next to our product, click it and select License Certificate (txt or PDF). Once you open that file - you will see item purchase code inside. <a href="http://support.Criticalgear.com/bb-plugins/epcv/key_instructions.jpg" target="_blank">Example instructions</a>.
                                    Item purchase code looks like this: aa1111c11-111f-1111-b1a1-ce11f1ffa111
                                </p>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-5 control-label">Your Envato
                                        Username:</label>

                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="username" name="username"
                                               placeholder="Username" value="<?php if (isset($username)) {
                                            echo $username;
                                        } ?>" tabindex="1">
                                    </div> <div class="icon-info"><img src="images/info.png" height="18" width="18" class="tipTip"
                                                                       title="YOUR username which you enter when you login to Envato marketplaces."></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-5 control-label">Item Purchase Code:</label>

                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="license" placeholder="Code"
                                               name="license" value="<?php if (isset($license)) {
                                            echo $license;
                                        } ?>" tabindex="2">
                                    </div> <div class="icon-info"><img src="images/info.png" height="18" width="18" class="tipTip"
                                                                       title="If you don't have item purchase code - please read instructions above this field."></div>
                                </div>
                                <?php if(!isset($db_pr)){?>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-5 control-label">Database tables prefix:</label>

                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="db__pr" placeholder="Example: afm"
                                                   name="db__pr" value="" tabindex="3">
                                        </div>
                                    </div>
                                <?php }?>
                                <div class="clear"></div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-4">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Upgrade to v3
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php include "includes/footer.php"; ?>
