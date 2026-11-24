<?php
//Don't Display Notice messages from PHP Server
error_reporting(E_ALL ^ E_NOTICE);

include_once("root.inc.php");
//include web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//include Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once (INCLUDE_DIR . "/commonFunctions.php");
$sPageTitle = "Copyright";
$sPageName = "Copyright";
$sPageDescription = "Copyright notice for Colorado Sessions. Original music, recordings, lyrics, and artwork may not be copied or used to train AI systems without written permission.";
$sCanonicalUrl = "https://www.coloradosessions.com/copyright.php";
$sOgImageAlt = "Colorado Sessions copyright notice";
$sPageLogo = "logo-contact.png";
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once("./includes/Head.php");
?>

<body data-page="copyright">
    <a class="skip-link" href="#main-content">Skip to main content</a>
    <?php
    include_once("./includes/Header.php");
    ?>
    <div class="container">
        <main id="main-content">
            <div class="row home-section">
                <div class="col-12 col-lg-8 mx-auto">
                    <h1>Copyright</h1>
                    <p>&copy; <?php echo date("Y"); ?> Colorado Sessions. All rights reserved.</p>
                    <p>All original works published on this website are owned by Colorado Sessions unless a page says otherwise. This includes musical compositions, sound recordings, vocal performances, lyrics, visual art, graphic designs, illustrations, and photography.</p>
                    <p>You may view these pages and listen to the music for your own personal, non-commercial use. Copying, downloading for reuse, reproducing, distributing, publicly performing, adapting, or otherwise using this material requires prior written permission, except for uses the law already allows.</p>
                    <p>Permission requests: <a href="mailto:steve@offthekitchen.com">steve@offthekitchen.com</a>.</p>
                    <p>Prohibition on AI Training &amp; Voice/Style Cloning: All original works on this site&mdash;including musical compositions, sound recordings, vocal performances, lyrics, visual art, graphic designs, and photography&mdash;are exclusively owned by Colorado Sessions. Automated scraping, text and data mining (TDM), or any use of these works to train, validate, or operate generative AI, voice-cloning, or machine learning systems is strictly prohibited. All rights to license these works for AI or machine learning purposes are expressly reserved. (Note: Standard search engine indexing of performance schedules and public event listings is permitted.)</p>
                </div>
            </div>
        </main>
    </div>

    <?php
    include_once("./includes/Footer.php");
    ?>

</body>

</html>
