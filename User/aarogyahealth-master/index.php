<?php
require 'dashboard/dbconnect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/findoctor/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Wed, 06 Dec 2017 11:04:28 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>Aarogya Health</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- BASE CSS -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
   	<link href="css/animate.css" rel="stylesheet">

    
	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">
	
</head>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if((isset($_POST['start']))){
			if( $_SESSION['logged_in']==true){
				$number = $_POST['cardid'];
      			$result = $mysqli->query( "SELECT * FROM u_gen_info WHERE u_id=$number" );
				if ( $result->num_rows == 0 ) { 
					print("User does'n exist!!");
				}
				else { 
					$user = $result->fetch_assoc();
					if($_POST['fullname']==($user['fname'].' '.$user['l_name'])){
						$_SESSION['uid']=$user['u_id'];
						$_SESSION['ufullname']=$_POST['fullname'];
						$_SESSION['ugender'] = $user['gender'];
						$_SESSION['udob'] = $user['dob'];
						header( "location: dashboard.php" );
					}
					else{
						print("User doesn't exist");
					}
					
				}
			}
			else{
				header( "location: login.php" );
			}
		}
		
	}
?>
<body>
	
	<div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div>
	<!-- /Preload-->
	
	<div id="page">		
	<header class="header_sticky">	
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<!-- /btn_mobile-->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					
				</div>
				<div class="col-lg-9 col-6">
					<ul id="top_access">
						<li><a href="login.html"><i class="pe-7s-user"></i></a></li>
						<li><a href="register-doctor.html"><i class="pe-7s-add-user"></i></a></li>
					</ul>
					<nav id="menu" class="main-menu">
						<ul>
							<li class="page-scroll">
								<span><a href="#home">Home</a></span>
								
							</li>
							<li class="page-scroll">
								<span><a href="#services">Services</a></span>
							</li>
							<li class="page-scroll">
								<span><a href="#about">About</a></span>
							</li>
                            <li class="page-scroll">
								<span><a href="#contact">Contact Us</a></span>
							</li>
						</ul>
					</nav>
					<!-- /main-menu -->
				</div>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->
	
	<main id="home">
		<div class="hero_home version_1">
			<div class="content" style="padding-bottom:60px">
				<img src="img/arroglogo.png" style="padding-bottom: 30px">
				<p style="padding-bottom: 30px">
					<u>Fill in the details</u>
				</p>
				<form method="post">
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Card ID" name="cardid">
							<span style="width: 20px"></span>
							<input type="text" class="form-control" placeholder="Full Name" name="fullname">
						</div>
						<ul>
							
							<li>
								<input type="radio" id="start" name="start" value="submit" onChange="this.form.submit();">
								<label for="start"><i class="arrow_right"></i></label>
							</li>
							
						</ul>
						<div>
							<div class="row">
								<div class="col-md-5">
									<hr>
								</div>
								<div class="col-md-2">
									<p>Or</p>
								</div>
								<div class="col-md-5">
									<hr>
								</div>
							</div>
							<p class="text-center"><a href="scan.php" class="btn_1 medium">Scan a QR code</a></p>
						</div>
						
					</div>
				</form>
				
			</div>
		</div>
		<!-- /Hero -->
	
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Upgrade your <strong>Healthcare</strong> experience!</h2>
				<p></p>
				<p>Aarogya HealthCard manages your medical records and keep track of your day to day health history. Use it at Clinics, Pharmacy and Laboratories to have an accurate diagnosis & well managed treatment.</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<span></span>
						<h3>Apply for Card</h3>
						<p>You can easily apply for health card by filling up the online form and making online payment.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3>Delivered at home</h3>
						<p>Once your profile is verified, the health card will be delivered at the address provided by you.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<h3>Use Anytime Anywhere</h3>
						<p>It stores your medical records centrally, which can be used by various health service providers. </p>
					</div>
				</div>
				
			</div>
	 

			<!-- /row -->
			
			<p class="text-center"><a href="register.html" class="btn_1 medium">Apply Now</a></p>

		</div>
		<!-- /container -->
		<section id="services">
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="main_title">
					<h2>A <strong>Centralized</strong> Electronic Health Record System</h2>
					<p></p>
					<p>Aarogya HealthCard is designed to offer various solutions to revolutionize healthcare and solve modern day healthcare problems. </p>
				</div>
				<div id="reccomended" class="owl-carousel owl-theme">
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>Know More</div>
							<div class="title">
								<h4>Health Card</h4>
							</div><img src="img/carousel1.png" alt="">
						</a>
					</div>
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>Know More</div>
							<div class="title">
								<h4>Safe & Secure<em>Storage</em></h4>
							</div><img src="img/carousel2.png" alt="">
						</a>
					</div>
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>Know More</div>
							<div class="title">
								<h4>Centralized Platform</h4>
							</div><img src="img/carousel3.png" alt="">
						</a>
					</div>
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>Know More</div>
							<div class="title">
								<h4>Comprehensive Dashboard</h4>
							</div><img src="img/carousel4.png" alt="">
						</a>
					</div>
					<div class="item">
						<a href="detail-page.html">
							<div class="views"><i class="icon-eye-7"></i>Know More</div>
							<div class="title">
								<h4>Health Data Analytics</h4>
							</div><img src="img/carousel5.png" alt="">
						</a>
					</div>
					
				</div>
		
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<!-- /white_bg -->
	</section>
	<section id="about">
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Designed & Developed for the betterment of society</h2>
				<p></p>
				<p align="left">In India, there is an increase in the magnitude of digitization of healthcare services in various healthcare delivery institutions. It has been claimed by practitioners and clinicians that electronic health records have the ability to enhance quality and safety of care besides improved management of health information and clinical data.</p><p align="left"> Electronic health records also increase portability of clinical information including the better interaction between patient and health service provider. This has helped public health experts to understand disease trends and better diagnose diseases. Also, from the patients perspective, it enables improved services and has reduced the redundant clinical tests. However, these medical records are more institution centric as these are limited to specific/ defined healthcare delivery institutions only. Further, the clinical data resides in silos and usually, access of this data is not extended to the patients, who often struggle with paper based record keeping.</p><p align="left">Today, with the growing trend of a citizen centric healthcare system from an institution centric healthcare system. To bring about this shift, Team of Aarogya HealthCard has developed a centralized EHR for citizens of India. </p>
			</div>			<!-- /row -->
		</div>
		<!-- /container -->
	</section>
	<section id="contact">
		<div id="app_section">
			<div class="container">
				<div class="row justify-content-around">
					<div class="col-lg-6">
								<p></p>
								<h3>Contact-Us</h3>
								<ul>
									<li><strong>Administration</strong>
										<p><small>Address:</small><br> Student Startup Innovation Policy, Commissionerate of Technical Education, 6th Floor, Block No. 2, Karmayogi Bhavan, Gandhinagar - 382010<br>
											<i class="icon-phone-2"></i><a href="tel://003823932342"> 09099520770</a><br>
											<i class="icon-mail-2"></i><a href="mail://darshambaliya@gmail.com"> darshambaliya@gmail.com</a><br>
											<i class="icon-clock-circled"></i><small> Monday to Friday 9am - 7pm</small>
										</p>
									</li>
									<li>
										<div class="follow_us">
											<h3>Follow Us</h3>
											<ul>
												<li><a href="#0"><i style="color: white" class="social_facebook"></i></a></li>
												<li><a href="#0"><i style="color: white" class="social_twitter"></i></a></li>
												<li><a href="#0"><i style="color: white" class="social_linkedin"></i></a></li>
												<li><a href="#0"><i style="color: white" class="social_instagram"></i></a></li>
											</ul>
											<p></p>
										</div>
									</li>
									<li>
									<h3>Download <strong>Aarogya Health App</strong></h3>
									<p></p>
										<div class="app_buttons wow" data-wow-offset="100">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
											<path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
											<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
											<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
										</svg>
											<a href="#0" class="fadeIn"><img src="img/apple_app.png" alt="" width="150" height="50" data-retina="true"></a>
											<a href="#0" class="fadeIn"><img src="img/google_play_app.png" alt="" width="150" height="50" data-retina="true"></a>
										</div>
									</li>

								</ul>
							
					</div>
					<div class="col-lg-6 ml-auto">
							<div class="box_general">
								<h2 class="text-center">GET IN <span>TOUCH</span></h2>
								<hr>
								<h4 class="contact-form">We'd <strong>Love to </strong>hear from you.</h4>

								<div>
									<div id="message-contact"></div>
									<form method="post" action="PHPMailer-master/contactmail.php" id="contactform">
										<div class="row">
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<input type="text" class="form-control" id="name_contact" name="firstname_contact" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<input type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="Last name">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Email">
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="Phone number">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea rows="5" id="message_contact" name="message_contact" class="form-control" style="height:100px;" placeholder="Write your issues here..."></textarea>
												</div>
											</div>
										</div>

										<input type="submit" name="contact" value="Submit" class="btn_1 add_top_20" id="submit-contact">
									</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /app_section -->
	</section>
	</main>
	<!-- /main content -->
	
	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p style="padding-right: 50px">
						<a href="index.html" title="Findoctor">
							<img src="img/aarogya.png" data-retina="true" alt="" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>About</h5>
					<ul class="links">
						<li><a href="#0">About us</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="#0">FAQ</a></li>
						<li><a href="login.html">Help</a></li>
						<li><a href="register.html">Services</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="#0">Join as a Doctor</a></li>
						<li><a href="#0">Join as a Pharmacy</a></li>
						<li><a href="#0">Join as a Laboratory</a></li>
						<li><a href="#0">Apply for Health Card</a></li>
						<li><a href="#0">Download App</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="icon_mobile"></i> + 91 9099520770</a></li>
						<li><a href="../../external.html?link=http://www.ansonika.com/cdn-cgi/l/email-protection#0f666169604f6966616b606c7b607d216c6062"><i class="icon_mail_alt"></i> <span class="__cf_email__" data-cfemail="127a777e6252747b7c767d71667d603c717d7f">darshambaliya@gmail.com</span></a></li>
					</ul>
					<div class="follow_us">
						<h5>Follow us</h5>
						<ul>
							<li><a href="#0"><i class="social_facebook"></i></a></li>
							<li><a href="#0"><i class="social_twitter"></i></a></li>
							<li><a href="#0"><i class="social_linkedin"></i></a></li>
							<li><a href="#0"><i class="social_instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2020 Aarogya HealthCard</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/common_scripts.min.js"></script>
	<script src="js/functions.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/nav-scroll.js"></script>
</body>


<!-- Mirrored from www.ansonika.com/findoctor/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Wed, 06 Dec 2017 11:05:29 GMT -->
</html>