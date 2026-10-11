<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//inlcude web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//inlcude Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once (INCLUDE_DIR . "/commonFunctions.php");

$sPageTitle = "Whaddaya Say?";
$sPageDescription = "Advice, criticism, question, unbearable filibuster, stream of conscience poetry, gobbledigook?  I wanna hear it all.";
$sPageName = "Comment";
$sPageLogo = "logo-contact.png";
$fb_image = "fb_thurdy_contact.jpg";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once(INCLUDE_DIR . "/Head.php");
?>
<script type="text/javascript">
	//$(document).ready(function($j) {
		//Function for  comment form submission
		//$('form#Comment').submit(function() {

		function validate_form() {


console.log("turning on spinner")
			document.getElementById("spinner").style.visibility = "visible";
console.log("spinner on")
			var hasError = false;
			var debug = true;
			
			//Check any field that should be an email
		/* 	$('form#Comment .email-field').each(function() {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
				if (!emailReg.test(jQuery.trim($(this).val()))) {
					jQuery("div#formMessage").html("<div class='contact-error'> That's not a real email address!</div>");
					hasError = true;
				}
			}); */
			if (!hasError) {
				captcha_response = grecaptcha.getResponse();
				//alert("Captcha Response: " + captcha_response);
				if (captcha_response || debug) {
					//challengeField = $("input#recaptcha_challenge_field").val();
					//responseField = $("input#recaptcha_response_field").val();
					name = 'anonymous comment';
					email = 'info@thurdy.com';
					message = $("textarea#txtMessage").val();
					var form_post_data = "";

					//Make AJAX call to attempt email send
					var html = $.ajax({
						type: "POST",
						url: "./includes/add_comment.php",
						data: "name=" + name + "&email=" + email + "&message=" + message + "&g-recaptcha-response=" + captcha_response,
						async: false
					}).responseText;
				} else {

					html = "recaptcha-failure";
				}

				//Based on the string returned from the AJAX call, display a message
				switch (html) {

					case "success":

						var formInput = $(this).serialize();
						//$("div#formMessage").html("<div class='contact-success'>Got it...  Thanks.</div>");
						hasError = false;
						break;

					case "recaptcha-failure":

						$("div#formMessage").html("<div class='contact-error'> Verify that you're not a robot using the Captcha box above</a></div>");
						hasError = true;
						break;

					case "email-failure":

						$("div#formMessage").html("<div class='contact-error'> Hmmmm.  I hade trouble sending the email... Try <a href='mailto:contact@thurdy.com'>contact@thurdy.com</a></div>");
						hasError = true;
						break;
						
					case "insert-error":

						$("div#formMessage").html("<div class='contact-error'>I think that the email</div>");
						hasError = true;
						break;

					default:
						$("div#formMessage").html("<div class='contact-error'> Ooops.  Something went wrong in my code.  I couldn't send the email.<br><a href='mailto:contact@thurdy.com'>contact@thurdy.com</a></div>" + html);
						hasError = true;
						break;

				}

				if (hasError) {
					turnOffSpinner()
					return false;
				} else {
					//$('#Comment').trigger("reset");
					return true;
				}


			} else {
				//Validation failed, so don't re-post form
				turnOffSpinner()
				return false;
			}

		};

		function turnOffSpinner() {
			console.log("turning off spinner")
			document.getElementById("spinner").style.visibility = "hidden";
		};


	//});
</script>
<?php 
//include COMMENT Class		
include_once (CLASS_DIR . "/class_ThurdyComment.php");

$sPostError = NULL;
$bPostSuccess = false;

//Update Comment
if (isset($_POST["btnSubmit"])) 
{
	}
?>
<body>
	<div id="spinner">
		<img src="<?php echo IMG_DIR; ?>/spinner.gif">
	</div>
	<div class="container">

		<div class="row">
			<?php include_once(INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-9">
				<form id="Comment" action="" method="post">
					<fieldset>
						<input type="hidden" id="hdnPostStatus" name="hdnPostStatus" value="<?php $_POST['hdnPostStatus']; ?>" />
						<!-- Textarea -->
						<div class="form-group row">
							<label class="col-md-2 control-label" for="txtMessage">Whatcha wanna say?</label>
							<div class="col-md-10">
								<textarea class="form-control" id="txtMessage" name="txtMessage" value="<?php $_POST['txtMessage']; ?>" placeholder="You guys are the greatest!"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-xs-12 col-md-2 control-label">Verify:</label>
							<div id="formRecaptcha" class="col-xs-12 col-md-10">
								<div class="g-recaptcha" data-sitekey="6LeAfYwdAAAAAKLwRDhqV8t9JRjy-mmYMFd_lD8j"></div>
							</div>
							<div id="formMessage">
							<?php 
							
							if ($bPostSuccess) {

								echo "<div class='contact-success'>GOT IT ...THANKS!</div>";
							}
							else {
								echo "<div class='contact-error'>{$sPostError}</div>";
							}
							?>
							</div>
						</div>
						<!-- Submit Button -->
						<div class="form-group row">
							<div class="formField">
								<input class="formSubmitButton" type="submit" name="btnSubmit" value="Comment" onclick="javascript: return validate_form()"/>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<div class="row">
			<?php
			include_once(INCLUDE_DIR . "/Footer.php");
			?>
		</div>
	</div>
</body>
<!--Recaptcha Javascript -->
<script src='https://www.google.com/recaptcha/api.js'></script>

</html>
<style>
	#spinner{

	display: flex;
	visibility: hidden;
  	justify-content: center;
	align-items: center;
    position:fixed;
    padding:0;
    margin:0;

    top:0;
    left:0;

    width: 100%;
    height: 100%;
    background:rgba(255,255,255,0.5);
	}

	#spinner img {
		width: 200px;
		height: 200px;
	}
</style>