<?php
/*
This first bit sets the email address that you want the form to be submitted to.
You will need to change this value to a valid email address that you can access.
*/
$webmaster_email = "henrik.hokkanen@gmail.com";

/*
This bit sets the URLs of the supporting pages.
If you change the names of any of the pages, you will need to change the values here.
*/
$feedback_page = "feedback_form.html";
$error_page = "error_message.html";
$thankyou_page = "../index.php";

/*
This next bit loads the form field data into variables.
If you add a form field, you will need to add it here.
*/
$email_address = $_REQUEST['email_address'] ;
$comment = $_REQUEST['comment'] ;
$first_name = $_REQUEST['first_name'] ;
$last_name = $_REQUEST['last_name'];
$phone = $_REQUEST['phone'];
$address = $_REQUEST['address'];
$cc = 
"Olemme vastaan ottaneet viestinne, olemme tarvittaessa yhteydessä teihin. Tämä on automaattinen vastausviesti, älkää vastatko tähän." . "\r\n\n" . 
"Etunimi: " . $first_name . "\r\n" . 
"Sukunimi: " . $last_name  . "\r\n" .
"Sähköposti: " . $email_address . "\r\n" . 
"Puhelin numero: " . $phone  . "\r\n" . 
"Osoite: " . $address . "\r\n" . 
"Viesti: " . $comment ; 

$msg = 
"Etunimi: " . $first_name . "\r\n" . 
"Sukunimi: " . $last_name  . "\r\n" .
"Sähköposti: " . $email_address . "\r\n" . 
"Puhelin numero: " . $phone  . "\r\n" . 
"Osoite: " . $address . "\r\n" . 
"Viesti: " . $comment ; 
 



/*
The following function checks for email injection.
Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
*/
function isInjected($str) {
	$injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0A+)',
	'(%0D+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}

// If the user tries to access this script directly, redirect them to the feedback form,
if (!isset($_REQUEST['email_address'])) {
header( "Location: $feedback_page" );
}

// If the form fields are empty, redirect to the error page.
elseif (empty($first_name) || empty($email_address)) {
header( "Location: $error_page" );
}

/* 
If email injection is detected, redirect to the error page.
If you add a form field, you should add it here.
*/
elseif ( isInjected($email_address) || isInjected($first_name)  || isInjected($comments) ) {
header( "Location: $error_page" );
}

// If we passed all previous tests, send the email then redirect to the thank you page.
else {

	mail( "$webmaster_email", "Yhteydenotto kontulan huollon web-portaalista", $msg );
    mail( "$email_address", "(älävastaa tähän viestiin) Yhteydenottonne kontulan huoltoon",$cc);


	header( "Location: $thankyou_page" );
}
?>