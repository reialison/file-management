<?php
	require_once("dbconnect.php"); //Load the settings
	require_once("functions.php"); //Load the functions

	$value= explode( ',', $_GET['id']);	
	$path= $value[1];
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Preview Audio Files</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="jplayer/skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript">

function getPath(){
return "<?php echo $path; ?>";
}
//<![CDATA[
$(document).ready(function(){
var mp3path = "../<?php print($path); ?>";

	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				mp3: mp3path
			});
		},
		swfPath: "js",
		supplied: "mp3",
		wmode: "window",
		smoothPlayBar: true,
		keyEnabled: true
	});
});
//]]>
</script>
</head>
<body>
		<div id="jquery_jplayer_1" class="jp-jplayer"></div>
		<div id="jp_container_1" class="jp-audio">
			<div class="jp-type-single">
				<div class="jp-gui jp-interface">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
						<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
						<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
						<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
					<div class="jp-volume-bar">
						<div class="jp-volume-bar-value"></div>
					</div>
					<div class="jp-time-holder">
						<div class="jp-current-time"></div>
						<div class="jp-duration"></div>

						<ul class="jp-toggles">
							<li><a href="javascript:void();" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
							<li><a href="javascript:void();" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
						</ul>
					</div>
				</div>
				<div class="jp-title">
					<ul>
						<li><?php echo $value[0]; ?></li>
					</ul>
				</div>
				<div class="jp-no-solution">
					<span>Update Required</span>
					To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
				</div>
			</div>
		</div>
</body>
</html>