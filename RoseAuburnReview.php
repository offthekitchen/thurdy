<?php

//This include defines the relative path to the root directory from this sub-directory
include_once ("root.inc.php");

//include web site settings
include_once ($ROOT . "/includes/WebsiteSettings.php");

//include Thurdy settings
include_once (SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once (INCLUDE_DIR . "/commonFunctions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageTitle="Rose Auburn Full Review";
$sPageDescription="Rose Auburn Full Review";
$sPageName="Rose Auburn Full Review";
$sPageLogo="logo-read.png";
$fb_image = "FB_oddities.png";

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
					<div class="row">	
						<div class="col-xs-12 col-sm-4 center-contents">
							<img class="cdCover" src="<?php echo IMG_DIR; ?>/oddities-cover.gif">
						</div>						
						<div class="col-xs-12">
                            <blockquote class="review">
								<p>
                                    Oddities is an aptly named collection of eleven weird and quirky short stories that fall under the speculative fiction umbrella as they mash up and/or move broadly between horror, sci-fiction, and fantasy.<br><br>  
                                </p>
                                <p>
                                    However, this description is rather too simplistic, frankly, Oddities, is a mixed bag of downright surrealism.<br><br>
                                </p>
                                <p>
                                    There is a seam of subtle cynical humor through most tales, some are fairly similar in theme and a couple carry motifs from others. All, however, are unique, clever, and certainly unorthodox.<br><br>
                                </p>
                                <p>
                                    The first, Forward, is completely different from any that follow, it’s an interesting, esoterical, and subjective piece with several meanings.<br><br>
                                </p>
                                <p>
                                    Author is nicely set up, the twist is early yet unexpected. It’s a simple premise but one with endless possibilities. Thurdy explores it enough to provoke uneasy thoughts and a rising sense of panicky helplessness.<br><br>
                                </p>
                                <p>
                                    Apocalyptic Home meanders a touch, but Thurdy’s prose is lovely; poetic and elegant which contrasts intriguingly with the subject matter. Further, it’s another story where a strange, possibly sinister apparition appears or is central to the narrative.<br><br>
                                </p>
                                <p>
                                  At first glance, Method, in common with Review, later in the novel, appears to be fantastically tongue-in-cheek. Thurdy takes the premise of a method actor and runs with it. However, as the story unfolds, the light sprinkling of parody gives way to a deeper, more uncomfortable commentary. Similarly, Review, whose entertaining spoofy beginning turns into a visceral, sensory horror show.<br><br>
                                </p>
                                <p>
                                    Thurdy is adept at switching voice and tone while providing a sharp edge of unpredictability to most of his narratives as they gather speed. A number of the stories are radically different in style without sounding contrived or forced. The longer Aliens especially showcases this. It’s compelling and I felt it was one of the strongest. <br><br>
                                </p>
                                <p>
                                    Farmer is probably my favorite. Thurdy’s strong sense of a natural, individual voice hooks the reader from the beginning.  It’s chatty, intimate, and suitably rustic which renders the conclusion even more bizarre than it already is.<br><br>
                                </p>
                                <p>
                                    Impact is neatly amusing and Wish is a wacky slice of disquieting fun that certainly foregrounds Thurdy’s extreme imagination and departure from realism.<br><br>
                                </p>
                                <p>
                                   In the middle of the collection, Thurdy gifts the reader a well-written and accomplished poem, Storm, which gives thoughtful pause amongst the surreal mayhem. The last story, Immortality, written from the point of view of a fifteen-year-old female vampire, works well and carries tentative threads of connection back to Aliens.<br><br>
                                </p>
                                <p>
                                    Oddities takes the reader and hurtles them into a mind-boggling vortex of dark delights. I am beyond curious and a little fearful to see what this innovative and unconventional writer produces next. Well worth a look.<br><br>
                                </p>
                                <cite>
                                <a href="https://www.roseauburn.com/post/oddities" target="_blank">Rose Auburn Writing & Reviews</a>
                                </cite>
                            </blockquote>
                            
                            <div class="center-contents">
                                <a href="https://www.amazon.com/s?k=thurdy+oddities&crid=38I85PNWYS4F4&sprefix=thurdy+oddities%2Caps%2C126&ref=nb_sb_noss_2" target="_blank">
                                    <div class="button purchase-button">PURCHASE</div>	
                                </a>
                            </div>
						</div>	
						
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
