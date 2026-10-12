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

include_once(DATALAYER_DIR . "/CD.php");
include_once(DATALAYER_DIR . "/CDRepository.php");
include_once(DATALAYER_DIR . "/Song.php");
include_once(DATALAYER_DIR . "/SongRepository.php");
include_once(DATALAYER_DIR . "/Review.php");
include_once(DATALAYER_DIR . "/ReviewRepository.php");

if (isset($_REQUEST['cd-id']) && $_REQUEST['cd-id'] != "") {
	$cdId = (int) preg_replace("/[^0-9]/", "", $_REQUEST['cd-id']);
} else {
	$cdId = DEFAULT_CD_ID;
}

$oThisCD = (new \Datalayer\CDRepository())->findById($cdId);
$songs = [];
if ($oThisCD !== null) {
	$songs = (new \Datalayer\SongRepository())->findByCdId($oThisCD->id);
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
				if ($oThisCD !== null) {
					?>
					<article id="cd-list" class="row">
						<div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-5 col-md-push-0">
							<div class="cd-cover">
								<figure class="dynamic-width">
									<img src="<?php echo IMG_DIR . "/{$oThisCD->image}"; ?>">
								</figure>
								<div class="cd-title"><?php echo $oThisCD->name; ?></div>
								<?php
								renderPurchaseButton($oThisCD->purchaseLink);
								renderLyricsButton(LYRICS_TYPE_CD, $oThisCD->id);
								?>
							</div>
							<section class="track-listing">
								<h3>Tracks</h3>
								<ol>
									<?php
									foreach ($songs as $oSong) {
										echo "<li>";
										echo "<a href=\"{$ROOT}/Song.php?song-id={$oSong->id}\">";
										echo "<div class=\"track-title\">{$oSong->name}</div>";
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
								renderAwards(AWARD_TYPE_CD, $oThisCD->id, AWARD_SIZE_LARGE);
								echo "<div>";
								echo $oThisCD->description;
								echo "</div>";
								?>
							</section>
						</div>
					</article>
					<div id="cd-list" class="row">
						<!--<div class="col-xs-12 col-md-7 col-md-push-5">
						<section>
							<?php
							$cdReviews = (new \Datalayer\ReviewRepository())->find(['cdId' => $oThisCD->id]);
							if (count($cdReviews) > 1) {
								renderReviewSlideshow($cdReviews);
							} elseif (count($cdReviews) > 0) {
								renderReview($cdReviews[0]);
							}
							?>
						</section>
					</div>	-->
						<div class="col-xs-12 col-md-5">

						</div>
					</div>
				<?php } else {
					echo "NO CD FOUND FOR ID: {$cdId}";
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
