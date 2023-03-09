<?php
$license_to_check = preg_replace('/[^a-zA-Z0-9_ -]/s', '', !empty($license) ? $license : "");
$BWContinue = false;

if (!empty($username) && !empty($domain) && !empty($license_to_check)) {

	$data    = array(
		"license"  => $license_to_check,
		"username" => $username,
		"product"  => "61693",
	);
	$api_url = "https://validate.criticalgears.io?" . http_build_query( $data );

	if ( $data = file_get_contents( $api_url ) ) {

		if ( $json_data = json_decode( $data, true ) ) {
			if ( isset( $json_data['res'] ) && $json_data['res'] ) {
				$BWContinue = true;
			} else {
				$BWMessage .= "<div class='loginMessage loginError'> {$json_data['msg']} </div>";
			}

		} else {

			$BWMessage .= "<div class='loginMessage loginError'>Error! Wrong API response format</div>";
		}
	} else {

		$BWMessage .= "<div class='loginMessage loginError'>Something went terribly wrong! Try again later</div>";
	}

} else {

	$BWMessage .= "<div class='loginMessage loginError'>License Key, Username and Domain fields are required</div>";
}

