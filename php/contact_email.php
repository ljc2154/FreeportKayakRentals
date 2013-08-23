<?php
/* All mail will be sent to the $to account. */
$to = "jerry.foster@freeportkayakrentals.com";

/* These are the 3 different html pages our script will redirect to. */
$contact_page = "../html/contact.html";
$error_page = "../html/contact_error.html";
$thank_you_page = "../html/contact_thank_you.html";

/* This will be the email's subject when it is sent. */
$subject = "FKR Contact";

/* Collect information from form and store in variables. */
$name = $_REQUEST['name'];
$email_address = $_REQUEST['email_address'];
$phone_number = $_REQUEST['phone_number'];
$message = $_REQUEST['message'];

/*
 * Check if form has been filled out.
 * If not, redirect to $error_page.
 */
if (empty($name) || empty($email_address) || empty($phone_number)
	 || empty($message)) {
	header('Location: '.$error_page);
	die();
}


/* This will be the body of the email sent. */
$body = "Name: " . $name;
$body .= "\n" . "Email: " . $email_address;
$body .= "\n" . "Phone: " . $phone_number;
$body .= "\n" . "Message: " . $message;

/* Add From: header */
$headers = "From:" . $email_address;


/* Send email */
mail($to, $subject, $body, $headers);

/* Redirect to $thank_you_page */
header('Location: '.$thank_you_page);
die();
?>