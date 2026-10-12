<?php
error_reporting(E_ALL ^ E_WARNING);
$sPageTitle = "THURDY";
$sPageName = "Home";
$sPageLogo = "header-logo-200.png";
//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//inlcude web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//Common Functions
include(INCLUDE_DIR . "/commonFunctions.php");

include_once(DATALAYER_DIR . "/ThurdyDrop.php");
include_once(DATALAYER_DIR . "/ThurdyDropRepository.php");

$drops = (new \Datalayer\ThurdyDropRepository())->find();
$oShowcasedDrop = null;
if (count($drops) > 0) {
	$oShowcasedDrop = $drops[array_rand($drops)];
}
?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once(INCLUDE_DIR . "/Head.php");

$sCommentText = NULL;
$nNumberOfComments = 5;

?>

<body>
	<div id="home-page-container" class="container">
		<div class="row">
			<?php include_once(INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">

			<div class="col-xs-12 col-md-3">
				<div class="book-cover-container">
					<figure class="dynamic-width">
						<img src="<?php echo IMG_DIR ?>/TestingTheWatersCover.png">
					</figure>
				</div>
			</div>
			<div class="col-xs-12 col-md-9">
				<div class="blurb">
					<h3>NEW ALBUM! <i>TESTING THE WATERS</i></h3>
					<p>The musical journey continues. I've completed another experiment "Testing the Waters". It's a
						colleciton of
						about 10 songs, each one an excuse to try some new technique, equipment or hare-brained idea.
					</p>
					<p>As always it's... um... rangy. And a bit weird
					</p>
					<p><a href="<?php echo $ROOT ?>/Music.php">MORE...</a></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<div class="book-cover-container">
					<img src="<?php echo IMG_DIR ?>/Immortality-Cover-400x400.png">
				</div>
			</div>

			<div class="col-xs-12 col-md-9">
				<div class="blurb">
					<h3>"IMMORTALITY" is a finalist!</h3>
					<p>In addition to be nihilist, the song <i>Immortality</i> is also finalist... as in a
						<a href="https://www.songwriting.net/winners" target="_blank">29th Annual USA Songwriting
							Competition finalist</a>.
						I'm already testing out red carpet poses.
					</p>
				</div>
				<div class="center-contents">
					<a href="<?php echo $ROOT ?>/Song.php?song-id=139">
						<div class="button purchase-button">FIND OUT FOR YOURSELF</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12">
			</div>
			<div class="col-xs-12 col-md-2">
				<div class="book-cover-container">
					<img src="<?php echo IMG_DIR ?>/oddities-cover.gif">
				</div>
			</div>
			<div class="col-xs-12 col-md-10">
				<div class="blurb">
					<h3>READ</h3>
					<blockquote class="review">
						<p>Oddities takes the reader and hurtles them into a mind-boggling vortex of dark delights.</p>
						<cite>
							<a href="https://www.roseauburn.com/post/oddities" target="_blank">Rose Auburn Writing &
								Reviews</a>
							<!-- <a href="./RoseAuburnReview.php" target="_blank">Rose Auburn Writing & Reviews</a> -->
						</cite>
					</blockquote>
					<p>A dystopian vampire teenager, severed finger salad topping, disgruntled Teddy bears, and an army
						of Percivals.
						What do these all have in common? They are all trapped within the pages of this collection of
						stories,
						like a genie waiting to be released from a bottle. Oh, forgot to say, there's a genie in there
						too, but not one
						like you're picturing. This one is actually ... well, you'll find out.</p>
					<p>So, for those of you who spend your life in a state of perpetual distraction,
						who want to buy everything in the art supply shop, whose co-workers don't know you write
						poetry...</p>
					<p>no more staring into the mirror wondering how nice it would be to have horns.</p>
					<p>It's time to grow a pair.</p>
					<p><a href="<?php echo $ROOT ?>/Oddities.php">MORE...</a></p>
				</div>
				<div class="center-contents">
					<a href="https://www.amazon.com/s?k=thurdy+oddities&crid=38I85PNWYS4F4&sprefix=thurdy+oddities%2Caps%2C126&ref=nb_sb_noss_2"
						target="_blank">
						<div class="button purchase-button">PURCHASE</div>
					</a>
				</div>
			</div>
		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-top.png">
		</div>
		<div class="row alt-home-story">
			<div class="col-xs-12">
				<div class="new-cd-title">
					LISTEN
				</div>
			</div>
			<div class="col-xs-12">
				<div class="more-info">
					CDs
				</div>
				<div class="cds-cover">
					<figure class="dynamic-width">
						<img src="<?php echo IMG_DIR ?>/CDs.png">
					</figure>
					<?php
					renderPurchaseButton("https://www.amazon.com/Maybe-This-Really-Wasnt-Such/dp/B07HR2LDGL");
					?>
				</div>
			</div>
		</div>

		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-bottom.png">
		</div>

		<div class="row home-story">
			<div class="col-xs-12">
				<div class="new-cd-title">
					WATCH
				</div>
			</div>
			<div class="col-xs-12 col-md-2">
				<div class="cd-cover">
					<figure class="dynamic-width">
						<img src="<?php echo IMG_DIR ?>/Videos.png">
					</figure>
				</div>
			</div>
			<div class="col-xs-12 col-md-10">
				<div class="blurb">
					<h3>VIDEOS</h3>
					<p>They say a picture is worth 1000 words. These videos are 20 frames per second and between 2 and 4
						minutes each.
						That's 3,480,000 to 6,969,000 words. For free!
					</p>
					<p>Don't let this opportunity pass you buy.
					</p>
					<p><a href="<?php echo $ROOT ?>/Videos.php">MORE...</a></p>
				</div>
			</div>
			<div class="col-xs-12 col-md-10">
				<div class="blurb">
					<h3>ART</h3>
					<p>If you find an old purple electric bass abandonded by the side of a bike path you could leave it
						there like
						a normal person. Or you could take it home amake a picture frame out of it.
					</p>
					<p>A purple bass... purple!.
					</p>
					<p><a href="<?php echo $ROOT ?>/Art.php">MORE...</a></p>
				</div>
			</div>

		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-top2.png">
		</div>
		<div class="row alt-home-story2">
			<div class="col-xs-12">
				<div class="new-cd-title">
					WEAR
				</div>
			</div>
			<div class="col-xs-12 col-md-2">
				<div class="cd-cover">
					<figure class="dynamic-width">
						<img src="<?php echo IMG_DIR ?>/sink.jpg">
					</figure>
				</div>
			</div>
			<div class="col-xs-12 col-md-10">
				<div class="blurb">
					<h3>THE BEST MERCH ON EARCH</h3>
					<p>Stickers and magnets and inexplicable t-shirts, Oh my!</p>
					<p>If you're tired of waiting to find a CD somewhere, if you want sport one of those "I am the fork"
						shirts
						you keep seeing celebrities wear at the Oscars, if you want horns...
					</p>
					<p>I can hook you up.</p>
					<p><a href="<?php echo $ROOT ?>/Merch.php">MORE...</a></p>
				</div>
			</div>
		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-bottom2.png">
		</div>

		<div class="row home-story">
			<div class="col-xs-12">
				<div class="new-cd-title">
					BOOK
				</div>
			</div>
			<div class="col-xs-12 col-md-2">
				<div class="cd-cover">
					<figure class="dynamic-width">
						<img src="<?php echo IMG_DIR ?>/book.jpg">
					</figure>
				</div>
			</div>
			<div class="col-xs-12 col-md-10">
				<div class="blurb">
					<h3>WANNA HEAR THURDY LIVE?</h3>
					<p>At the root of all of this is music, and if you wanna hear the songs performed in a live acoustic
						set, get in touch.</p>
					<p>I've had years of experience performing all over the US, in Canada, in Europe, and... <i>insert
							you town here </i></p>
					<p><a href="<?php echo $ROOT ?>/Live.php">MORE...</a></p>
				</div>
			</div>
		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-top3.png">
		</div>
		<div class="row alt-home-story3">
			<div class="col-xs-12">
				<div class="new-cd-title">
					TALK
				</div>
			</div>
			<div class="col-xs-12">
				<div class="blurb">
					<h3>GOT SOMETHING TO SAY?</h3>
					<p>Reach out if you have questions, comments, ideas, or photos of a Thrudy CD drop.</p>
					<p>Be forewarned. I've been told I'm a bit chatty.</p>
					<p><a href="<?php echo $ROOT ?>/Contact.php">MORE...</a></p>
				</div>
			</div>
		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-bottom3.png">
		</div>
		<div class="row home-story">
			<div class="col-xs-12">
				<div class="new-cd-title">
					LEARN
				</div>
			</div>
			<div class="col-xs-12">
				<div class="blurb">
					<h3>FIND OUT MORE</h3>
					<p>How does a simple songwriting project spin so out of control? </p>
					<p>Why did you find a Thurdy CD abandonded on a park bench or in an alley?</p>
					<p>What's the deal with the fork?</p>
					<p>What the &%#! is going on here?</p>
					<p><a href="<?php echo $ROOT ?>/About.php">MORE...</a></p>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="new-cd-title">DID YOU FIND ME?</div>
				<div>Folks have been "dropping" Thurdy CDs in cool places all over the world. Why are people trying to
					get rid of my music? Oh well, it's made for some cool photos. If you find a CD that you wanna
					unload,
					feel free to drop it somewhere fun... and take a photo!
				</div>
				<div>
					<a href="<?php echo $ROOT ?>/Where.php">MORE...</a>
				</div>
				<?php
				if ($oShowcasedDrop !== null) {
					echo "<figure class=\"drop-image\">";
					echo "  <IMG SRC=" . IMG_DIR . "/drops/{$oShowcasedDrop->dropImage} />";
					echo "<figcaption>{$oShowcasedDrop->dropLocation}<br>";
					if (!empty($oShowcasedDrop->dropDesc)) {
						echo "({$oShowcasedDrop->dropDesc})</figcaption>";
					}
					echo "</figure>";
				}
				?>
			</div>
		</div>
		<div id="footer" class="row">
			<?php
			include_once(INCLUDE_DIR . "/Footer.php");
			?>
		</div>
	</div>
	</div>
</body>

</html>