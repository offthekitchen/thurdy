<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="apple-touch-icon" href="http://www.thurdy.com/iPhone-Icon-Thurdy-60x60.png" />
<link rel="apple-touch-icon" sizes="76x76" href="http://www.thurdy.com/iPhone-Icon-Thurdy-76x76.png" />
<link rel="apple-touch-icon" sizes="120x120" href="http://www.thurdy.com/iPhone-Icon-Thurdy-120x120.png" />
<link rel="apple-touch-icon" sizes="152x152" href="http://www.thurdy.com/iPhone-Icon-Thurdy-152x152.png" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<LINK REL="SHORTCUT ICON" HREF="http://www.thurdy.com/THURDY.ICO">
<link rel="image_src" href="http://www.thurdy.com/images/30FB.gif" />
<meta name="keywords" content="Thurdy, 30">
<meta name="description" content="Thurdy Tracks">
<meta name="title" content="Thurdy Tracks" />
<meta property="og:image" content="http://www.thurdy.com/images/30FB.gif" />
<meta property="og:description" content="Thurdy Tracks" />
<meta property="og:title" content="Thurdy Tracks" />
<title>THURDY - Tracks</title>

</head>
<body >
<?php
//This include defines the relative path to the root directory from this sub-directory
include_once ("root.inc.php");

//inlcude web site settings
include_once ($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once (SETTINGS_DIR . "/ThurdySettings.php");

include_once (DATALAYER_DIR . "/ThurdySong.php");
include_once (DATALAYER_DIR . "/ThurdySongRepository.php");

$songs = [];
try {
	$songs = (new \Datalayer\ThurdySongRepository())->find(['orderBy' => 'SONG_NUMBER']);
} catch (Throwable $e) {
	error_log('tracks.php - ' . $e->getMessage());
	echo "CANT GET TRACKS";
}
?>
<BR />
<BR />
<TABLE align="center">
	<TR>
	<TD>
<?php 
	
	foreach($songs as $oSong)
	{
		echo $oSong->songNumber . " - " . $oSong->songTitle . "<BR>";
	}
?>

		</TD>
	</TR>
</TABLE>
</body>
</html>
