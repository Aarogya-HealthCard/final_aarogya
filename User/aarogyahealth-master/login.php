<?php
require 'dashboard/dbconnect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Find easily a doctor and book online an appointment">
<meta name="author" content="Ansonika">
<title>Login | Aarogya HealthCard</title>

<!-- Favicons-->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

<!-- BASE CSS -->
<link href="css/login/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/menu.css" rel="stylesheet">
<link href="css/vendors.css" rel="stylesheet">
<link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">

<!-- YOUR CUSTOM CSS -->
<link href="css/custom.css" rel="stylesheet">
<link href="css/login/login.css" rel="stylesheet" type="text/css">
</head>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
   
   if (isset($_POST['doc-reg'])) { //doctor registering
        
        $_SESSION['user-type']=$_POST['roles'];

        require 'ajax/register.php';
        //header("location:profile.html");

        
    }

    elseif (isset($_POST['user-register'])) {
    
      $_SESSION['user-type']='user';
      require 'ajax/register.php';
      //header("location:user-ui\index.html");
    }

}
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(isset($_POST['user-login'])){
    $_SESSION['login-type']='user';

    $logintype = $_SESSION[ 'login-type' ];
    if ( $logintype == 'user' ) {
  
      $_SESSION['user_set']=1;
      $number = $_POST['number'];
      $result = $mysqli->query( "SELECT * FROM u_gen_info WHERE phone=$number" );
      if ( $result->num_rows == 0 ) { // User doesn't exist
        $errMSG = "User does'n exist!!";
    }
    else { // User exists
    $user = $result->fetch_assoc();
    if (  $_POST[ 'password' ] == $user[ 'password' ]  ) {
      $_SESSION['u_id']=$user['u_id'];
        header( "location: index.php" );
    }
    else
    {
      $errMSG = "Bad password";
    }
  }
}
}
  elseif (isset($_POST['doctor-login'])) {
    $_SESSION['login-type']='doctor';
    $logintype = $_SESSION[ 'login-type' ];
    if ( $logintype == 'doctor' ) {
  
      $_SESSION['user_set']=1;
      $number = $_POST[ 'd_number' ] ;
      $result = $mysqli->query( "SELECT * FROM doctors WHERE phone=$number" );
      if ( $result->num_rows == 0 ) { // User doesn't exist
                $errMSG = "User does'n exist!!";
    }
  
    else { // User exists
    $user = $result->fetch_assoc();
    if (  $_POST[ 'd_password' ] == $user[ 'password' ] ) {
      $_SESSION['u_id']=$user['doc_id'];
 header( "location: index.php" );
    }
    else
    {
      $errMSG = "Bad password";
    }
  }
}
  }
  elseif (isset($_POST['pharma-login'])) {

    $_SESSION['login-type']='pharma';
    $logintype = $_SESSION[ 'login-type' ];
    if ( $logintype == 'pharma' ) {
  
      $_SESSION['user_set']=1;
      $number = $_POST[ 'p_number' ] ;
      $result = $mysqli->query( "SELECT * FROM pharmacy WHERE phone=$number" );
      if ( $result->num_rows == 0 ) { // User doesn't exist
                $errMSG = "User does'n exist!!";
    }
  
    else { // User exists
    $user = $result->fetch_assoc();
    if (  $_POST[ 'p_password' ] == $user[ 'password' ] ) {
      $_SESSION['u_id']=$user['ph_id'];
 header( "location: index.php" );
    }
    else
    {
      $errMSG = "Bad password";
    }
  }
}
  }
  elseif (isset($_POST['lab-login'])) {

    $_SESSION['login-type']='lab';
     $logintype = $_SESSION[ 'login-type' ];
    if ( $logintype == 'lab' ) {
  
      $_SESSION['user_set']=1;
      $number = $_POST[ 'l_number' ] ;
      $result = $mysqli->query( "SELECT * FROM laboratory WHERE phone=$number" );
      if ( $result->num_rows == 0 ) { // User doesn't exist
              $errMSG = "User does'n exist!!";
    }
    else { // User exists
    $user = $result->fetch_assoc();
    if (  $_POST[ 'l_password' ] == $user[ 'password' ] ) {
      $_SESSION['u_id']=$user['lab_doc_id'];
 header( "location: index.php" );
    }
    else
    {
      $errMSG = "Bad password";
    }
  }
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
					<div id="logo" align="center">
						<a href="index.html" title="Aarogya"><img src="img/aarog2.png" data-retina="true" alt="" width="275" height="40"></a>
					</div>	
		</div>		<!-- /container -->
	</header>
  <!-- /header -->
  
  <main>
    <div class="bg_color_2">
      <div class="container margin_60_35">
        <div class="tab-container">
          <table align="center" width="300" class="nav nav-tabs">
            <tr>
              <td align="center"><a href="#user_login" data-toggle="tab" class="nav-link active">User</a></td>
              <td align="center"><a href="#doctor_login" data-toggle="tab" class="nav-link">Doctor</a></td>
              <td align="center"><a href="#pharma_login" data-toggle="tab" class="nav-link">Pharmacy</a></td>
              <td align="center"><a href="#lab_login" data-toggle="tab" class="nav-link">Lab</a></td>

            </tr>
          </table>
           <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                <?php    
                }
                ?>
          <div class="tab-content">
            <div id="user_login" class="tab-pane cont active fadeInUp animated" >
              <div id="login">
                <h1>Welcome User, Please login here!</h1>
                <div class="box_form">
                  <form method="post">
                    <div class="form-group">
                      <input type="tel" class="form-control" placeholder="Your mobile number" name="number" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Your password" name="password" required>
                    </div>
                    <a href="#0"><small>Forgot password?</small></a>
                    <div class="form-group text-center add_top_20">
                      <input class="btn_1 medium" type="submit" value="Login" name="user-login">
                    </div>
                  </form>
                </div>
                <p class="text-center link_bright">Do not have an account yet? <a href="register.html"><strong>Register now!</strong></a></p>
              </div>
            </div>
            <div id="doctor_login" class="tab-pane cont fadeInUp animated">
              <div id="doclogin">
                <h1>Welcome Doctor, Please login here!</h1>
                <div class="box_form">
                  <form method="post">
                    <div class="form-group">
                      <input type="tel" class="form-control" placeholder="Your mobile number" name="d_number" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Your password" name="d_password" required>
                    </div>
                    <a href="#0"><small>Forgot password?</small></a>
                    <div class="form-group text-center add_top_20">
                      <input class="btn_1 medium" type="submit" value="Login" name="doctor-login">
                    </div>
                  </form>
                </div>
                <p class="text-center link_bright">Do not have an account yet? <a href="register-doctor.html"><strong>Register now!</strong></a></p>
              </div>
            </div>
            <div id="pharma_login" class="tab-pane cont fadeInUp animated">
              <div id="pharmalogin">
                <h1>Welcome, Please login here!</h1>
                <div class="box_form">
                  <form method="post">
                    <div class="form-group">
                      <input type="tel" class="form-control" placeholder="Your mobile number" name="p_number" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Your password" name="p_password" required>
                    </div>
                    <a href="#0"><small>Forgot password?</small></a>
                    <div class="form-group text-center add_top_20">
                      <input class="btn_1 medium" type="submit" value="Login" name="pharma-login">
                    </div>
                  </form>
                </div>
                <p class="text-center link_bright">Do not have an account yet? <a href="register-doctor.html"><strong>Register now!</strong></a></p>
              </div>
            </div>
			 <div id="lab_login" class="tab-pane cont fadeInUp animated">
              <div id="lablogin">
                <h1>Welcome Doctor, Please login here!</h1>
                <div class="box_form">
                  <form method="post">
                    <div class="form-group">
                      <input type="tel" class="form-control" placeholder="Your mobile number" name="l_number" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Your password" name="l_password" required>
                    </div>
                    <a href="#0"><small>Forgot password?</small></a>
                    <div class="form-group text-center add_top_20">
                      <input class="btn_1 medium" type="submit" value="Login" name="lab-login">
                    </div>
                  </form>
                </div>
                <p class="text-center link_bright">Do not have an account yet? <a href="register-doctor.html"><strong>Register now!</strong></a></p>
              </div>
            </div>

          </div>
         </form>
        </div>
        <!-- /login --> 
        
      </div>
    </div>
  </main>
  <!-- /main -->
  
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
<script data-cfasync="false" src="../cdn-cgi/scripts/ddc5a536/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script> 
<script src="js/common_scripts.min.js"></script> 
<script src="js/functions.js"></script>
</body>

</html>