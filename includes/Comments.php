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
include_once (DATALAYER_DIR . "/ThurdyComment.php");
include_once (DATALAYER_DIR . "/ThurdyCommentRepository.php");

$sCommentText = NULL;
$commentRepo = new \Datalayer\ThurdyCommentRepository();

//Update Comment
if (isset($_POST["btnComment"])) 
{
	$oNewComment = new \Datalayer\ThurdyComment();
	$oNewComment->comment = $_POST['txtComment'];
	$oNewComment->approved = false;
	$oNewComment->commentDate = date('Y-m-d');
	if(!$commentRepo->insert($oNewComment))
	{
		$sCommentText = "Problem saving comment.";
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
$criteria = ['approved' => true];
if($nNumberOfComments > 0) {
	$criteria['limit'] = $nNumberOfComments;
}
$approvedComments = $commentRepo->find($criteria);
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
	if(count($approvedComments) > 0)
	{
		foreach($approvedComments as $oComment)
		{
			echo "<section class=\"comment row\">";
			echo "<section class=\"comment-gutter hidden-xs col-sm-1 col-md-1 col-lg-1\"></section>";
			echo "<section class=\"comment-date col-xs-12 col-sm-2 col-md-2 col-lg-2\"><time datetime=\"{$oComment->commentDate}\">{$oComment->commentDate}</time>:</section>";
			echo "<section class=\"comment-text col-xs-12 col-sm-9 col-md-9 col-lg-9\">$oComment->comment";
			if (!empty($oComment->answer))
			{
			  echo "<aside class=\"comment-answer\">Answer: <span class=\"answer-text\">{$oComment->answer}</span>";
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
