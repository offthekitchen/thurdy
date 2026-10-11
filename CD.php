<?php
//Don't Display Notice messages from PHP Server
error_reporting(E_ALL ^ E_NOTICE);

//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//inlcude web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//Common Functions
include(INCLUDE_DIR . "/commonFunctions.php");

//include CD Class
include_once(CLASS_DIR . "/class_CD.php");

//include Song Class
include_once(CLASS_DIR . "/class_Song.php");

//include Review Class
include_once(CLASS_DIR . "/class_Review.php");

//include Award Class
include_once(CLASS_DIR . "/class_Award.php");

//include Error Log Class
include_once(CLASS_DIR . "/class_ErrorLog.php");

//Get CDs
$oCD = new CD();

//If a CD ID is passed, display information for that CD
if (isset($_REQUEST['cd-id']) && $_REQUEST['cd-id'] != "") {
	$oCD->nCDID = preg_replace("/[^0-9]/", "", $_REQUEST['cd-id']);
} else {
	$oCD->nCDID = DEFAULT_CD_ID;
}

$oCD->nArtistID = THURDY_ARTIST_ID;

if (!$oCD->getCD()) {
	$error = new ErrorLog('CD.php', 'getCD()', 'Error getting CD', $oCD->nCDID, 'CD');
	$error->writeErrorLog();
} else {
	$oSongs = new Song();
	$oSongs->nCDID = $oCD->nCDID;
	if (!$oSongs->getSong()) {
		$error = new ErrorLog('CD.php', 'getSong()', 'Error getting Songs', $oCD->nCDID, 'Song');
		$error->writeErrorLog();
	}
}

?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

$sPageTitle = "Music";
$sPageName = "Music";
$sPageLogo = "logo-music.png";

include_once(INCLUDE_DIR . "/Head.php");

?>

<body>
	<div class="container">
		<div class="row">
			<?php include_once(INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">
			<main id="main-content" class="col-xs-12">
				<?php
				if (sizeof($oCD->aCDRecords) > 0) {

					$oThisCD = $oCD->aCDRecords[0];
					?>
					<article id="cd-list" class="row">
						<div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-5 col-md-push-0">
							<div class="cd-cover">
								<figure class="dynamic-width">
									<img src="<?php echo IMG_DIR . "/{$oThisCD->sCDImage}"; ?>">
								</figure>
								<div class="cd-title"><?php echo $oThisCD->sCDName; ?></div>
								<?php
								renderPurchaseButton($oThisCD->sPurchaseLink);
								renderLyricsButton(LYRICS_TYPE_CD, $oThisCD->nCDID);
								?>
							</div>
							<section class="track-listing">
								<h3>Tracks</h3>
								<ol>
									<?php
									foreach ($oSongs->aSongRecords as $oSong) {
										echo "<li>";
										echo "<a href=\"{$ROOT}/Song.php?song-id={$oSong->nSongID}\">";
										echo "<div class=\"track-title\">{$oSong->sSongName}</div>";
										echo "</a>";
										echo "</li>";
									}
									?>
								</ol>
							</section>
						</div>
						<div class="col-xs-12 col-md-7">
							<section>
								<?php
								renderAwards(AWARD_TYPE_CD, $oThisCD->nCDID, AWARD_SIZE_LARGE);
								echo "<div>";
								echo $oThisCD->sCDDescription;
								echo "</div>";
								?>
							</section>
						</div>
					</article>
					<div id="cd-list" class="row">
						<!--<div class="col-xs-12 col-md-7 col-md-push-5">
						<section>
							<?php
							$oCDReviews = $oThisCD->getReviews();
							if (sizeof($oCDReviews->aReviewRecords) > 1) {
								renderReviewSlideshow($oCDReviews->aReviewRecords);
							} else {
								renderReview($oCDReviews->aReviewRecords[0]);
							}
							?>
						</section>
					</div>	-->
						<div class="col-xs-12 col-md-5">

						</div>
					</div>
				<?php } else {
					echo "NO CD FOUND FOR ID: {$oCD->nCDID}";
					$error = new ErrorLog('CD.php', 'getCD()', 'No CD records found', $oCD->nCDID, 'CD');
					$error->writeErrorLog();
				}
				?>
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