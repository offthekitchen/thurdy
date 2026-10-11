<?php

//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//inlcude web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//Common Functions
include (INCLUDE_DIR . "/commonFunctions.php");

//include Song Class
include_once (CLASS_DIR . "/class_Song.php");

//include Thurdy Drop Class
include_once (CLASS_DIR . "/class_ThurdyDrop.php");

//include Thurdy Song Data Class
include_once (CLASS_DIR . "/class_ThurdySongData.php");

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
						//Load Thurdy Song Data
						$oThurdySongData = new ThurdySongData();
						$oThurdySongData->getThurdySongData();
						if (sizeof($oThurdySongData->aThurdySongDataRecords) > 0)
						{

							foreach ($oThurdySongData->aThurdySongDataRecords as $oThisThurdySongData)
							{
								if (!empty($oThisThurdySongData->nDropId) || !empty($oThisThurdySongData->sArtImage)){
									echo "<div class=\"row\">";
									if (!empty($oThisThurdySongData->nDropId) && !empty($oThisThurdySongData->sArtImage)){
										$sMediumClass = "col-md-6";
									}
									else {
										$sMediumClass = "col-md-12";
									}

									
									if (!empty($oThisThurdySongData->sArtImage))
									{
										$oSongs = new Song();
										$oSongs->nSongID = $oThisThurdySongData->nSongId;
										$oSongs->getSong();

										echo "<div class=\"col-xs-12 {$sMediumClass}\" style=\"text-align: center;\">";
										echo "<figure class=\"drop-image\" style=\"height: auto;\">";
										echo "<IMG SRC=\"" . IMG_DIR . "/{$oThisThurdySongData->sArtImage}\">";
										echo "<figcaption>{$oSongs->aSongRecords[0]->sSongName}<br>";	
										echo "</figure>";
										echo "</div>";						
									}

									if (!empty($oThisThurdySongData->nDropId))
									{
										echo "<div class=\"col-xs-12 {$sMediumClass}\" style=\"text-align: center; max-height: 300px;\">";

										$oThurdyDrop = new ThurdyDrop();
										$oThurdyDrop->nDropID = $oThisThurdySongData->nDropId;
										$oThurdyDrop->getThurdyDrop();

										if (sizeof($oThurdyDrop->aDropRecords) > 0)
										{
											$oThisThurdyDrop = $oThurdyDrop->aDropRecords[0];

											echo "<div>";
											echo "<figure class=\"drop-image\" style=\"height: auto;\">";
											echo "  <IMG SRC=" . IMG_DIR  . "/{$oThisThurdyDrop->sDropImage} />";
											echo "<figcaption>{$oThisThurdyDrop->sDropLocation}<br>";
											if (!empty($oThisThurdyDrop->sDropDesc)) {
												echo "({$oThisThurdyDrop->sDropDesc})</figcaption>";
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