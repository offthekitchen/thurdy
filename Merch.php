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
$sPageTitle = "Merchandise!!";
$sPageDescription = "The best merch in the whole wide Earch!";
$sPageName = "Merch";
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
						<p>These items are usually only available at live gigs, but email if you're interested. 
						</p>
						<p><a href="mailto:info@thurdy.com">info@thurdy.com</a>
						</p>
					</div>		
					<article class="col-xs-12 col-md-6">
						<div class="merch-item">
							<h2 class="merch-title">&eacute;g er gaffallinn T-Shirt</h2>
							<h3>$20 plus shipping</h3>
							<figure>
								<img class="merch-image img-responsive" src="<?php echo IMG_DIR ?>/shirt.jpg">
								<figcaption>Colors and sizes available<br>ONLY A FEW REMAINING<br><?php renderEmailLink('EMAIL') ?> to order</figcaption>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="merch-item">
							<h2 class="merch-title">Sessionhead T-Shirt</h2>
							<h3>$20 plus shipping</h3>
							<figure>
								<img class="merch-image img-responsive" src="<?php echo IMG_DIR ?>/sessionhead-shirt.png">
								<figcaption>Colors and sizes available<br><?php renderEmailLink('EMAIL') ?> to order</figcaption>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="merch-item">
							<h2 class="merch-title">"30"</h2>
							<h3>$10 plus shipping</h3>
							<figure>
								<img class="merch-image img-responsive" src="<?php echo IMG_DIR ?>/30Cover.png">
								<figcaption><?php renderEmailLink('EMAIL') ?> to order</figcaption>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="merch-item">
							<h2 class="merch-title">"Maybe This Wasn't Really Such a Good Idea"</h2>
							<h3>$10 plus shipping</h3>
							<figure>
								<img class="merch-image img-responsive" src="<?php echo IMG_DIR ?>/MTRWSAGI-Cover.png">
								<figcaption><?php renderEmailLink('EMAIL') ?> to order</figcaption>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="merch-item">
							<h2 class="merch-title">"Oddities" Paperback (signed)</h2>
							<h3>$25 plus shipping</h3>
							<figure>
								<img class="merch-image img-responsive" src="<?php echo IMG_DIR ?>/paperback.png">
								<figcaption>Paperback copy of <i>Oddities</i><br>
								(signed and numbered with custom illustration)<br>
								<?php renderEmailLink('EMAIL') ?> to order</figcaption>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="merch-item">
							<h2 class="merch-title">"Oddities" Hardcover (signed)</h2>
							<h3>$30 plus shipping</h3>
							<figure>
								<img class="merch-image img-responsive" src="<?php echo IMG_DIR ?>/hardcover.png">
								<figcaption>Hardcover copy of <i>Oddities</i><br>
								(signed and numbered with custom illustration)<br>
								<?php renderEmailLink('EMAIL') ?> to order</figcaption>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="merch-item">
							<h2 class="merch-title">Hand-bound Oddities</h2>
							<h3>$160 plus shipping</h3>
							<figure>
								<img class="merch-image img-responsive" src="<?php echo IMG_DIR ?>/Book21.png">
								<figcaption>One of a kind hand-bound copy of <i>Oddities</i> (hardcover)<br>
								<div class="center-contents">
									<a href="<?php echo $ROOT ?>/Book21.php">
										<div class="">FIND OUT MORE</div>	
									</a>
								</div>
							</figure>
						</div>
					</article>
					<article class="col-xs-12 col-md-6">
						<div class="merch-item">
							<h2 class="merch-title">The Kitchen Sink</h2>
							<h3>$60 plus shipping</h3>
							<figure>
								<img class="merch-image img-responsive" src="<?php echo IMG_DIR ?>/sink.png">
								<figcaption>Signed copy of <i>Oddities</i> (paperback), T-shirt, sticker, horns, magnet and 2 CDs<br><?php renderEmailLink('EMAIL') ?> to order</figcaption>
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