<?php

//This include defines the relative path to the root directory from this sub-directory
include_once ("root.inc.php");

//inlcude web site settings
include_once ($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once (SETTINGS_DIR . "/ThurdySettings.php");

//Common Functions
include (INCLUDE_DIR . "/commonFunctions.php");

include_once (DATALAYER_DIR . "/ThurdyDrop.php");
include_once (DATALAYER_DIR . "/ThurdyDropRepository.php");

$drops = (new \Datalayer\ThurdyDropRepository())->find();
if (count($drops) === 0) {
	echo "ERROR!";
} else {
	shuffle($drops);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageTitle="Where Did You Find Me?";
$sPageDescription="I try really hard to stay away from folks, but I keep popping up places.";
$sPageName="Where";
$sPageLogo="header-logo-200.png";
$fb_image = "fb_thurdy_where.jpg";
include_once (INCLUDE_DIR . "/Head.php");
?>
<body >
	<div class="container">
		<div class="row">
		<?php include_once (INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">
			<main role="main">
				<section>
				<?php
				foreach($drops as $oDrop)
				{
					echo "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">";
					echo "<figure class=\"drop-image\">";
					echo "  <IMG SRC=" . IMG_DIR  . "/drops/{$oDrop->dropImage} />";
					echo "<figcaption>{$oDrop->dropLocation}<br>";
					if (!empty($oDrop->dropDesc)) {
						echo "({$oDrop->dropDesc})</figcaption>";
						}		
					echo "</figure>";
					echo "</div>";
				}
				?>	
				</section>
			</main>
		</div>
		<div class="row">
			<?php
			include_once (INCLUDE_DIR . "/Footer.php");
			?>
		</div>
	</div>	
</body>
</html>
