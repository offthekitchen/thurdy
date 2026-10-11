<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php 
if(empty($fb_image))
{
	$fb_image = "fb_thurdy_home.jpg";
}

if(empty($sPageDescription))
{
	$sPageDescription = "Acousticlectic Genrephobic Experimentaotic Sound";
}


if(empty($sPageTitle))
{
	$sPageTitle = "Thurdy";
}


if(empty($sPageName))
{
	$sPageName = "Thurdy";
}

?>
<head>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<!--SEO Meta Data-->
<meta name="keywords" content="Thurdy, 30, Weird, Music, Experimental, Art <?php echo $sPageTitle; ?>">
<meta name="description" content="Thurdy - <?php echo $sPageTitle; ?>">
<meta name="title" content="Thurdy - <?php echo $sPageTitle; ?>" />
<meta name="author" content="Thurdy" />
<meta name="copyright" content="Thurdy" />
<meta name="robots" content="index,follow"/>

<!--Social Media Data -->
<meta property="og:type" content="article" />
<meta property="og:image" content="https://www.thurdy.com/images/<?php echo $fb_image; ?>" />
<meta property="og:width" content="1200" />
<meta property="og:height" content="630" />
<meta property="og:description" content="<?php echo $sPageDescription; ?>" />
<meta property="og:title" content="Thurdy - <?php echo $sPageTitle; ?>" />
<meta property="og:site_name" content="Travel Bugs Music" />
<meta property="og:url" content="https://<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" />

<link rel="apple-touch-icon" href="touch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<LINK REL="SHORTCUT ICON" HREF="https://www.thurdy.com/THURDY.ICO">
<link rel="image_src" href="https://www.thurdy.com/images/<?php echo $fb_image; ?>" />

<script type="text/javascript" src="./javascript/jquery-1.11.3.min.js"></script>

<!-- Bootstrap -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Freckle+Face" rel="stylesheet">

<!-- Other Fonts -->
<link rel="stylesheet" href="./css/eliottSix.css" type="text/css" charset="utf-8" />

<link rel="stylesheet" href="<?php echo CSS_DIR; ?>/thurdy.css">

<title>THURDY- <?php echo $sPageTitle; ?></title>
<!-- Adds HTML5 element support for browsers older than IE9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![end if]-->
</head>
