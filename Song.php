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
include_once(DATALAYER_DIR . "/CD.php");
include_once(DATALAYER_DIR . "/CDRepository.php");
include_once(DATALAYER_DIR . "/Review.php");
include_once(DATALAYER_DIR . "/ReviewRepository.php");
include_once(DATALAYER_DIR . "/ThurdySongData.php");
include_once(DATALAYER_DIR . "/ThurdySongDataRepository.php");
include_once(DATALAYER_DIR . "/ThurdyDrop.php");
include_once(DATALAYER_DIR . "/ThurdyDropRepository.php");

$songRepo = new \Datalayer\SongRepository();
$songId = DEFAULT_SONG_ID;
if (isset($_REQUEST['song-id']) && $_REQUEST['song-id'] != "") {
	$songId = (int) preg_replace("/[^0-9]/", "", $_REQUEST['song-id']);
}

$oThisSong = $songRepo->findById($songId);
if ($oThisSong === null && $songId !== DEFAULT_SONG_ID) {
	$oThisSong = $songRepo->findById(DEFAULT_SONG_ID);
}

$oThisCD = null;
$oThisThurdySongData = null;

if ($oThisSong !== null) {
	$sPageName = "{$oThisSong->name}";
	$sPageDescription = "{$oThisSong->description}";
	$sPageTitle = "$oThisSong->name";
	$sPageLogo = "logo-music.png";
	if (!empty($oThisSong->image)) {
		$fb_image = $oThisSong->image;
	}

	if ($oThisSong->cdId !== null && $oThisSong->cdId !== SINGLES_CD_ID) {
		$oThisCD = (new \Datalayer\CDRepository())->findById($oThisSong->cdId);
		if ($oThisCD !== null) {
			$sCDBreadcrumbItem = array($oThisCD->name, 'cd.php?cd-id=' . $oThisCD->id);
		}
	}

	$songDataRows = (new \Datalayer\ThurdySongDataRepository())->find(['songId' => $oThisSong->id]);
	if (count($songDataRows) > 0) {
		$oThisThurdySongData = $songDataRows[0];
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
				if (!empty($oThisSong->image)) {
					echo "<div class=\"col-xs-12 col-md-4\">";
					echo "<div class=\"song-image\">";
					echo "<img src=\"" . IMG_DIR . "/{$oThisSong->image}\">";
					echo "</div>";
					echo "</div>";
				}
				if (!empty($oThisSong->description)) {
					echo "<div class=\"col-xs-12 col-md-8\">";
					echo "<div class=\"song-description\">";
					echo $oThisSong->description;
					renderAwards(AWARD_TYPE_SONG, $oThisSong->id, AWARD_SIZE_LARGE);
					echo "</div>";
					echo "</div>";
				}
				?>
				<div class="col-xs-12">
					<main role="main">
						<?php
						if (!empty($oThisSong->sampleMp3)) {
							?>
							<div class="row">
								<div class="col-xs-12">
									<h2 class="listen">Listen to "<?php echo $oThisSong->name; ?>"</h2>
									<audio controls data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
										<source src="<?php echo MP3_DIR . "/{$oThisSong->sampleMp3}"; ?>" type="audio/mpeg" />
										<a
											href="<?php echo MP3_DIR . "/{$oThisSong->sampleMp3}"; ?>"><?php echo $oThisSong->name; ?></a>
										An html5-capable browser is required to play this audio.
									</audio>
								</div>
							</div>
							<?php
						}
						?>
						<div class="row">
							<div class="col-xs-12">
								<section id="song-buttons">
									<?php
									if (!empty($oThisSong->purchaseLink)) {
										renderPurchaseButton($oThisSong->purchaseLink);
									}
									if (!empty($oThisSong->lyricsHtml)) {
										renderLyricsButton(LYRICS_TYPE_SONG, $oThisSong->id);
									}
									?>
								</section>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12" style="margin-bottom: 15px">
								<?php
								if ($oThisThurdySongData !== null && !empty($oThisThurdySongData->videoLink)) {
									echo "<h2 class=\"listen\">Watch \"" . $oThisSong->name . "\"</h2>";
									echo "<iframe width=100% height=\"315px\" src=\"" . $oThisThurdySongData->videoLink . "\" frameborder=\"0\" allow=\"accelerometer; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";
								}
								?>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<?php
								if ($oThisThurdySongData !== null && (!empty($oThisThurdySongData->dropId) || !empty($oThisThurdySongData->artImage))) {
									echo "<h3 class=\"listen\">Did you find \"{$oThisSong->name}\"?</h3>";
									if (!empty($oThisThurdySongData->dropId)) {
										echo "<div class=\"col-xs-12\" style=\"text-align: center;\">";
										$oThisThurdyDrop = (new \Datalayer\ThurdyDropRepository())->findById($oThisThurdySongData->dropId);
										if ($oThisThurdyDrop !== null) {
											echo "<div class=\"col-xs-12\">";
											echo "<figure class=\"drop-image\" style=\"height: auto;\">";
											echo "  <IMG SRC=\"" . IMG_DIR . "/drops/{$oThisThurdyDrop->dropImage}\" />";
											echo "<figcaption>{$oThisThurdyDrop->dropLocation}<br>";
											if (!empty($oThisThurdyDrop->dropDesc)) {
												echo "({$oThisThurdyDrop->dropDesc})</figcaption>";
											}
											echo "</figure>";
											echo "</div>";
										}
										echo "</div>";
									}
									if (!empty($oThisThurdySongData->artImage)) {
										echo "<div class=\"col-xs-12\" style=\"text-align: center;\">";
										echo "<IMG SRC=\"" . IMG_DIR . "/{$oThisThurdySongData->artImage}\">";
										echo "</div>";
									}
								}
								?>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<?php
								if ($oThisThurdySongData !== null && !empty($oThisThurdySongData->liveVersion)) {
									echo "<h3 class=\"listen\">Did you hear \"{$oThisSong->name}\" live?</h3>";
									?>
									<audio controls data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
										<source src="<?php echo MP3_DIR . "/{$oThisThurdySongData->liveVersion}"; ?>"
											type="audio/mpeg" />
										<a
											href="<?php echo MP3_DIR . "/{$oThisThurdySongData->liveVersion}"; ?>"><?php echo $oThisSong->name; ?></a>
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
									$songReviews = (new \Datalayer\ReviewRepository())->find(['songId' => $oThisSong->id]);
									if (count($songReviews) > 1) {
										renderReviewSlideshow($songReviews);
									} elseif (count($songReviews) > 0) {
										renderReview($songReviews[0]);
									} else {
										$generalReviews = (new \Datalayer\ReviewRepository())->find([
											'general' => true,
											'artistId' => THURDY_ARTIST_ID,
										]);
										if (count($generalReviews) > 0) {
											renderReviewSlideshow($generalReviews);
										}
									}
									?>
								</section>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<?php
								if ($oThisCD !== null) {
									echo "<section class=\"from-the-cd\">";
									echo "<div>";
									echo "<a href=\"{$ROOT}/CD.php?cd-id={$oThisCD->id}\">";
									echo "<H3><i>From the CD</i></H3>";
									echo "<img src=\"" . IMG_DIR . "/{$oThisCD->thumbnail}\">";
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
