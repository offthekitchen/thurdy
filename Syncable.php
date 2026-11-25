<?php
error_reporting(E_ALL ^ E_WARNING);
$sPageTitle = "SYNC-ABLE";
$sPageName = "Syncable";
$sPageLogo = "header-logo-200.png";
//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//inlcude web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//Common Functions
include(INCLUDE_DIR . "/commonFunctions.php");

?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once(INCLUDE_DIR . "/Head.php");
?>

<body>
	<div id="home-page-container" class="container">
		<div class="row">
			<?php include_once(INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row home-story">
			<div class="col-xs-12">
				<div class="more-info">
					Well, you've gone and stumbled onto my sync licensing page.<br>
				</div>
				<div class="syncable-text">
					Below you'll find a collection of slightly off-kilter tunes available for sync in film, TV, advertising, trailers, and online content.<br>
					Each song is available as an instrumental or with vocals, and all are originals written, performed and produced by me (no muss, no fuss for clearing) and with not even a hint of AI.<br>
					They are not ordinary though.  You can find tons of that elsewhere.  But if you're looking for 
					something different to set your work apart, they might be exactly what you're looking for.<br>
					...And if you need a different length, format or other version, <?php renderEmailLink('HIT ME UP');?> for licensing enquiries or bespoke edits!!<BR>   
				</div>
			</div>
		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-top.png" class="syncable-border">
		</div>
		<div class="row alt-home-story">
			<div class="col-xs-12 col-md-4">
				<div class="syncable-title">
					Immortality
				</div>
				<div class="syncable-text">Punchy, electronic, mayhem</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">INSTRUMENTAL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=immortality-instrumental" type="audio/mpeg" />
					</audio>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">FULL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=immortality-full" type="audio/mpeg" />
					</audio>
				</div>
			</div>
		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-bottom.png" class="syncable-border">
		</div>
		<div class="row home-story">
			<div class="col-xs-12 col-md-4">
				<div class="syncable-title">
					Afternoon with Einstein
				</div>
				<div class="syncable-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">INSTRUMENTAL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=afternoon-with-einstein-instrumental" type="audio/mpeg" />
					</audio>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">FULL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=afternoon-with-einstein-full" type="audio/mpeg" />
					</audio>
				</div>
			</div>
		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-top2.png" class="syncable-border">
		</div>
		<div class="row alt-home-story2">
			<div class="col-xs-12 col-md-4">
				<div class="syncable-title">
					Drive Myself Insane
				</div>
				<div class="syncable-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">INSTRUMENTAL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=drive-myself-insane-instrumental" type="audio/mpeg" />
					</audio>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">FULL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=drive-myself-insane-full" type="audio/mpeg" />
					</audio>
				</div>
			</div>
		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-bottom2.png" class="syncable-border">
		</div>

		<div class="row home-story">
			<div class="col-xs-12 col-md-4">
				<div class="syncable-title">
					You Don't Mean a Thing to Me
				</div>
				<div class="syncable-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">INSTRUMENTAL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=you-dont-mean-a-thing-instrumental" type="audio/mpeg" />
					</audio>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">FULL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=you-dont-mean-a-thing-full" type="audio/mpeg" />
					</audio>
				</div>
			</div>
		</div>

		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-top3.png" class="syncable-border">
		</div>
		<div class="row alt-home-story3">
			<div class="col-xs-12 col-md-4">
				<div class="syncable-title">
					The Loop
				</div>
				<div class="syncable-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">INSTRUMENTAL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=the-loop-instrumental" type="audio/mpeg" />
					</audio>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">FULL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=the-loop-full" type="audio/mpeg" />
					</audio>
				</div>
			</div>
		</div>
		<div class="row alt-story-border">
			<img src="<?php echo IMG_DIR ?>/alt-story-bottom3.png" class="syncable-border">
		</div>
		<div class="row home-story">
			<div class="col-xs-12 col-md-4">
				<div class="syncable-title">
					You're So Cute
				</div>
				<div class="syncable-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">INSTRUMENTAL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=youre-so-cute-instrumental" type="audio/mpeg" />
					</audio>
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<h3 class="syncable-stream">FULL</h3>
				<div class="syncable-song">
					<audio controls controlsList="nodownload" preload="metadata" data-info-att="Music: Thurdy" data-info-att-link="https://www.thurdy.com">
						<source src="<?php echo $ROOT; ?>/stream-sync.php?track=youre-so-cute-full" type="audio/mpeg" />
					</audio>
				</div>
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