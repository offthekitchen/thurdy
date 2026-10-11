<script type="text/javascript">
<!--
function validate_form ( )
{
    bValid = true;
	sErrorMessage = "";

	//No Comment
    if (!document.Thurdy.txtComment.value.replace(/\s+/g, ''))
    {
        sErrorMessage += "You didn't type in a comment.\n";
        bValid = false;
    }

	//If any errors, alert
	if (!bValid)
	{
		alert(sErrorMessage);
	}

    return bValid;
}
//-->
</script>
<?php 
//include COMMENT Class		
include_once (CLASS_DIR . "/class_ThurdyComment.php");

$sCommentText = NULL;

//Update Comment
if (isset($_POST["btnComment"])) 
{
	$oNewComment = new ThurdyComment();
	$oNewComment->sComment = $_POST['txtComment'];
	$oNewComment->bApproved = 0;
	$oNewComment->dtCommentDate = date('Y-m-d');
	if(!$oNewComment->insertComment())
	{
		$sCommentText =  $oNewComment->sErrorMessage;
	}
	else
	{
		$to = "info@thurdy.com";
 		$subject = "A Comment was added to the Thurdy Page! ";
 		$message = "Comment Date: " . date("m/d/y");
 		$from = "info@thurdy.com";
		$headers = "From:" . $from;
		if (mail($to,$subject,$message,$headers))
		{
			$sCommentText = "Comment has been submitted for approval";
		}
		else
		{
			$sCommentText = "Error: Problem with comment submission.  Email info@thurdy.com"; 
		}
	}
}

//Get all Comments
$oApprovedComments = new ThurdyComment();
$oApprovedComments->bApproved = TRUE;

if($nNumberOfComments > 0) {
	$oApprovedComments->nNumberOfComments = $nNumberOfComments;
}
if(!$oApprovedComments->getThurdyComment())
{
	echo "PROBLEM";
}
?>

<div class="row">
	<section class="comment-gutter hidden-xs col-sm-1 col-md-1 col-lg-1"> </section>
	<div name="Thurdy" id="Thurdy" class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
	  <div class="center-contents">
		  <a href="<?php echo $ROOT; ?>/Comment.php">
		  <div id="comment-button" class="button">Leave a Comment</div>
		  </a>
	  </div>
	</div>
	<section class="comment-gutter hidden-xs col-sm-1 col-md-1 col-lg-1"> </section>
</div>
<article id="comments">
	<?php
	if(sizeof($oApprovedComments->aCommentRecords) > 0)
	{
		foreach($oApprovedComments->aCommentRecords as $oComment)
		{
			echo "<section class=\"comment row\">";
			echo "<section class=\"comment-gutter hidden-xs col-sm-1 col-md-1 col-lg-1\"></section>";
			echo "<section class=\"comment-date col-xs-12 col-sm-2 col-md-2 col-lg-2\"><time datetime=\"{$oComment->dtCommentDate}\">{$oComment->dtCommentDate}</time>:</section>";
			echo "<section class=\"comment-text col-xs-12 col-sm-9 col-md-9 col-lg-9\">$oComment->sComment";
			if (!empty($oComment->sAnswer))
			{
			  echo "<aside class=\"comment-answer\">Answer: <span class=\"answer-text\">{$oComment->sAnswer}</span>";
			}
			echo "</section>";
			echo "</section>";
		}
		
		if($nNumberOfComments > 0) {
			echo "<div class=\"comment row\">";
			echo "<div class=\"comment-gutter hidden-xs col-sm-1 col-md-1 col-lg-1\"></div>";
			echo "<div class=\"more-info col-xs-12\">. . .";
			echo "</div>";
			echo "</div>";
			
			echo "<div class=\"comment row\">";
			echo "<div class=\"comment-gutter hidden-xs col-sm-1 col-md-1 col-lg-1\"></div>";
			echo "<div class=\"more-info col-xs-12\"><A HREF=\"" . $ROOT . "/Chatter.php\" title=\"Music\">See All Comments</A>";
			echo "</div>";
			echo "</div>";
		}
	}
	?>
</article>

