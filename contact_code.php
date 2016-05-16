<?php
require_once 'core/init.php';
$results = array();

//Simple mail function with HTML header
function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: ' . $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}

//Retrieve form data. 
//GET - user submitted data using AJAX
//POST - in case user does not support javascript, we'll use POST instead
$name = ($_GET['name']) ? $_GET['name'] : $_POST['name'];
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
$phone = ($_GET['phone']) ?$_GET['phone'] : $_POST['phone'];
$feedback = ($_GET['feedback']) ?$_GET['feedback'] : $_POST['feedback'];

//flag to indicate which method it uses. If POST set it to 1

if ($_POST) $post=1;

//Simple server side validation for POST data, of course, you should validate the email
if (!$name) $errors[count($errors)] = 'Please enter your name.';
	else  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $errors[count($errors)] = "Only letters and white space allowed";
     }
if (!$email) $errors[count($errors)] = 'Please enter your email.';
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[count($errors)] = "Email format is not valid.";
     }
if (!$phone) $errors[count($errors)] = 'Please enter your phone number.';
    else{
    	if(strlen($phone)>12 && strlen($phone)<10)
    		$errors[count($errors)] = "Phone number is of invalid length.";
    } 
if (!$feedback) $errors[count($errors)] = 'Please enter a message.'; 
//if the errors array is empty, send the mail
if (!$errors) {

	//recipient - replace your email here
	$to = 'lovepreet.singh010194@gmail.com';	
	//sender - from the form
	$from = $name . ' <' . $email . '>';
	
	//subject and the html message
	$subject = 'Message from ' . $name;	
	$message = 'Name: ' . $name . '<br/><br/>
		       Email: ' . $email . '<br/><br/>	
		       Phone: ' . $phone . '<br/><br/>	
		       Message: ' . nl2br($feedback) . '<br/>';

	//send the mail
	$result = sendmail($to, $subject, $message, $from);
	
	//if POST was used, display the message straight away
	if ($_POST) {
		if ($result) {
			Session::flash('cont','<div class="alert alert-success" role="alert">Thank you! We have received your message !</div>');
			Redirect::to('contact1.php');
		}

			else { 

			Session::flash('cont','<div class="alert alert-warning" role="alert">Sorry, unexpected error. Please try again later ! </div>');
			Redirect::to('contact1.php');
		}
	//else if GET was used, return the boolean value so that 
	//ajax script can react accordingly
	//1 means success, 0 means failed
	} else {
		echo $result;	
	}

//if the errors array has values
} else {
	//display the errors message
	$return_string = '';
	for ($i=0; $i<count($errors); $i++) $return_string .= '<div class="alert alert-warning" role="alert">' . $errors[$i] . '</div>';
	
	Session::flash('cont',$return_string);
	Redirect::to('contact1.php');
}


?>