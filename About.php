<?php

//This include defines the relative path to the root directory from this sub-directory
include_once ("root.inc.php");

//include web site settings
include_once ($ROOT . "/includes/WebsiteSettings.php");

//include Thurdy settings
include_once (SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once (INCLUDE_DIR . "/commonFunctions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageTitle="What is Thurdy?";
$sPageName="About";
$sPageLogo="header-logo-200.png";
$fb_image = "about_FB.png";

include_once (INCLUDE_DIR . "/Head.php");
?>
<body >
	<div class="container">
		<div class="row">
		<?php include_once (INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">
			<div class="col-xs-12 about">
				
				<p>Thurdy is an alter ego born out of a crazy songwriting project.</p>
				<p>Thurdy is slightly off-kilter. </p>
				<p>Thurdy is fine with being slightly off-kilter.</p>
				<p>Thurdy makes <a href="<?php echo $ROOT ?>/Art.php">ART</a>.</p>
				<p>Thurdy is not strategic.</p>
				<p>Thurdy shows up in <a href="<?php echo $ROOT ?>/Where.php">RANDOM PLACES</a>.</p>
				<p>Thurdy sneaks away from the cubicle to draw and write song lyrics.</p>
				<p>If you want to experiment, chase that idea in your head, or just throw paint at the wall, Thurdy is your permission. </p> 

			</div>
		</div>		
		<div class="row">
			<?php
			include_once (INCLUDE_DIR . "/Footer.php");
			?>
		</div>
	</div>	
</body>
</html>
