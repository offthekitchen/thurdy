<?php

//This include defines the relative path to the root directory from this sub-directory
include_once ("root.inc.php");

//include web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//include Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once (INCLUDE_DIR . "/commonFunctions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageTitle="WATCH";
$sPageName="Videos";
$sPageLogo="logo-video.png";
$fb_image = "fb_thurdy_home.png";
$sPageDescription = 'Weird videos about weird music';

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
					<aside class="review full-width-phone video">
						<div class="row">							
							<div class="col-xs-12 center-contents">
								<h1>Love is Like a Market Crash</h1>
								<img src="<?php echo IMG_DIR ?>/Videos.png" class="videoThumbnail">
								<div class="center-contents">
									<a href="https://youtu.be/alzbJkafM4A?si=1XZrDRYFG9TbhQpX" target="_blank">
										<div class="button purchase-button">WATCH VIDEO</div>	
									</a>
								</div>
							</div>						
						</div>
					</aside>
					<aside class="review full-width-phone video">
						<div class="row">							
							<div class="col-xs-12 center-contents">
								<h1>Francesca</h1>
								<img src="<?php echo IMG_DIR ?>/Francesca.png" class="videoThumbnail">
								<div class="center-contents">
									<a href="https://youtu.be/NFSIm0D33Dc?si=Mslrp7lVzsu8F89R" target="_blank">
										<div class="button purchase-button">WATCH VIDEO</div>	
									</a>
								</div>
							</div>						
						</div>
					</aside>
					<aside class="review full-width-phone video">
						<div class="row">							
							<div class="col-xs-12 col-md-6 center-contents">
								<h1>Venulegur Dagur<br>(English Version)</h1>
								<img src="<?php echo IMG_DIR ?>/Venulegur.png" class="videoThumbnail">
								<div class="center-contents">
									<a href="https://youtu.be/tkVbshyANV4?si=aDrBS_JJ69S26bwX" target="_blank">
										<div class="button purchase-button">WATCH VIDEO</div>	
									</a>
								</div>
							</div>			
							<div class="col-xs-12 col-md-6 center-contents">
								<h1>Venulegur Dagur<br>(Icelandic Version)</h1>
								<img src="<?php echo IMG_DIR ?>/Venulegur.png" class="videoThumbnail">
								<div class="center-contents">
									<a href="https://youtu.be/5xnCXpvhQHg?si=063mOUWgWN9upwv5" target="_blank">
										<div class="button purchase-button">WATCH VIDEO</div>	
									</a>
								</div>
							</div>						
						</div>
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
<style>
	.videoThumbnail {
		width: 100%;
	}
</style>
