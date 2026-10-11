<?php
//require_once('recaptchalib.php');
//initialize captcha error flag
$captcha_error = FALSE;

//turn off error reporting so that we get a simple error code return
error_reporting(0);

//$use_captcha = $qode_options_proya['use_recaptcha'];

//If captcha is being used, set the public and private key and check them
/*if ($use_captcha == "yes") {

	$publickey = $qode_options_proya['recaptcha_public_key'];
	$privatekey = $qode_options_proya['recaptcha_private_key'];

	if ($publickey == "") $publickey = "6Ld5VOASAAAAABUGCt9ZaNuw3IF-BjUFLujP6C8L";
	if ($privatekey == "") $privatekey = "6Ld5VOASAAAAAKQdKVcxZ321VM6lkhBsoT6lXe9Z";

	$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

	//If the captcha check failed, set the error flag
	if (!$resp->is_valid) $captcha_error = TRUE;

}
*/	
//If no captcha error was detected attempt to send email	
if (!$captcha_error) {

	//Check for required fields to prevent direct calls to this page
	if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["message"]))
	{
		echo "error";
	}
	else
	{
		$email_to = "contact@thurdy.com";
		$email_from = "contact@thurdy.com";
		$subject = "Contact From Thurdy.com website";
	
		$text = "Name: " . $_POST["name"] . "\n";
		$text .= "Email: " . $_POST["email"] . "\n";
		$text .= "Message: " . $_POST["message"];
	
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/plain; charset=utf-8" . "\r\n";
		$headers .= "From: '" . $_POST['name'] . "' <".$email_from."> " . "\r\n";
		
		$result = mail($email_to, $subject, $text, $headers);
	
		//Email Failure
		if(!$result) {
			echo "email-failure";
		}
		else
		{
			//Success
			echo "success";	
		}
	}
}
else {
	//Recaptcha Failure
	echo ("recaptcha-failure");
}
?>