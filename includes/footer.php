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
<script src="js/jquery.tipTip.js"></script>
<script>
    jQuery(function () {
        jQuery(".tipTip").tipTip({maxWidth: "auto", edgeOffset: 10, defaultPosition: "top"});
    });
</script>
<?php
    if(!empty($demo)){
        echo "<div class='loginMessage loginError demoWarning'>! DEMO RESETS EVERY 15 MINUTES !</div>";
    }
?>
<div class="footer">
	      		<!-- <a target="_blank" href="http://www.criticalgears.io"><img border="0" src="images/madebycircle.png"></a> -->
			</div>
</body>
</html>
