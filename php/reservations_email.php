<?php
/* All mail will be sent to the $to account. */
$to = "jerry.foster@freeportkayakrentals.com";

/* These are the 3 different html pages our script will redirect to. */
$reservations_page = "../html/reservations.html";
$error_page = "../html/reservations_error.html";
$thank_you_page = "../html/reservations_thank_you.html";

/* This will be the email's subject when it is sent. */
$subject = "FKR Reservations";

/* Collect information from form and store in variables. */
$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$email_address = $_REQUEST['email_address'];
$phone_number = $_REQUEST['phone_number'];
$paddler_count = $_REQUEST['paddler_count'];
$date = $_REQUEST['date'];
$start_time = $_REQUEST['start_time'];
$end_time = $_REQUEST['end_time'];

/*
 * Check if form has been filled out.
 * If not, redirect to $error_page.
 */
if (empty($first_name) || empty($last_name) || empty($email_address)
		|| empty($phone_number) || empty($paddler_count)
		| empty($date) || empty($start_time) || empty($end_time)) {
	header('Location: '.$error_page);
	die();
}

/*
 * Get boat specifications.
 */
$boats = "";
if (isset($_REQUEST['kayaks'])) {
	$boats .= "kayaks ";
}
if (isset($_REQUEST['SUPs'])) {
	$boats .= "SUPs";
}

/* This will be the body of the email sent. */
$body = "Name: " . $first_name . " " . $last_name;
$body .= "\n" . "Email: " . $email_address;
$body .= "\n" . "Phone: " . $phone_number;
$body .= "\n" . "Number of paddlers: " . $paddler_count;
$body .= "\n" . "Boats: " . $boats;
$body .= "\n" . "Date: " . $date;
$body .= "\n" . "Time frame: " . $start_time . " to " . $end_time;

/* Add From: header */
$headers = "From:" . $email_address;


/* Send email */
mail($to, $subject, $body, $headers);

/* Redirect to $thank_you_page */
header('Location: '.$thank_you_page);
die();
?>