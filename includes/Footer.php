<!--footer section-->
<div class="col-xs-12">
	<footer id="pageFooter" role="contentinfo">
		<div class="row">
		<section class="col-xs-5 socialMediaMenu">
			<div class="content">
				<div class="socialMediaItem">
					<a id="FB_Icon" href="https://www.facebook.com/Thurdy-421527827982927/" target="_blank"></a>
				</div>
				<div class="socialMediaItem">
					<a id="youTube_Icon" href="https://www.youtube.com/channel/UCHxFtk2DXuy-ouYnzB12ZWQ"
						target="_blank"></a>
				</div>
				<div class="socialMediaItem">
					<a id="email_Icon" href="mailto:info@thurdy.com"></a>
				</div>
			</div>
		</section>
		<div class="col-xs-6">
			<span id="footer-logo" class="visible-sm visible-xs"><img
					src="<?php echo IMG_DIR ?>/footer-logo.png"></span>
			<span class="email">email: <?php renderEmailLink(null) ?><br /></span>
		</div>
		<div class="col-xs-12">
			<p>
				&copy; copyright
				<?php echo date("Y"); ?> <b>Colorado Sessions. All Rights Reserved. </b>All music, audio recordings,
				lyrics,
				graphic design, illustrations, and photography on this website are protected by copyright. No part of
				this
				creative work may be scraped, downloaded, cloned, or used to train, fine-tune, or generate outputs from
				artificial intelligence (AI) or machine learning models without express prior written permission.
			</p>
			<p class="footer-copyright-link">
				<a href="<?php echo $ROOT; ?>/copyright.php">Copyright</a>
			</p>
		</div>
		</div>
	</footer>
</div>
<!--end footer section-->