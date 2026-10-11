<?php

//This include defines the relative path to the root directory from this sub-directory
include_once ("root.inc.php");

//inlcude web site settings
include_once ($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once (SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once (INCLUDE_DIR . "/commonFunctions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageTitle="What's the Buzz?";
$sPageDescription="You know that you've been talking about me... so has everybody else.";
$sPageName="Chatter";
$sPageLogo="logo-chatter.png";
$fb_image = "fb_thurdy_chatter.jpg";
$nNumberOfComments = 0;
include_once (INCLUDE_DIR . "/Head.php");
?>
<body >
	<div class="container">
		<div class="row">
		<?php include_once (INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<main role="main">
					<aside class="review full-width-phone">
						<blockquote>
						"It takes a lot of work to sound casual. Thurdy's laid-back, back-porch vibe permeates his baritone vocals, rolling guitar playing, and honest lyrics. It's a tune that gives you back more than it asks of you."<br />
						<cite> - <a href="http://independentclauses.com/april-mp3s-1/" target="_blank">Independent Clauses</a></cite>
						</blockquote>
					</aside>
					<aside class="review-alt">
					<blockquote><br />
					Four Thurdy Songs have been nominated for the <a href="http://www.jpfolks.com/2017awards.php" target="_blank">Just Plain Folks Music Awards</a>...
					<ul>
					<li>#7 "<a href="http://thurdy.com/song.php?song=7">The Tony Shuffle</a>" - Modern Rock Song</li>
					<li>#15 "<a href="http://thurdy.com/song.php?song=15">Third Thursday</a>" - Celtic Song</li>
					<li>#22 "<a href="http://thurdy.com/song.php?song=22">I Will Run</a>" - Modern Rock Song</li>
					<li>#23 "<a href="http://thurdy.com/song.php?song=23">Wishbone</a>" - Funk Song</li>
					</ul> 
					</blockquote>
					</aside>
					<div class="row">
					<?php 
					include (INCLUDE_DIR . "/Comments.php");
					?>
					</div>
				</main>
			</div>
		</div>		
		<div class="row">
			<?php
			include_once (INCLUDE_DIR . "/Footer.php");
			?>
		</div>
	</div>	
</body>
</html>
