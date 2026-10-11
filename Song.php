<?php

//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//inlcude web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//Common Functions
include(INCLUDE_DIR . "/commonFunctions.php");

//include Song Class
include_once(CLASS_DIR . "/class_Song.php");

//include Review Class
include_once(CLASS_DIR . "/class_Review.php");

//include Award Class
include_once(CLASS_DIR . "/class_Award.php");

//include CD Class
include_once(CLASS_DIR . "/class_CD.php");

//include Thurdy Song Data Class
include_once(CLASS_DIR . "/class_ThurdySongData.php");

//include Thurdy Drop Class
include_once(CLASS_DIR . "/class_ThurdyDrop.php");

//include Error Log Class
include_once(CLASS_DIR . "/class_ErrorLog.php");

$oSongs = new Song();
$oSongs->nArtistID = THURDY_ARTIST_ID;

//If a Song ID is passed, display information for that Song
if (isset($_REQUEST['song-id']) && $_REQUEST['song-id'] != "") {
	$oSongs->nSongID = preg_replace("/[^0-9.]/", "", $_REQUEST['song-id']);
}

if (!$oSongs->getSong()) {
	$error = new ErrorLog('Song.php', 'getSong()', 'Error Retrieving Song', $oSongs->nSongID, 'SONG');
	$error->writeErrorLog();
} else {
	// Try again with default song
	if (sizeof($oSongs->aSongRecords) == 0) {
		$oSongs->nSongID = DEFAULT_SONG_ID;
		if (!$oSongs->getSong()) {
			$error = new ErrorLog('Song.php', 'getSong()', 'Error Retrieving Song', $oSongs->nSongID, 'SONG');
			$error->writeErrorLog();
		}
	}

	if (sizeof($oSongs->aSongRecords) > 0) {
		$oThisSong = new Song();
		$oThisSong = $oSongs->aSongRecords[0];
		$sPageName = "{$oThisSong->sSongName}";
		$sPageDescription = "{$oThisSong->sSongDescription}";
		$sPageTitle = "$oThisSong->sSongName";
		$sPageLogo = "logo-music.png";
		if (!empty($oThisSong->sSongImage)) {
			$fb_image = $oThisSong->sSongImage;
		}


		if ($oThisSong->nCDID <> SINGLES_CD_ID) {
			$oCD = new CD();
			$oCD->nCDID = $oThisSong->nCDID;
			if ($oCD->getCD()) {
				$oThisCD = $oCD->aCDRecords[0];
				$sCDBreadcrumbItem = array($oThisCD->sCDName, 'cd.php?cd-id=' . $oThisCD->nCDID);
			}
		}

		//Load Thurdy Song Data
		$oThurdySongData = new ThurdySongData();
		$oThurdySongData->nSongId = $oThisSong->nSongID;
		$oThurdySongData->getThurdySongData();
		if (sizeof($oThurdySongData->aThurdySongDataRecords) > 0) {
			$oThisThurdySongData = $oThurdySongData->aThurdySongDataRecords[0];
		}

		?>
		<!DOCTYPE html
			PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<?php
		include_once(INCLUDE_DIR . "/Head.php");
		?>
		<link href="<?php echo CSS_DIR; ?>/bootstrap3_player.css" rel="stylesheet">

		<body>
			<div class="container">
				<div class="row">
					<?php include_once(INCLUDE_DIR . "/Header.php"); ?>
				</div>
				<div class="row">

					<?php
					if (!empty($oThisSong->sSongImage)) {
						echo "<div class=\"col-xs-12 col-md-4\">";
						echo "<div class=\"song-image\">";
						echo "<img src=\"" . IMG_DIR . "/{$oThisSong->sSongImage}\">";
						echo "</div>";
						echo "</div>";
					}
					if (!empty($oThisSong->sSongDescription)) {
						echo "<div class=\"col-xs-12 col-md-8\">";
						echo "<div class=\"song-description\">";
						echo $oThisSong->sSongDescription;
						renderAwards(AWARD_TYPE_SONG, $oThisSong->nSongID, AWARD_SIZE_LARGE);
						echo "</div>";
						echo "</div>";
					}
					?>
					<div class="col-xs-12">
						<main role="main">
							<?php
							if (!empty($oThisSong->sSampleMP3)) {
								?>
								<div class="row">
									<div class="col-xs-12">
										<h2 class="listen">Listen to "<?php echo $oThisSong->sSongName; ?>"</h2>
										<!--<div class="mp3-player-container">-->
										<audio controls data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
											<source src="<?php echo MP3_DIR . "/{$oThisSong->sSampleMP3}"; ?>" type="audio/mpeg" />
											<a
												href="<?php echo MP3_DIR . "/{$oThisSong->sSampleMP3}"; ?>"><?php echo $oThisSong->sSongName; ?></a>
											An html5-capable browser is required to play this audio.
										</audio>
										<!--</div>-->
									</div>
								</div>


								<?php
							}
							?>
							<div class="row">
								<div class="col-xs-12">
									<section id="song-buttons">
										<?php
										if (!empty($oThisSong->sPurchaseLink)) {
											$sPurchaseLink = $oThisSong->sPurchaseLink;
										}
										if (!empty($sPurchaseLink)) {
											renderPurchaseButton($sPurchaseLink);
										}
										if (!empty($oThisSong->sLyricsHTML)) {
											renderLyricsButton(LYRICS_TYPE_SONG, $oThisSong->nSongID);
										}

										?>
									</section>

								</div>
							</div>

							<div class="row">
								<div class="col-xs-12" style="margin-bottom: 15px">
									<?php
									if (!empty($oThisThurdySongData->sVideoLink)) {
										echo "<h2 class=\"listen\">Watch \"" . $oThisSong->sSongName . "\"</h2>";
										echo "<iframe width=100% height=\"315px\" src=\"" . $oThisThurdySongData->sVideoLink . "\" frameborder=\"0\" allow=\"accelerometer; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
									}
									?>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12">
									<?php
									if (!empty($oThisThurdySongData->nDropId) || !empty($oThisThurdySongData->sArtImage)) {
										echo "<h3 class=\"listen\">Did you find \"{$oThisSong->sSongName}\"?</h3>";
										if (!empty($oThisThurdySongData->nDropId)) {
											echo "<div class=\"col-xs-12\" style=\"text-align: center;\">";

											$oThurdyDrop = new ThurdyDrop();
											$oThurdyDrop->nDropID = $oThisThurdySongData->nDropId;
											$oThurdyDrop->getThurdyDrop();

											if (sizeof($oThurdyDrop->aDropRecords) > 0) {
												$oThisThurdyDrop = $oThurdyDrop->aDropRecords[0];

												echo "<div class=\"col-xs-12\">";
												echo "<figure class=\"drop-image\" style=\"height: auto;\">";
												echo "  <IMG SRC=" . IMG_DIR . "/{$oThisThurdyDrop->sDropImage} />";
												echo "<figcaption>{$oThisThurdyDrop->sDropLocation}<br>";
												if (!empty($oThisThurdyDrop->sDropDesc)) {
													echo "({$oThisThurdyDrop->sDropDesc})</figcaption>";
												}
												echo "</figure>";
												echo "</div>";
											}
											echo "</div>";
										}
										if (!empty($oThisThurdySongData->sArtImage)) {
											echo "<div class=\"col-xs-12\" style=\"text-align: center;\">";
											echo "<IMG SRC=\"" . IMG_DIR . "/{$oThisThurdySongData->sArtImage}\">";
											echo "</div>";

										}
									}
									?>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12">
									<?php
									if (!empty($oThisThurdySongData->sLiveVersion)) {
										echo "<h3 class=\"listen\">Did you hear \"{$oThisSong->sSongName}\" live?</h3>";
										?>
										<audio controls data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
											<source src="<?php echo MP3_DIR . "/{$oThisThurdySongData->sLiveVersion}"; ?>"
												type="audio/mpeg" />
											<a
												href="<?php echo MP3_DIR . "/{$oThisThurdySongData->sLiveVersion}"; ?>"><?php echo $oThisSong->sSongName; ?></a>
											An html5-capable browser is required to play this audio.
										</audio>
										<?php
									}
									?>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-10 col-sm-push-1 col-md-8 col-md-push-2">
									<section id="song-review">
										<?php
										if (!empty($oThisSong)) {
											$oSongReviews = $oThisSong->getReviews();
											if (sizeof($oSongReviews->aReviewRecords) > 1) {
												renderReviewSlideshow($oSongReviews->aReviewRecords);
											} else if (sizeof($oSongReviews->aReviewRecords) > 0) {
												renderReview($oSongReviews->aReviewRecords[0]);
											} else {
												$oReview = new Review();
												$oReview->bGeneral = TRUE;
												$oReview->nArtistID = THURDY_ARTIST_ID;
												if (!$oReview->getReview()) {
													//TODO: Error
												} else {
													renderReviewSlideshow($oReview->aReviewRecords);
												}
											}
										}
										?>
									</section>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12">
									<?php
									if (!empty($oThisCD)) {
										echo "<section class=\"from-the-cd\">";
										echo "<div>";
										echo "<a href=\"{$ROOT}/CD.php?cd-id={$oThisCD->nCDID}\">";
										echo "<H3><i>From the CD</i></H3>";
										echo "<img src=\"" . IMG_DIR . "/{$oThisCD->sCDThumbnail}\">";
										echo "</a>";
										echo "</div>";
										echo "</section>";
									}
									?>

								</div>
							</div>


						</main>
					</div>
				</div>
				<div class="row">
					<?php
					include_once(INCLUDE_DIR . "/Footer.php");
					?>
				</div>
			</div>
		</body>

		</html>

		<?php
	} else {
		$error = new ErrorLog('Song.php', 'getSong()', 'No Songs Found', $oSongs->nSongID, 'SONG');
		$error->writeErrorLog();
	}
}
?>

<script src="<?php echo JS_DIR; ?>/bootstrap3_player.js"></script>
<style>
	.song-description,
	.song-image {
		padding: 15px 30px;
		text-align: center;
	}

	.song-description {
		font-size: 18px;
	}

	.song-image img {
		width: 200px;
	}
</style>