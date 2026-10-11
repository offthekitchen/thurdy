<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
//This include defines the relative path to the root directory from this sub-directory
include_once("root.inc.php");

//include web site settings
include_once($ROOT . "/includes/WebsiteSettings.php");

//include Thurdy settings
include_once(SETTINGS_DIR . "/ThurdySettings.php");

//include common functions
include_once (INCLUDE_DIR . "/commonFunctions.php");

$sPageTitle = "Speak to me!";
$sPageDescription = "Advice, criticism, question, unbearable filibuster, stream of conscience poetry, gobbledigook?  I wanna hear it all.";
$sPageName = "Contact";
$sPageLogo = "logo-contact.png";
$fb_image = "fb_thurdy_contact.jpg";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once(INCLUDE_DIR . "/Head.php");
?>
<script type="text/javascript">
	$(document).ready(function($j) {
		//Function for contact form submission
		$('form#Contact').submit(function() {
			var hasError = false;
			//check each required field
			/*$('form#Contact .requiredField').each(function() {
			//The error message div for each input is the input ID plus "Error"
			var errorField = $(this).attr('id') + "Error";
            if(jQuery.trim($(this).val()) == '' || jQuery.trim($(this).val()) == jQuery.trim($(this).attr('placeholder'))){
				$("div#" + errorField).html("You gotta type something for this one.");
                hasError = true;
	         } 
			 else
			 {
			 	//Clear any previous error message for the field
				$("div#" + errorField).empty();
			 }
         }); */

			//Check any field that should be an email
			$('form#Contact .email-field').each(function() {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
				if (!emailReg.test(jQuery.trim($(this).val()))) {
					jQuery("div#formMessage").html("<div class='contact-error'> That's not a real email address!</div>");
					hasError = true;
				}
			});

			if (!hasError) {
				captcha_response = grecaptcha.getResponse();
				//alert("Captcha Response: " + captcha_response);
				if (captcha_response) {
					//challengeField = $("input#recaptcha_challenge_field").val();
					//responseField = $("input#recaptcha_response_field").val();
					name = $("input#txtName").val();
					email = $("input#txtEmail").val();
					message = $("textarea#txtMessage").val();
					var form_post_data = "";

					//Make AJAX call to attempt email send
					var html = $.ajax({
						type: "POST",
						url: "./includes/ajax_mail.php",
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
						$("div#formMessage").html("<div class='contact-success'>Got it...  Thanks.</div>");
						//$("form#Contact").hide();
						//$.post($(this).attr('action'),formInput);
						hasError = false;
						break;

					case "recaptcha-failure":

						$("div#formMessage").html("<div class='contact-error'> Verify that you're not a robot using the Captcha box above</a></div>");
						hasError = true;
						break;

					case "email-failure":

						$("div#formMessage").html("<div class='contact-error'> Hmmmm.  I hade trouble sending the email... Try <a href='mailto:info@thurdy.com'>info@thurdy.com</a></div>");
						hasError = true;
						break;

					default:
						$("div#formMessage").html("<div class='contact-error'> Ooops.  Something went wrong in my code.  I couldn't send the email.<br><a href='mailto:info@thurdy.com'>info@thurdy.com</a></div><div>" + html + "</div>");
						hasError = true;
						break;

				}

				if (hasError) {
					return false;
				} else {
					$('#Contact').trigger("reset");
					return false;
				}

			} else {
				//Validation failed, so don't re-post form
				return false;
			}

		});

	});
</script>

<body>
	<div class="container">
		<div class="row">
			<?php include_once(INCLUDE_DIR . "/Header.php"); ?>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-9">
				<form id="Contact" action="" method="post">
					<fieldset>
						<!-- Text input-->
						<div class="form-group row">
							<label class="col-md-2 control-label" for="txtName">Who are you?</label>
							<div class="col-md-10">
								<input id="txtName" name="txtName" type="text" placeholder="Bob Thurdyfan" class="form-control input-md" required="" value="<?php echo $_POST['txtName']; ?>">
							</div>
						</div>

						<!-- Text input-->
						<div class="form-group row">
							<label class="col-md-2 control-label" for="txtEmail">What's your email?</label>
							<div class="col-md-10">
								<input id="txtEmail" name="txtEmail" type="text" placeholder="bob@ilovethurdy.com" class="form-control input-md email-field" required="" value="<?php echo $_POST['txtEmail']; ?>">
							</div>
						</div>

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
							<div id="formMessage"></div>
						</div>
						<!-- Submit Button -->
						<div class="form-group row">
							<div class="formField">
								<input class="formSubmitButton" type="submit" name="btnSubmit" value="Make Contact" />
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