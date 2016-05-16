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

if(Input::exists()) {
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
       $errors[count($errors)] = "Only letters and white space allowed in name";
     }
if (!$email) $errors[count($errors)] = 'Please enter your email.';
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[count($errors)] = "Email format is not valid.";
     }
if (!$phone) $errors[count($errors)] = 'Please enter your phone number.';
    else{
    	if(strlen($phone>12) && strlen($phone)<10)
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
			Session::flash('cont','<div class="alert alert-success" role="alert">Thank you! We have received your message ! </div>');
			Redirect::to('contact.php');
		}
			else { 

			Session::flash('cont','<div class="alert alert-warning" role="alert">Sorry, unexpected error. Please try again later ! </div>');
		
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
	for ($i=0; $i<count($errors); $i++) $results[] = '<div class="alert alert-warning" role="alert">' . $errors[$i] . '</div>';
	
}

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>I-way Trans</title>
		<link rel="shortcut icon" type="image/x-icon" href="images/icons/i-waytrans.png">


		<!-- Google Font -->
		<link href="fonts/css" rel="stylesheet" type="text/css">
		<link href="fonts/css(1)" rel="stylesheet" type="text/css">


		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/dropdown.css">
		<link rel="stylesheet" href="css/global.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/responsive.css">


		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/layout.css">
		
		


		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	





</head>
	
  <body>
		
		<?php require_once('header.php'); ?>
		<!-- banner -->
	<div class="banner-1">
		
	</div>
<!-- banner -->
<!-- contact -->
	<div class="contact">
			<div class="container">
				<h3>Contact</h3>

				<?php
					if(Session::exists('cont')){
							echo  Session::flash('cont') ;
						}
					else{
					foreach ($results as $statement) {
						 echo '<div>' .  $statement . '</div>';
						}
					}


						
				?>
				<!--div class=" map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.91163207516!2d2.3470599!3d48.85885894999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis%2C+France!5e0!3m2!1sen!2sin!4v1436340519910" allowfullscreen=""></iframe>				
				</div-->
				<div class="contact-grids">
					<div class="contact-form">
							
							<form  method="post" action="">
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<input name="name" id="name" type="text" value="<?php echo escape(Input::get('name'));?>" autocomplete="off" placeholder="Name">
									</div>
									<div class="col-md-4 in-contact">
										<input name="email" id="email" type="text" value="<?php echo escape(Input::get('email'));?>" autocomplete="off" placeholder="Email">
									</div>
									<div class="col-md-4 in-contact">
										<input name="phone" type="text" id="phone" value="<?php echo escape(Input::get('phone'));?>" autocomplete="off" placeholder="Phone number">
									</div>
									<div class="clearfix"> </div>
								</div>
							
								<div class="contact-bottom-top">
									<textarea name="feedback" id="feedback"  autocomplete="off" placeholder="Message" ><?php echo escape(Input::get('feedback'));?></textarea>								
								</div>
								<input name="submit" id="submit" type="submit" value="Send">
							</form>
						</div>
		
				
			</div>
		</div>
	</div>
<!-- contact -->

<div class="footer_contact">
		<div class="container">
				<div class="col-md-4 contact-left">
					
					<h4>Address</h4>
					<address>
						  1715 Britannia road east<br>
						  Mississauga, Ontario <br>
						  (Entrance From Atlantic Drive<br> 
						  in front of Petro Pass)

						  
						</address>
				</div>
				<div class="col-md-4 contact-left">
					
					<h4>Phone/Fax</h4>
					<p>Phone : (+1)-647-660-4929 </p>
					<p>Fax   : +(647)428-1931 </p>
					<p>Fax   : +(289)201-2338 </p>
				</div>
				<div class="col-md-4 contact-left">
					
					<h4>Email</h4>
					<p>Email-1 : <a href="mailto:info@example.com">dispatch@i-waytrans.com</a> </p>
					<p>Email-2 : <a href="mailto:info@example.com">queries@i-waytrans.com</a> </p>
					
				</div>
				<div class="clearfix"></div>
			
		</div>
	</div>

<div class="hr">
</div>

<div class="hr">
</div>

<div class="hr">
</div>

<!--  footer -->

  <?php require_once('footer.php'); ?>

	
		</div>
		<!--Wrapper Section Ends Here -->

	
		<script src="js/script.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/site.js"></script>


		   <!-- Java Script
   ================================================== -->
   
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

   <script src="js/jquery.flexslider.js"></script>
   <script src="js/jquery.reveal.js"></script>
   <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
   <script src="js/gmaps.js"></script>
   <script src="js/init.js"></script>

   <script src="js/fromvalidation.js"></script>

 
	
</html>