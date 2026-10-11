<?php

//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//include web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//include Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once(INCLUDE_DIR . "/commonFunctions.php");

//include Comment Class		
include_once(CLASS_DIR . "/class_Song.php");

//include Error Log Class
include_once(CLASS_DIR . "/class_ErrorLog.php");

if (isset($_REQUEST['SONG-ID']) && $_REQUEST['SONG-ID'] != "") {
	$nSongId = preg_replace("/[^0-9.]/", "", $_REQUEST['SONG-ID']);
} else {
	$nSongId = null;
}

//Get the CD ID from the query string parms
if (isset($_REQUEST['CD-ID']) && $_REQUEST['CD-ID'] != "") {
	$nCDID = preg_replace("/[^0-9.]/", "", $_REQUEST['CD-ID']);
} else {
	$nCDID = null;
}

$oThurdySongs = new Song();
$oThurdySongs->nArtistID = THURDY_ARTIST_ID;
if ($nSongId > 0) {
	$oThurdySongs->nSongID = $nSongId;
}
if ($nCDID > 0) {
	$oThurdySongs->nCDID = $nCDID;
}
$oThurdySongs->sOrderBy = "SONG_NUMBER";

if (!$oThurdySongs->getSong()) {
	$error = new ErrorLog('Lyrics.php', 'getSong()', 'Error getting Songs', $oThurdySongs->nCDID, 'CD');
	$error->writeErrorLog();
	$oThurdySongs->sSongTitle = "Not Found";
	$oThurdySongs->sSongDescription = "Hmmm... problem getting that one.";
}
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageLogo = "header-logo-200.png";
if (sizeof($oThurdySongs->aSongRecords) == 1) {
	$oThisSong = $oThurdySongs->aSongRecords[0];
	$sPageTitle = "Lyrics";
	$sPageName = $oThisSong->sSongDescription;
	$sSongImage = $oThisSong->sSongImage;
} else {
	$sPageTitle = "Lyrics";
	$sPageName = "Words I Wrote";
}
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
					<?php
					if (sizeof($oThurdySongs->aSongRecords) == 1) {
						echo "<header class=\"lyrics-title\"><a href='{$ROOT}/Song.php?song-id={$oThisSong->nSongID}'>";
						echo "$oThisSong->sSongName";
						echo "</a></header>";

						if (!empty($oThisSong->sLyricsHTML) && file_exists($ROOT . "/lyrics/{$oThisSong->sLyricsHTML}")) {
							echo "<section class='lyrics-contents'>";
							try {
								include_once($ROOT . "/lyrics/{$oThisSong->sLyricsHTML}");
							} catch (Exception $e) {
								error_log("lyrics.php - ERROR INCLUDING LYRICS FILE ({$oThisSong->sLyricsHTML}): " . $e->getMessage());
								echo "ERROR GETTING LYRICS FILE {$oThisSong->sLyricsHTML}";
							} finally {
								echo "</section>";
							}
						} else {
							echo "<section class='lyrics-contents'>";
							echo "NO LYRICS";
							echo "</section>";
						}
					} elseif (sizeof($oThurdySongs->aSongRecords) > 1) {
						echo "<dl class=\"lyrics-contents\">";
						foreach ($oThurdySongs->aSongRecords as $oSong) {
							echo "<div class='song'>";
							echo "<dt class='song-title'>";
							echo "<p><a href='{$ROOT}/Lyrics.php?SONG-ID={$oSong->nSongID}'>";
							echo "{$oSong->sSongName}";
							echo "</a></p>";
							echo "</dt>";
							echo "</div>";
						}
						echo "</dl>";
					} else {
						echo "<header class=\"lyrics-title\">";
						echo "NO SONG FOUND";
						echo "</header>";
					}
					?>
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