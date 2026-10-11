<!--header section-->
<div class="col-xs-12">
	<header id="pageHeader" role="banner">
		<section id="pageTitle">
			<div id="title-container">
			<?php
			if (is_numeric($sPageLogo)) {
				echo "<div id=\"headerLogo\"><div class=\"song-logo\">{$sPageLogo}</div></div>";
			}else
			{
				echo "<div id=\"headerLogo\"><a href=\"" . $ROOT . "/index.php\" title=\"Home\"><img src=\"" . IMG_DIR . "/{$sPageLogo}\" /></a></div>";
			}
			?>				
			<h1><?php echo $sPageTitle ?></h1>
			</div>
		</section>
		<div id="nav-container">
			<nav role="navigation" class="full-width-phone">
				<ul>
					<li id="nav-books" <?php if ($sPageName == "Oddities"){echo " class=\"selected\"";} ?>><A href="<?php echo $ROOT;?>/Oddities.php" title="Read">read</A></li>
					<li id="nav-music" <?php if ($sPageName == "Music"){echo " class=\"selected\"";} ?>><A href="<?php echo $ROOT;?>/Music.php" title="Listen">listen</A></li>
					<li id="nav-videos" <?php if ($sPageName == "Videos"){echo " class=\"selected\"";} ?>><A href="<?php echo $ROOT;?>/Videos.php" title="Watch">watch</A></li>
					<li id="nav-merch" <?php if ($sPageName == "Merch"){echo " class=\"selected\"";} ?>><A href="<?php echo $ROOT;?>/Merch.php" title="Wear">buy</A></li>	
					<li id="nav-live" <?php if ($sPageName == "Live"){echo " class=\"selected\"";} ?>><A href="<?php echo $ROOT;?>/Live.php" title="Live">book</A></li>	
					<li id="nav-about" <?php if ($sPageName == "About"){echo " class=\"selected\"";} ?>><A href="<?php echo $ROOT;?>/About.php" title="Learn">learn</A></li>
					<li id="nav-contact" <?php if ($sPageName == "Contact"){echo " class=\"selected\"";} ?>><A href="<?php echo $ROOT;?>/Contact.php" title="Contact">talk</A></li>
				</ul>
			</nav>
<!-- 			<div id="site-tag-line" class="visible-xs visible-sm">
				Maybe This Really Wasn't Such a Good Idea
			</div> -->
		</div>
			<section class="socialMediaMenu">
				<div class="content">
					<div class="socialMediaItem">
						<a id="FB_Icon" href="https://www.facebook.com/Thurdy-421527827982927/" target="_blank"></a>
					</div>
					<div class="socialMediaItem">
						<a id="youTube_Icon" href="https://www.youtube.com/channel/UCHxFtk2DXuy-ouYnzB12ZWQ" target="_blank"></a>
					</div>
					<div class="socialMediaItem">
						<a id="email_Icon" href="mailto:info@thurdy.com"></a>
					</div>
				</div>
			</section>		
	</header>
</div>
<!--end header section-->