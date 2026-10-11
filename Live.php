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
$sPageTitle="BOOK";
$sPageName="Live";
$sPageLogo="logo-live.png";
$fb_image = "fb_thurdy_home.png";

include_once (INCLUDE_DIR . "/Head.php");
?>
<body >
	<div class="container">
		<div class="row">
		<?php include_once (INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<main role="main">
					<aside class="review full-width-phone">
						<blockquote>
							<div class="row">							
								<div class="col-xs-12 center-contents">
									<h1>Thurdy Live</h1>
									<img class="cdCover live-photo" src="<?php echo IMG_DIR; ?>/book.jpg">
									<div style="margin: 10px;">
									<p>I have years of experince performing all over the US
									and in Canada and Europe.  I take up a pretty small footprint and provide a 
									solo acoustic performance of cover tunes and/or originals.</p>
									<p>So if you wnat a little live music in your life, just...
									</div>
									<a href="<?php echo $ROOT ?>/Contact.php" target="_blank">
										<div class="button purchase-button">GET IN TOUCH</div>	
									</a>
								</div>						
							</div>
						</blockquote>
					</aside>			
				</main>
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
