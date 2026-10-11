<?php

//This include defines the relative path to the root directory from this sub-directory
include_once ("root.inc.php");

//inlcude web site settings
include_once ($ROOT . "/includes/WebsiteSettings.php");

//include Drop Class		
include_once (CLASS_DIR . "/class_ThurdyDrop.php");

$oDrops = new ThurdyDrop();

if(!$oDrops->getThurdyDrop())
{
	//ERROR
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$sPageName="Where Did You Find Me?";
include_once (INCLUDE_DIR . "/Head.php");
?>
<body >
<?php include_once (INCLUDE_DIR . "/Header.php"); ?>
<main role="main">
	<div class="col-xs-12 about">
		<p>Here are some of the places folks have dropped Thurdy CDs.
		</p>
	</div>		
	<?php
	foreach($oDrops->aDropRecords as $oDrop)
	{
		echo "<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">";
		echo "<figure class=\"drop-image\">";
		echo "  <IMG SRC=" . IMG_DIR  . "/{$oDrop->sDropImage} />";
		echo "<figcaption>{$oDrop->sDropLocation}<br>";
		if (!empty($oDrop->sDropDesc)) {
			echo "({$oDrop->sDropDesc})</figcaption>";
			}		
		echo "</figure>";
		echo "</div>";
	}
	?>	
</main>
<?php
include_once (INCLUDE_DIR . "/Footer.php");
?>
</body>
</html>
