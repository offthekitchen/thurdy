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
include_once(DATALAYER_DIR . "/ThurdyDrop.php");
include_once(DATALAYER_DIR . "/ThurdyDropRepository.php");

$cds = (new \Datalayer\CDRepository())->findByArtist(THURDY_ARTIST_ID, false, 'release');

$singles = (new \Datalayer\SongRepository())->find([
	'artistId' => THURDY_ARTIST_ID,
	'cdId' => SINGLES_CD_ID,
	'active' => true,
	'displayOnSite' => true,
	'orderBy' => 'release',
]);

// Kept for parity with the legacy page (drops were loaded but unused in the markup)
(new \Datalayer\ThurdyDropRepository())->find();

?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

$sPageTitle = "Music";
$sPageName = "Music";
$sPageLogo = "logo-music.png";
$fb_image = "fb_thurdy_music.jpg";

include_once(INCLUDE_DIR . "/Head.php");

?>

<body>
	<div class="container">
		<div class="row">
			<?php include_once(INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">
			<main id="main-content" class="col-xs-12">

				<div class="row alt-story-border">
					<img src="<?php echo IMG_DIR ?>/alt-story-top.png">
				</div>
				<div class="row alt-home-story">
					<div class="col-xs-12 col-md-2">
						<div class="cd-cover">
							<figure class="dynamic-width">
								<img src="<?php echo IMG_DIR ?>/TestingTheWatersCover.png">
							</figure>
						</div>
					</div>
					<div class="col-xs-12 col-md-10">
						<div class="blurb">
							<h3>NEW ALBUM! <i>TESTING THE WATERS</i></h3>
							<p>The musical journey continues. I've completed another experiment "Testing the Waters".
								It's a colleciton of
								about 10 songs, each one an excuse to try some new technique, equipment or hare-brained
								idea.
							</p>
							<p>As always it's... um... rangy. And a bit weird
							</p>
						</div>
					</div>
				</div>

				<div class="row alt-story-border">
					<img src="<?php echo IMG_DIR ?>/alt-story-bottom.png">
				</div>


				<section id="cd-list" class="row">
					<div class="col-xs-12">
						<header class="section-title cd-section">
							<h2>CDs</h2>
						</header>
					</div>
					<?php
					$nListingNumber = 1;
					foreach ($cds as $oCD) {
						echo "<div class=\"col-xs-12 col-md-6 full-width-xs\">";
						echo "<a href=\"{$ROOT}/CD.php?cd-id={$oCD->id}\">";
						echo "<aside class=\"music-listing listing-{$nListingNumber}\">";
						echo renderCDListing($oCD);
						echo "</aside>";
						echo "</a>";
						echo "</div>";
						$nListingNumber++;
					}
					?>
				</section>
				<?php
				if (count($singles) > 0) {
					?>
					<section id="song-list" class="row">
						<div class="col-xs-12">
							<header class="section-title">
								<h2>Singles</h2>
							</header>
						</div>
						<?php
						$nListingNumber = 1;
						foreach ($singles as $oSingle) {
							echo "<div class=\"col-xs-12 full-width-xs\">";
							echo "<a href=\"{$ROOT}/Song.php?song-id={$oSingle->id}\">";
							echo "<aside class=\"music-listing listing-{$nListingNumber}\">";
							echo renderSongListing($oSingle);
							echo "</aside>";
							echo "</a>";
							echo "</div>";
							$nListingNumber++;
						}
						?>
					</section>
					<div>
						<?php
						renderPurchaseButton("https://www.amazon.com/Maybe-This-Really-Wasnt-Such/dp/B07HR2LDGL");
						?>
					</div>
					<?php
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
