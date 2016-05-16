<?php
require_once 'core/init.php';
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
		
		<!--Wrapper Section Start Here -->
		<div id="wrapper" class="homepage homepage-1" style="padding-top: 0px;">
			<!--header Section Start Here -->
			<header id="header" class="header normal">
				<!-- primary header Start Here -->
				<div class="primary-header">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="mail">
									<img src="images/icon-mail.png" alt="">
									<span>Email us at : <a class="email-us" href="mailto:dispatch@i-waytransport.com">dispatch@i-waytrans.com</a></span>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="social-wrap clearfix">
									<a href="#" class="request">Driver Portal</a>
									<ul class="social">
										<li>
											<a href="#"> <i class="fa fa-facebook"></i> </a>
										</li>
										<li>
											<a href="#"> <i class="fa fa-twitter"></i> </a>
										</li>
										<li>
											<a href="#"> <i class="fa fa-google-plus"></i> </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- primary header Ends Here -->
				<!-- main header Starts Here -->
				<div class="main-header">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 hidden-xs">

								<div class="call-us">
									<ul>
										<li>
											<img src="images/iphone.png" alt="">
											<span class="transport">CALL US NOW FOR <span></span> YOUR TRANSPORT</span>
										</li>
										<li>
											<a href="tel:5917890123">591 7890 123</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
								<a href="#" class="logo"> <img src="images/i-waytrans.jpg" alt=""> </a>

							</div>
							<div class="col-xs-12 col-sm-9 custom-nav">
								<nav>
									<div id="cssmenu"><div id="menu-button">Menu</div>
										<ul class="navigation">
											<li class="active ">
												<a href="index.html">Home</a>
											</li>

											<li class="has-sub"><span class="submenu-button"></span>
												<a href="javascript:void(0);">About Us</a>
												<ul class="sub-menu">
													<li>
														<a href="about.html">Profile</a>
													</li>
													<li>
														<a href="about.html">Vision</a>
													</li>
													<li>
														<a href="about.html">Our People</a>
													</li>
                                                    <li>
														<a href="about.html">Technologies</a>
													</li>
                                                    <li>
														<a href="about.html">Privacy Policy</a>
													</li>
                                                    
												</ul>
											</li>
											
											<li class="has-sub"><span class="submenu-button"></span>
												<a href="javascript:void(0);">Services</a>
												<ul class="sub-menu">
													<li>
														<a href="services.html">service</a>
													</li>
													<li>
														<a href="services.html">services details</a>
													</li>
												</ul>
											</li>
											<li class="has-sub"><span class="submenu-button"></span>
												<a href="javascript:void(0);">Careers</a>

												<ul class="sub-menu">
													<li>
														<a href="careers.html">General Career</a>
													</li>
                                                    <li>
														<a href="careers.html">Driver Career</a>
													</li>
													
												</ul>

											</li>
											<li>
												<a href="portfolio.html">Portfolio</a>
											</li>
											<li class="has-sub"><span class="submenu-button"></span>
												<a href="javascript:void(0);">Customers</a>
                                                <ul class="sub-menu">
													<li>
														<a href="customers.html">Customer Login</a>
													</li>
                                                    <li>
														<a href="customers.html">Sign Up</a>
													</li>
                                                    <li>
														<a href="customers.html">Get a Quote</a>
													</li>
                                                    <li>
														<a href="customers.html">Documents/Forms</a>
													</li>
                                                    
												</ul>
											</li>
											<li>
												<a href="contact.html">Contact</a>
											</li>
											
										</ul>
									</div>
								</nav>

								<div class="nav-icon">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- main header Ends Here -->
			</header>
			<!--header Section Ends Here -->
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

				?>
				<!--div class=" map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.91163207516!2d2.3470599!3d48.85885894999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis%2C+France!5e0!3m2!1sen!2sin!4v1436340519910" allowfullscreen=""></iframe>				
				</div-->
				<div class="contact-grids">
					<div class="contact-form">
							
							<form  method="post" action="contact_code.php">
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<input name="name" id="name" type="text" placeholder="Name">
									</div>
									<div class="col-md-4 in-contact">
										<input name="email" id="email" type="text" placeholder="Email">
									</div>
									<div class="col-md-4 in-contact">
										<input name="phone" type="text" id="phone" placeholder="Phone number">
									</div>
									<div class="clearfix"> </div>
								</div>
							
								<div class="contact-bottom-top">
									<textarea name="feedback" id="feedback" placeholder="Message" ></textarea>								
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

<!-- Map Section
   ================================================== -->
   <section id="map">

      <p class="map-error">Something went wrong... Unable to load map... Please try to enable javascript</p>

   </section> <!-- Map Section End-->
<footer>
   		<div class="container">

      <div class="row-new">

         <div class="col g-7">
            <ul class="copyright">
               <li>&copy; 2014 Kreative</li>
               <li>Design by <a href="http://www.styleshout.com/" title="Styleshout">Styleshout</a></li>               
            </ul>
         </div>

         <div class="col g-5 pull-right">
            <ul class="social-links">
               <li><a href="#"><i class="icon-facebook"></i></a></li>
               <li><a href="#"><i class="icon-twitter"></i></a></li>
               <li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
               <li><a href="#"><i class="icon-linkedin"></i></a></li>
               <li><a href="#"><i class="icon-skype"></i></a></li>
               <li><a href="#"><i class="icon-rss-sign"></i></a></li>
            </ul>
         </div>

      </div>
      </div>

   </footer> <!-- Footer End-->

	
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