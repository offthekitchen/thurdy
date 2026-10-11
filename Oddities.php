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
$sPageName = "Oddities";
$sPageLogo = "logo-read.png";
$fb_image = "FB_oddities.png";

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
                            <img class="cdCover" src="<?php echo IMG_DIR; ?>/oddities-cover.gif">
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <blockquote class="review">
                                <p>... I ended up reading practically the whole book the first night I opened it. It was just so weird and intriguing and I had no idea what to expect that I simply had to keep reading to find out.</p>
                                <cite>
                                    <a href="https://thebookdragondotblog.wordpress.com/2026/03/16/mini-book-review-oddities/" target="_blank">Nikki (The Book Dragon: Indie Book Reviews and Recommendations)</a>
                                </cite>
                            </blockquote>
                             <blockquote class="review">
                                <p>Oddities was a delight ... clever and fun.</p>
                                <cite>
                                    <a href="https://www.amazon.com/review/RVGKRLEVWQO9M/" target="_blank">Action Junkie (Amazon)</a>
                                </cite>
                            </blockquote>
                            <blockquote class="review">
                                <p>It’s The Twilight Zone in book form. Quick reads, fun and imaginative, it’s perfect book for a cold day.</p>
                                <cite>
                                    <a href="https://www.amazon.com/review/R275FWJD1X0LW/" target="_blank">Nicole (Amazon)</a>
                                </cite>
                            </blockquote>
                            <blockquote class="review">
                                <p>Oddities takes the reader and hurtles them into a mind-boggling vortex of dark
                                    delights.</p>
                                <cite>
                                    <a href="https://www.roseauburn.com/post/oddities" target="_blank">Rose Auburn
                                        Writing & Reviews</a>
                                    <!-- <a href="./RoseAuburnReview.php" target="_blank">Rose Auburn Writing & Reviews</a> -->
                                </cite>
                            </blockquote>
                            <blockquote class="review">
                                <p> I haven't read a short story collection that was this much fun in a long time, if
                                    ever.</p>
                                <cite>
                                    BigAl (<a
                                        href="https://booksandpals.blogspot.com/2024/05/review-oddities-by-thurdy.html"
                                        target="_blank">Books and Pals</a>)
                                </cite>
                            </blockquote>
                            <blockquote class="review">
                                <p>Readers will surely find something they like in these oddities. A nice read!</p>
                                <cite>
                                    Kindle Reader (<a
                                        href="https://www.amazon.com/gp/customer-reviews/R3E10UCQBNI5MD/ref=cm_cr_arp_d_rvw_ttl?ie=UTF8&ASIN=B0CSM3PXJW"
                                        target="_blank">Amazon</a>)
                                </cite>
                            </blockquote>
                            <blockquote class="review">
                                <p>Overall, I greatly enjoyed Mr. Thurdy's writing and encourage him to carry on. More,
                                    please! Five stars.</p>
                                <cite>
                                    Book Reader (<a href="https://www.goodreads.com/review/show/6481825144"
                                        target="_blank">Goodreads</a>)
                                </cite>
                            </blockquote>
                            <blockquote class="review">
                                <p>Wonderful!</p>
                                <cite>
                                    Molly (<a
                                        href="https://www.amazon.com/gp/customer-reviews/R2G7FW5DT9CR7M/ref=cm_cr_arp_d_rvw_ttl?ie=UTF8&ASIN=B0CSM3PXJW"
                                        target="_blank">Amazon</a>)
                                </cite>
                            </blockquote>
                            <blockquote class="review">
                                <p>If you love delightfully weird and memorable tales that break the rules, keep
                                    reading.</p>
                                <p>Oddities put a unique spin on the science fiction genre.</p>
                                <cite>
                                    Astilbe (<a
                                        href="https://www.longandshortreviews.com/book-reviews/oddities-by-thurdy/"
                                        target="_blank">Long and Short Reviews</a>)
                                </cite>
                            </blockquote>
                            <blockquote class="review">
                                <p>It's a light, fun read, perfect for a day spent on a cozy couch or lounging by the
                                    pool.</p>
                                <cite>
                                    Ian (<a
                                        href="https://www.amazon.com/gp/customer-reviews/R3LBSQ32JZK660?ref=pf_vv_at_pdctrvw_srp"
                                        target="_blank">Amazon</a>)
                                </cite>
                            </blockquote>
                            <div class="blurb">
                                <p>A dystopian vampire teenager, severed finger salad topping, disgruntled Teddy bears,
                                    and an army of Percivals.
                                    What do these all have in common? They are all trapped within the pages of this
                                    collection of stories,
                                    like a genie waiting to be released from a bottle. Oh, forgot to say, there's a
                                    genie in there too, but not one
                                    like you're picturing. This one is actually ... well, you'll find out.</p>
                                <p>So, for those of you who spend your life in a state of perpetual distraction,
                                    who want to buy everything in the art supply shop, whose co-workers don't know you
                                    write poetry...</p>
                                <p>no more staring into the mirror wondering how nice it would be to have horns.</p>
                                <p>It's time to grow a pair.</p>

                            </div>
                            <div class="center-contents">
                                <a href="https://www.amazon.com/s?k=thurdy+oddities&crid=38I85PNWYS4F4&sprefix=thurdy+oddities%2Caps%2C126&ref=nb_sb_noss_2"
                                    target="_blank">
                                    <div class="button purchase-button">PURCHASE</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin: 15px 0;">
                            <div class="center-contents">
                                <h1>INFO</h1>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="center-contents">
                                <h3>PRESS RELEASE</h3>
                                <a href="<?php echo PDF_DIR ?>/OdditiesPR.pdf" target="_blank">
                                    <img src="<?php echo IMG_DIR ?>/pdf_icon.png" style="width: 200px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">

                            <div class="book-info">
                                <p>
                                    <b>ISBNs</b>
                                <ul>
                                    <li>979-8-218-34201-2 (paperback)</li>
                                    <li>979-8-9898121-0-3 (eBook)</li>
                                    <li>979-8-9898121-1-0 (hardcover)</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="book-info">
                                <p>
                                    <b>ASINs</b>
                                <ul>
                                    <li>B0CSHF89KK (paperback)</li>
                                    <li>B0CSF6C6FW (eBook)</li>
                                    <li>B0CSM3PXJW (hardcover)</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
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