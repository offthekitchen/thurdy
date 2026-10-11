<?php

//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//inlcude web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageTitle = "Cover Concepts";
$sPageDescription = "Cover Concepts";
$sPageName = "Cover Concepts";
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
					<article class="col-xs-12 col-md-6">
						<div class="">
							<figure>
								<img class="cover-image" src="<?php echo IMG_DIR ?>/Cover-Concept1.png">
								<figcaption>Concept 1</figcaption>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="">
							<figure>
								<img class="cover-image" src="<?php echo IMG_DIR ?>/Cover-Concept2.png">
								<figcaption>Concept 2</figcaption>
							</figure>
						</div>
					</article>
                    <article class="col-xs-12 col-md-6">
						<div class="">
							<figure>
								<img class="cover-image img-responsive" src="<?php echo IMG_DIR ?>/Cover-Concept3.png">
								<figcaption>Concept 3</figcaption>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="">
							<figure>
								<img class="cover-image" src="<?php echo IMG_DIR ?>/Cover-Concept4.png">
								<figcaption>Concept 4</figcaption>
							</figure>
						</div>
					</article>
                    <article class="col-xs-12 col-md-6">
						<div class="">
							<figure>
								<img class="cover-image" src="<?php echo IMG_DIR ?>/Cover-Concept5.png">
								<figcaption>Concept 5</figcaption>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="">
							<figure>
								<img class="cover-image" src="<?php echo IMG_DIR ?>/Cover-Concept6.png">
								<figcaption>Concept 6</figcaption>
							</figure>
						</div>
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
<style>
    .cover-image {
        border: 2px solid;
        margin: 5px;
        width: 100%;
	    height: auto;
    }
</style>