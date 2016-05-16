<?php
require_once 'core/init.php';
$results = array();

if(Input::exists()){

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
$company = ($_GET['company']) ? $_GET['company'] : $_POST['company'];
$address = ($_GET['address']) ? $_GET['address'] : $_POST['address'];
$city = ($_GET['city']) ? $_GET['city'] : $_POST['city'];
$state = ($_GET['state']) ? $_GET['state'] : $_POST['state'];
$postal = ($_GET['postal']) ? $_GET['postal'] : $_POST['postal'];
$phone = ($_GET['phone']) ?$_GET['phone'] : $_POST['phone'];
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
$fax = ($_GET['fax']) ? $_GET['fax'] : $_POST['fax'];

$origin = ($_GET['origin']) ? $_GET['origin'] : $_POST['origin'];
$destination = ($_GET['destination']) ? $_GET['destination'] : $_POST['destination'];
$load = ($_GET['load']) ? $_GET['load'] : $_POST['load'];
$commodity = ($_GET['commodity']) ? $_GET['commodity'] : $_POST['commodity'];
$weight = ($_GET['weight']) ? $_GET['weight'] : $_POST['weight'];

$loadingTime = ($_GET['loadingTime']) ? $_GET['loadingTime'] : $_POST['loadingTime'];
$unloadingTime = ($_GET['unloadingTime']) ? $_GET['unloadingTime'] : $_POST['unloadingTime'];
$declaredValue = ($_GET['declaredValue']) ? $_GET['declaredValue'] : $_POST['declaredValue'];
$comment = ($_GET['comment']) ?$_GET['comment'] : $_POST['comment'];

//flag to indicate which method it uses. If POST set it to 1

if ($_POST) $post=1;

//Simple server side validation for POST data, of course, you should validate the email
if (!$name) $errors[count($errors)] = 'Please enter name.';
	else if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $errors[count($errors)] = "Only letters and white space allowed";
     }

if (!$company) $errors[count($errors)] = 'Please enter company name.';
	else {
    	if(strlen($company)<2)
    		$errors[count($errors)] = "Company Name is too short (min 2 characters are required).";
    		else if(strlen($company)>25)
    			$errors[count($errors)] = "Company Name is too long (max 25 characters are allowed).";
    } 
	
if (!$address) $errors[count($errors)] = 'Please enter address.';
else {
    	if(strlen($address)<5)
    		$errors[count($errors)] = "Address is too short (min 5 characters are required).";
    		else if(strlen($address)>30)
    			$errors[count($errors)] = "Address is too long (max 30 characters are allowed).";
    } 
if (!$city) $errors[count($errors)] = 'Please enter city.';
else {
    	if(strlen($city)<2)
    		$errors[count($errors)] = "City name is too short (min 2 characters are required).";
    		else if(strlen($city)>20)
    			$errors[count($errors)] = "City name is too long (max 20 characters are allowed).";
    } 
if (!$state) $errors[count($errors)] = 'Please enter state/province.';
else {
    	if(strlen($state)<2)
    		$errors[count($errors)] = "State/Province name is too short (min 2 characters are required).";
    		else if(strlen($state)>20)
    			$errors[count($errors)] = "State/Province name is too long (max 20 characters are allowed).";
    } 
if (!$postal) $errors[count($errors)] = 'Please enter postal/zip.'; 

if (!$phone) $errors[count($errors)] = 'Please enter phone number.';
	else {
    	if(strlen($phone)>12 && strlen($phone)<10)
    		$errors[count($errors)] = "Phone number is of invalid length.";
    }  
if (!$fax) $errors[count($errors)] = 'Please enter fax.';
	else {
    	if(strlen($fax)<10 && strlen($fax)>15)
    		$errors[count($errors)] = "Fax number is of invalid length.";
    } 

if (!$email) $errors[count($errors)] = 'Please enter email.';
 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[count($errors)] = "Email format is not valid.";
     }

if (!$origin) $errors[count($errors)] = 'Please enter origin.';
else {
    	if(strlen($origin)<2)
    		$errors[count($errors)] = "Origin is too short (min 2 characters are required).";
    		else if(strlen($origin)>50)
    			$errors[count($errors)] = "Origin is too long (max 50 characters are allowed).";
    } 
if (!$destination) $errors[count($errors)] = 'Please enter destination.';
else {
    	if(strlen($destination)<2)
    		$errors[count($errors)] = "Destination is too short (min 2 characters are required).";
    		else if(strlen($destination)>50)
    			$errors[count($errors)] = "Destination is too long (max 50 characters are allowed).";
    } 
if (!$load) $errors[count($errors)] = 'Please enter load per month.';
	 else if (!filter_var($load, FILTER_VALIDATE_INT)) {
       $errors[count($errors)] = "Load should be a number only.";
     }

if (!$commodity) $errors[count($errors)] = 'Please enter commodity.';
else {
    	if(strlen($commodity)<2)
    		$errors[count($errors)] = "Commodity name is too short (min 2 characters are required).";
    		else if(strlen($commodity)>25)
    			$errors[count($errors)] = "Commodity name is too long (max 25 characters are allowed).";
    } 
if (!$weight) $errors[count($errors)] = 'Please enter your weight per load.';
	 else if (!filter_var($weight, FILTER_VALIDATE_INT)) {
       $errors[count($errors)] = "Weight should be a number only.";
     }

if (!$loadingTime) $errors[count($errors)] = 'Please enter loading time.';
	 else if (!filter_var($loadingTime, FILTER_VALIDATE_INT)) {
       $errors[count($errors)] = "Loading time should be a number only.";
     }
if (!$unloadingTime) $errors[count($errors)] = 'Please enter unloading time.';
	 else if (!filter_var($unloadingTime, FILTER_VALIDATE_INT)) {
       $errors[count($errors)] = "Unloading time should be a number only.";
     }
if (!$declaredValue) $errors[count($errors)] = 'Please enter declared value.';
	 else if (!filter_var($declaredValue, FILTER_VALIDATE_INT)) {
       $errors[count($errors)] = "Declared value should be a number only.";
     }
if (!$comment) $errors[count($errors)] = 'Please enter a message.'; 

//if the errors array is empty, send the mail
if (!$errors) {

	//recipient - replace your email here
	$to = 'lovepreet.singh010194@gmail.com';	
	//sender - from the form
	$from = $name . ' <' . $email . '>';
	
	//subject and the html message
	$subject = 'Message from ' . $name;	
	$message = 	'<h2>Contact Details</h2><br/></br>
				Name   : ' . $name . '<br/>
				Company: ' . $company . '<br/>
				Address: ' . $address . '<br/>	
				City   : ' . $city . '<br/>	
				State/Province: ' . $state . '<br/>	
				Postal/Zip: ' . $postal . '<br/>	
		        Email  : ' . $email . '<br/>	
		        Phone  : ' . $phone . '<br/>
		        Fax    : ' . $fax . '<br/><br/>
		        <h2>Shipping Details</h2><br/></br>	
		        Origin  : ' . $origin . '<br/>
		        Destination  : ' . $destination . '<br/>
		        Loads per month  : ' . $load . '<br/>
		        <h2>Load Details</h2><br/></br>
		        Commodity: ' . $commodity . '<br/>
		        Weight per load  : ' . $weight . '<br/>
		        Loading Time  : ' . $loadingTime . ' hrs <br/>
		        Unloading Time : ' . $unloadingTime . ' hrs <br/>
		        Declared Value  : ' . $declaredValue . ' ($cdn) <br/>
		        Other Details: ' . nl2br($comment) . '<br/>';

	//send the mail
	$result = sendmail($to, $subject, $message, $from);
	
	//if POST was used, display the message straight away
	if ($_POST) {
		if ($result) {
			Session::flash('quote','<div class="alert alert-success" role="alert">Thank you! We have received your message !</div>');
			Redirect::to('getaquote.php');
		}
		else {
			Session::flash('quote','<div class="alert alert-warning" role="alert">Sorry, unexpected error. Please try again later ! </div>');
		
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
	
	Session::flash('quote',$return_string);
	
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
				<h3>Get a Quote</h3>


				<?php
						if(Session::exists('quote')){
						echo  Session::flash('quote') ;
					}

				?>
				<!--div class=" map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.91163207516!2d2.3470599!3d48.85885894999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis%2C+France!5e0!3m2!1sen!2sin!4v1436340519910" allowfullscreen=""></iframe>				
				</div-->
				<div class="contact-grids">
					<div class="contact-form">
							<form action="" method="post">
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<input type="text" name="name" id="name" value="<?php echo escape(Input::get('name'));?>" autocomplete="off" placeholder="Full Name">
									</div>
									<div class="col-md-4 in-contact">
										<input type="text" name="company" id="company" value="<?php echo escape(Input::get('company'));?>" autocomplete="off" placeholder="Company">
									</div>
									<div class="col-md-4 in-contact">
										<input type="text" name="address" id="address" value="<?php echo escape(Input::get('address'));?>" autocomplete="off" placeholder="Address">
									</div>
									<div class="clearfix"> </div>
								</div>

								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<input type="text" name="city" id="city" value="<?php echo escape(Input::get('city'));?>" autocomplete="off" placeholder="City">
									</div>
									<div class="col-md-4 in-contact">
										<input type="text" name="state" id="state" value="<?php echo escape(Input::get('state'));?>" autocomplete="off" placeholder="State/Province">
									</div>
									<div class="col-md-4 in-contact">
										<input type="text" name="postal" id="postal" value="<?php echo escape(Input::get('postal'));?>" autocomplete="off"  placeholder="Postal/Zip">
									</div>
									<div class="clearfix"> </div>
								</div>

								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<input type="text" name="phone" id="phone" value="<?php echo escape(Input::get('phone'));?>" autocomplete="off"  placeholder="Phone Number">
									</div>
									<div class="col-md-4 in-contact">
										<input type="text" name="fax" id="fax" value="<?php echo escape(Input::get('fax'));?>" autocomplete="off"  placeholder="Fax">
									</div>
									<div class="col-md-4 in-contact">
										<input type="text" name="email" id="email" value="<?php echo escape(Input::get('email'));?>" autocomplete="off"   placeholder="Email">
									</div>
									<div class="clearfix"> </div>
								</div>
							

								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<input type="text" name="origin" id="origin" value="<?php echo escape(Input::get('origin'));?>" autocomplete="off"  placeholder="Origin">
									</div>
									<div class="col-md-4 in-contact">
										<input type="text" name="destination" id="destination" value="<?php echo escape(Input::get('destination'));?>" autocomplete="off"   placeholder="Destination">
									</div>
									<div class="col-md-4 in-contact">
										<input type="text" name="load" id="load" value="<?php echo escape(Input::get('load'));?>" autocomplete="off"  placeholder="Loads per month (kgs)">
									</div>
									
									<div class="clearfix"> </div>
								</div>

								<div class="contact-bottom">
									<div class="col-md-6 in-contact">
										<input type="text" name="commodity" id="commodity" value="<?php echo escape(Input::get('commodity'));?>" autocomplete="off"   placeholder="Commodity">
									</div>
									<div class="col-md-6 in-contact">
										<input type="text" name="weight" id="weight" value="<?php echo escape(Input::get('weight'));?>" autocomplete="off"  placeholder="Weight per load (kgs)">
									</div>
									
									<div class="clearfix"> </div>
								</div>

							

								<div class="contact-bottom">
									<div class="col-md-6 in-contact">
										<input type="text" name="loadingTime" id="loadingTime" value="<?php echo escape(Input::get('loadingTime'));?>" autocomplete="off"   placeholder="Loading Time (hrs)">
									</div>
									<div class="col-md-6 in-contact">
										<input type="text" name="unloadingTime" id="unloadingTime" value="<?php echo escape(Input::get('unloadingTime'));?>" autocomplete="off"   placeholder="Unloading Time (hrs)">
									</div>
									
									<div class="clearfix"> </div>
								</div>

								
								<div class="contact-bottom">
									<div class="col-md-6 in-contact">
										<input type="text" name="declaredValue" id="declaredValue" value="<?php echo escape(Input::get('declaredValue'));?>" autocomplete="off"  placeholder="Declared Value ( $ cdn )">
									</div>

									<div class="clearfix"> </div>
								</div>



								<div class="contact-bottom-top">
									<textarea name="comment" id="comment"  autocomplete="off"  placeholder="Please provide other details which want us to know !"><?php echo escape(Input::get('comment'));?></textarea>								
								</div>

								<input type="submit" name="submit" id="submit" value="Get Quote">
							</form>
						</div>
		
				
			</div>
		</div>
	</div>
<!-- contact -->


<div class="hr">
</div>

<div class="hr">
</div>

<div class="hr">
</div>

<!--  footer -->

<!-- Map Section
   ================================================== -->
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

    <!--script src="js/getaquotevalidation.js"></script-->

</html>