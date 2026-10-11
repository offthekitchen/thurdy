<?php

//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//include web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//include Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once (INCLUDE_DIR . "/commonFunctions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageTitle = "Hand-bound Oddities";
$sPageDescription = "Hand-bound Hardcover Copy of Oddities";
$sPageName = "Hand-bound Oddities";
$sPageLogo = "logo-merch.png";
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
						<p>I decided to hand-bound a copy of "Oddities" using one of my t-shirts as the cloth for the cover.
                            It is by no means a computer-machined copy, but it is a one-of-a-kind custom hardcover book assembled by hand.
                            It does have some "character", but it is high quality.  It is the 21st book produced out of my Hare-brained Bindery
                            and has a had-writted note in verifying that it is hand-made along with images of the binding process.        
						</p>
						<p>
                            <?php renderEmailLink('EMAIL') ?> to order
						</p>
					</div>		
                    <article class="col-xs-12 col-sm-6 col-md-4">
							<figure class="center-contents">
								<img class="img-responsive" src="<?php echo IMG_DIR ?>/Book21a.png">
								<figcaption>printed of high-quality paper</figcaption>
							</figure>
					</article>
                    <article class="col-xs-12 col-sm-6 col-md-4">
							<figure>
								<img class="img-responsive" src="<?php echo IMG_DIR ?>/Book21b.png">
								<figcaption>hand-folded</figcaption>
							</figure>
					</article>
                    <article class="col-xs-12 col-sm-6 col-md-4">
							<figure>
								<img class="img-responsive" src="<?php echo IMG_DIR ?>/Book21c.png">
								<figcaption>hand-sewn signature</figcaption>
							</figure>
					</article>
                    <article class="col-xs-12 col-sm-6 col-md-4">
							<figure>
								<img class="img-responsive" src="<?php echo IMG_DIR ?>/Book21d.png">
								<figcaption>bookmark and endsheets added</figcaption>
							</figure>
					</article>
                    <article class="col-xs-12 col-sm-6 col-md-4">
							<figure>
								<img class="img-responsive" src="<?php echo IMG_DIR ?>/Book21e.png">
								<figcaption>t-shirt used for book cloth</figcaption>
							</figure>
					</article>
                    <article class="col-xs-12 col-sm-6 col-md-4">
							<figure>
								<img class="img-responsive" src="<?php echo IMG_DIR ?>/Book21f.png">
								<figcaption>hardcover case</figcaption>
							</figure>
					</article>
                    <article class="col-xs-12 col-sm-6 col-md-4">
							<figure>
								<img class="img-responsive" src="<?php echo IMG_DIR ?>/Book21g.png">
								<figcaption>final assembly</figcaption>
							</figure>
					</article>                    <article class="col-xs-12 col-sm-6 col-md-4">
							<figure>
								<img class="img-responsive" src="<?php echo IMG_DIR ?>/Book21.png">
								<figcaption>finished book</figcaption>
							</figure>
					</article>
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