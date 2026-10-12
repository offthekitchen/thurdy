<?php

//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//inlcude web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//Common Functions
include(INCLUDE_DIR . "/commonFunctions.php");

include_once(DATALAYER_DIR . "/Song.php");
include_once(DATALAYER_DIR . "/SongRepository.php");
include_once(DATALAYER_DIR . "/ThurdyDrop.php");
include_once(DATALAYER_DIR . "/ThurdyDropRepository.php");
include_once(DATALAYER_DIR . "/ThurdySongData.php");
include_once(DATALAYER_DIR . "/ThurdySongDataRepository.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageTitle = "Art";
$sPageDescription = "Art";
$sPageName = "Art";
$sPageLogo = "logo-art.png";
$fb_image = "fb_thurdy_merch.jpg";
include_once(INCLUDE_DIR . "/Head.php");
?>

<body>
	<div class="container">
		<div class="row">
			<?php include_once(INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">
			<main role="main">
				<section>
				<div class="col-xs-12 about">
					<p>Ideas turn into songs turn into art turn into mysterious items left in random places.
					</p>
					<p>Have you found one?
					</p>
				</div>		
					<?php
						$songDataRows = (new \Datalayer\ThurdySongDataRepository())->find();
						$songRepo = new \Datalayer\SongRepository();
						$dropRepo = new \Datalayer\ThurdyDropRepository();

						if (count($songDataRows) > 0)
						{
							foreach ($songDataRows as $oThisThurdySongData)
							{
								if (!empty($oThisThurdySongData->dropId) || !empty($oThisThurdySongData->artImage)){
									echo "<div class=\"row\">";
									if (!empty($oThisThurdySongData->dropId) && !empty($oThisThurdySongData->artImage)){
										$sMediumClass = "col-md-6";
									}
									else {
										$sMediumClass = "col-md-12";
									}

									
									if (!empty($oThisThurdySongData->artImage))
									{
										$oSong = $songRepo->findById((int) $oThisThurdySongData->songId);

										echo "<div class=\"col-xs-12 {$sMediumClass}\" style=\"text-align: center;\">";
										echo "<figure class=\"drop-image\" style=\"height: auto;\">";
										echo "<IMG SRC=\"" . IMG_DIR . "/{$oThisThurdySongData->artImage}\">";
										if ($oSong !== null) {
											echo "<figcaption>{$oSong->name}<br>";
										}
										echo "</figure>";
										echo "</div>";						
									}

									if (!empty($oThisThurdySongData->dropId))
									{
										echo "<div class=\"col-xs-12 {$sMediumClass}\" style=\"text-align: center; max-height: 300px;\">";

										$oThisThurdyDrop = $dropRepo->findById((int) $oThisThurdySongData->dropId);

										if ($oThisThurdyDrop !== null)
										{
											echo "<div>";
											echo "<figure class=\"drop-image\" style=\"height: auto;\">";
											echo "  <IMG SRC=\"" . IMG_DIR  . "/drops/{$oThisThurdyDrop->dropImage}\" />";
											echo "<figcaption>{$oThisThurdyDrop->dropLocation}<br>";
											if (!empty($oThisThurdyDrop->dropDesc)) {
												echo "({$oThisThurdyDrop->dropDesc})</figcaption>";
											}		
											echo "</figure>";
											echo "</div>";
										}
										echo "</div>";
									}

									echo "</div>";

								}
							}
						}
						else{
							echo "NO DATA";
						}
						
					?>					
				</section>
			</main>
		</div>
		<div class="row">
			<?php
			include_once(INCLUDE_DIR . "/Footer.php");
			?>
		</div>
	</div>
</body>

</html>
