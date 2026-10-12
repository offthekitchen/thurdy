<?php

//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//include web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//include Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once(INCLUDE_DIR . "/commonFunctions.php");

include_once(DATALAYER_DIR . "/Song.php");
include_once(DATALAYER_DIR . "/SongRepository.php");

$nSongId = null;
if (isset($_REQUEST['SONG-ID']) && $_REQUEST['SONG-ID'] != "") {
	$nSongId = (int) preg_replace("/[^0-9]/", "", $_REQUEST['SONG-ID']);
}

$nCDID = null;
if (isset($_REQUEST['CD-ID']) && $_REQUEST['CD-ID'] != "") {
	$nCDID = (int) preg_replace("/[^0-9]/", "", $_REQUEST['CD-ID']);
}

$criteria = [
	'artistId' => THURDY_ARTIST_ID,
	'orderBy' => 'track',
];
if ($nSongId > 0) {
	$criteria['id'] = $nSongId;
} elseif ($nCDID > 0) {
	$criteria['cdId'] = $nCDID;
}

$songs = (new \Datalayer\SongRepository())->find($criteria);
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageLogo = "header-logo-200.png";
if (count($songs) == 1) {
	$oThisSong = $songs[0];
	$sPageTitle = "Lyrics";
	$sPageName = $oThisSong->description;
	$sSongImage = $oThisSong->image;
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
					if (count($songs) == 1) {
						$oThisSong = $songs[0];
						echo "<header class=\"lyrics-title\"><a href='{$ROOT}/Song.php?song-id={$oThisSong->id}'>";
						echo "$oThisSong->name";
						echo "</a></header>";

						if (!empty($oThisSong->lyricsHtml) && file_exists($ROOT . "/lyrics/{$oThisSong->lyricsHtml}")) {
							echo "<section class='lyrics-contents'>";
							try {
								include_once($ROOT . "/lyrics/{$oThisSong->lyricsHtml}");
							} catch (Exception $e) {
								error_log("lyrics.php - ERROR INCLUDING LYRICS FILE ({$oThisSong->lyricsHtml}): " . $e->getMessage());
								echo "ERROR GETTING LYRICS FILE {$oThisSong->lyricsHtml}";
							} finally {
								echo "</section>";
							}
						} else {
							echo "<section class='lyrics-contents'>";
							echo "NO LYRICS";
							echo "</section>";
						}
					} elseif (count($songs) > 1) {
						echo "<dl class=\"lyrics-contents\">";
						foreach ($songs as $oSong) {
							echo "<div class='song'>";
							echo "<dt class='song-title'>";
							echo "<p><a href='{$ROOT}/Lyrics.php?SONG-ID={$oSong->id}'>";
							echo "{$oSong->name}";
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
