<?php

//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//include web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//include Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once(INCLUDE_DIR . "/commonFunctions.php");

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageTitle = "READ";
$sPageDescription = "Slightly funny, occassionally dystopian, always weird";
$sPageName = "Testing the Waters";
$sPageLogo = "testing-cover.png";
$fb_image = "FB-testing.png";

include_once(INCLUDE_DIR . "/Head.php");
?>

<body>
    <div class="container">
        <div class="row">
            <?php include_once(INCLUDE_DIR . "/Header.php"); ?>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <main role="main">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 center-contents">
                            <img class="cdCover" src="<?php echo IMG_DIR; ?>/TestingTheWaters-400x400.png">
                        </div>
                        <div class="col-xs-12 col-sm-8">
<!--                             <blockquote class="review">
                                <p>It's The Twilight Zone in book form. Quick reads, fun and imaginative, it's perfect book for a cold day.</p>
                                <cite>
                                    <a href="https://www.amazon.com/review/R275FWJD1X0LW/" target="_blank">Nicole (Amazon)</a>
                                </cite>
                            </blockquote> -->
                            
                            <div class="blurb">
                                <p>The tinker ambles aimlessly through the aisles, carelessly knocking genres off 
                                    the neatly organized shelves as he passes.  He finally finds what he was 
                                    searching for, an unused spot in a far back corner, and dumps his wares out 
                                    of his sack onto the ramshackle folding table left there.  The curator, noticing 
                                    this encroachment, runs toward him screaming, "No!  You can't just set up there.
                                      You need a permit!  You need to be vetted!".  The tinker, undeterred by the 
                                      reprimand, continues to arrange his strange items, each a creation born of 
                                      some slightly mad experiment. "No!", the curator repeats, "You can't sell 
                                      those... whatever they are, here!  We have standards.  There's a process!"  
                                      The tinker places a piece entitled You Don't Mean a Thing to Me on the 
                                      tabletop, pointing it right at the curator. "Look, if you think you're trying 
                                      to be some troubled avant-guard artist, you've missed the mark.  This is just 
                                      random, weird junk.  It looks like something my great Aunt would make at craft 
                                      time in a retirement community for the insane!", she yells.  "Avant-garde", 
                                      the tinker corrects.  "That's what I said...  avant-guard!", she yells.  
                                      "You're spelling it wrong when you say it.", the tinker replies.  The curator 
                                      is right about one thing though.  The pieces are incongruous, ranging from 
                                      kitsch to horrifying.  They don't seem to belong together.  It's questionable 
                                      whether they belong anywhere.  As the tinker places another work among the 
                                      menagerie, the curator admonishes, "That one is just plain disturbing.  Is it 
                                      supposed to be about a gingerbread man or a serial killer?!"  "You're so Cute", 
                                      he replies.  The curator erupts, "Don't you patronize me, you weirdo!". 
                                      "Would you like to add something to the collection?  You can if you want", 
                                      the tinker offers.  The curator pauses for a moment unable to process this last 
                                      statement.  Is this guy so ungoverned that he would allow just anyone to 
                                      participate in his madness?  She has never been asked to create, always only 
                                      being regarded as a gatekeeper.  She allows herself to daydream about a possible 
                                      piece she would entitle Retirement Home for the Insane but snaps out of it 
                                      suddenly.  "If you're not going to leave," she says, "then you can just sit there 
                                      making your little weird meaningless baubles all by yourself.  No one will even 
                                      notice you back here.  No one will care!"  She turns abruptly and stamps off.  
                                      "Yes", the tinker thinks, "She's finally starting to get it." </p>

                            </div>
                            <div class="center-contents">
                                <a href="???"
                                    target="_blank">
                                    <div class="button purchase-button">PURCHASE</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="center-contents">
                                <h3>PRESS RELEASE</h3>
                                <a href="<?php echo PDF_DIR ?>/TestingTheWatersPR.pdf" target="_blank">
                                    <img src="<?php echo IMG_DIR ?>/pdf_icon.png" style="width: 200px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="center-contents" style="padding: 15px;">
                                <h3><?php renderEmailLink('PRESS & INQUIRIES') ?></h3>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
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
    .cdCover {
        max-width: 100%;
        margin: 10px;
    }
</style>