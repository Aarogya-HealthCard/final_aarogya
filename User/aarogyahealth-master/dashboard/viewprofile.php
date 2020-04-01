<?php
session_start();
?>
<?php include "C:/xampp/htdocs/New folder/aarogyahealth-master/dashboard/dbconnect.php"?>
<?php 
$uid=$_SESSION['u_id'];
$my=$mysqli->query("SELECT u_id from u_gen_info WHERE u_id='$uid'");
//$res=$my->fetch_assoc();
//$res=$res['u_id'];
//echo $res;
    $img=" ";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])){
            $u_hospital=$_POST['u_hospital'];
            $u_doctor=$_POST['u_doctor'];
            $u_date=$_POST['u_date'];
            $u_phone=$_POST['u_phone'];
            $u_address=$_POST['u_address'];
            $notes=$_POST['notes'];

            $filetmp=$_FILES["img1"]["tmp_name"];
            $filename=$_FILES["img1"]["name"];
            $filetype=$_FILES["img1"]["type"];
            $filepath="images/".$filename;
            move_uploaded_file($filetmp, $filepath);
            $img=$img.$filename;
            $query=$mysqli->query("INSERT INTO  u_prescription(u_id,u_hospital,u_doctor,u_date,u_phone,u_address,notes,img1) VALUES ('$uid','$u_hospital','$u_doctor','$u_date','$u_phone','$u_address','$notes','$img')");
            
           
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ravijaiswal.com/Jais_admin/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 04 Aug 2017 15:24:40 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Aarogya HealthCard</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/jais.css" rel="stylesheet">
    <link href="assets/css/demo/jais-demo-icons.css" rel="stylesheet">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
      
    <!-- <link href="assets/css/demo/jais-demo.css" rel="stylesheet"> -->

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <div class="brand-title">
                            <span class="brand-text">Dashboard</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-view-list"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->



                        
                    </ul>
                    <ul class="nav navbar-top-links pull-right">
                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <img class="img-circle img-user media-object" src="assets/images/9.png" alt="Profile Picture">
                                </span>
                                <div class="username hidden-xs">Doctor's Name</div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                                <!-- Dropdown heading  -->
                                <div class="pad-all bord-btm">
                                    <ul class="head-list">
                                    <li>
                                        <a href="#">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> Profile
                                        </a>
                                    </li>
                                    </ul>
                                </div>


                                <!-- User dropdown menu -->
                                <ul class="head-list">
                                   
                                    <li>
                                        <a href="#">
                                            <span class="badge badge-danger pull-right">9</span>
                                            <i class="demo-pli-mail icon-lg icon-fw"></i> Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="demo-pli-gear icon-lg icon-fw"></i> Account Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="demo-pli-information icon-lg icon-fw"></i> Help
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="demo-pli-computer-secure icon-lg icon-fw"></i> Feedback
                                        </a>
                                    </li>
                                </ul>

                                <!-- Dropdown footer -->
                                <div class="pad-all text-right">
                                    <a href="pages-login.html" class="btn btn-primary">
                                        <i class="demo-pli-unlock"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->

                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow">Timeline</h1>

                    <!--Searchbox-->
                    <div class="searchbox">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="text-muted" type="button"><i class="demo-pli-magnifi-glass"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->

                <!--Page content-->
                <!--===================================================-->
                
                <div id="content" class="dashboard padding-20">

                    <div id="panel-1" class="panel panel-default">
                        <div class="panel-heading">
                            <span class="title elipsis">
                                <strong style="font-size: 20px;">PROFILE</strong> <!-- panel title -->
                            </span><br>
                            <p>Includes your essential information including <b>demographics</b>,<b> emergency</b> details and 
                            <b>insurance</b> details</p>

                            <!-- /right options -->

                        </div>

                        <!-- panel content -->
                        
                        <!-- /panel content -->

                        
                    </div>
                    <!-- /PANEL -->




                </div>
                <!--===================================================-->
                <!--End page content-->

                        <div id="content" class="dashboard padding-20">    
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <p class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">PERSONAL INFORMATION</a>
                                        </p>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                        <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                            <label for="inputEmail4">First Name</label>
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label for="inputPassword4">Middle Name</label>
                                            <input type="text" class="form-control" id="inputPassword4" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label for="inputPassword4">Last Name</label>
                                            <input type="text" class="form-control" id="inputPassword4" placeholder="Enter text">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputPassword4">Date of Birth</label>
                                            <input type="text" class="form-control" id="datepicker-1" placeholder="dd/mm/yy">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="sel1">Gender</label>
                                            <select class="form-control" id="sel1">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select>
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputAddress">Aadhar</label>
                                            <input type="number" class="form-control" id="inputAddress" placeholder="Enter number">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputAddress2">Email</label>
                                            <input type="email" class="form-control" id="inputAddress2" placeholder="email">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                            <label for="inputAddress">Mobile</label>
                                            <input type="text" class="form-control" id="inputAddress" maxlength="10" 
                                            placeholder="Enter number">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label for="inputAddress2">Secondary Mobile</label>
                                            <input type="text" class="form-control" id="inputAddress2" maxlength="10" 
                                            placeholder="Enter number">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label for="sel1">Blood Group</label>
                                            <select class="form-control" id="sel2">
                                            <option value="Do Not Specify"></option>  
                                            <option value="A Positive">A Positive</option>  
                                            <option value="A Negative">A Negative</option>  
                                            <option value="B Positive">B Positive</option>  
                                            <option value="B Negative">B Negative</option>  
                                            <option value="AB Positive">AB Positive</option>    
                                            <option value="AB Negative">AB Negative</option>    
                                            <option value="O Positive">O Positive</option>  
                                            <option value="O Negative">O Negative</option>  
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputCity">Address Line 1</label>
                                            <input type="text" class="form-control" id="inputAdd1" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputCity">Address Line 2</label>
                                            <input type="text" class="form-control" id="inputAdd2" placeholder="Enter text">
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                            <label for="inputCity">City</label>
                                            <input type="text" class="form-control" id="inputCity" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="inputCity">District</label>
                                            <input type="text" class="form-control" id="inputCity" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="inputCity">State</label>
                                            <input type="text" class="form-control" id="inputCity" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="inputZip">Pin</label>
                                            <input type="text" class="form-control" id="inputZip" placeholder="Enter number">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label class="form-check-label" for="gridCheck">Are you differently abled?</label>
                                            <input type="radio" name="abled" value="Yes" onclick="sel(0)" >Yes
                                            <input type="radio" name="abled" value="No" checked="checked" onclick="sel(1)">No
                                            </div>
                                            <div class="form-group col-md-4">
                                            <select class="form-control" id="dropdown1">
                                                <option>Do not specify</option>
                                                <option>Not specified</option>
                                                <option>Physical Disability</option>
                                                <option>Speech and Language Disorder</option>
                                                <option>Vision Loss and Blindness</option>
                                                <option>Others</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <button type="button" class="btn btn-primary pull-right">Save</button>                   
                                        <button type="button" class="btn btn-success pull-right">Edit</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <p class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">EMERGENCY INFORMATION</a>
                                        </p>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Name</label>
                                            <input type="text" class="form-control" id="inputEmeName" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputPassword4">Relationship</label>
                                            <input type="text" class="form-control" id="inputRelation" placeholder="Enter text">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputAddress">Primary Phone</label>
                                            <input type="text" class="form-control" id="inputEmePhone1" maxlength="10" 
                                            placeholder="Enter number">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputAddress2">Secondary Phone</label>
                                            <input type="text" class="form-control" id="inputEmePhone2" maxlength="10" 
                                            placeholder="Enter number">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputCity">Address Line 1</label>
                                            <input type="text" class="form-control" id="inputEmeAdd1" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputCity">Address Line 2</label>
                                            <input type="text" class="form-control" id="inputEmeAdd2" placeholder="Enter text">
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                            <label for="inputCity">City</label>
                                            <input type="text" class="form-control" id="inputEmeCity" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="inputCity">District</label>
                                            <input type="text" class="form-control" id="inputEmeDistrict" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="inputCity">State</label>
                                            <input type="text" class="form-control" id="inputEmeState" placeholder="Enter text">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="inputZip">Pin</label>
                                            <input type="text" class="form-control" id="inputEmePin" placeholder="Enter number">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <button type="button" class="btn btn-primary pull-right">Save</button>                   
                                        <button type="button" class="btn btn-success pull-right">Edit</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <p class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">INSURANCE INFORMATION</a>
                                        </p>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Insurance Provider</label>
                                            <input type="text" class="form-control" id="inputIns">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputPassword4">Policy Number</label>
                                            <input type="text" class="form-control" id="inputPlno">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <label for="inputAddress">Policy Name</label>
                                            <input type="text" class="form-control" id="inputPlName">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputAddress2">Valid Till</label>
                                            <input type="text" class="form-control" id="datepicker-2">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                        <button type="button" class="btn btn-primary pull-right">Save</button>                   
                                        <button type="button" class="btn btn-success pull-right">Edit</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

            </div>
            
            
            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap">
                                        <div class="pad-btm">
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name">Patient Name</p>
                                            <span class="mnp-desc">Male, Age: 28</span>
                                        </a>
                                            <img class="img-circle img-sm img-border" src="assets/images/2.png" alt="Profile Picture">
                                        </div>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Clear Record
                                        </a>
                                    </div>
                                </div>


                               
                           <ul id="mainnav-menu" class="list-group">
                        
                                    <!--Category name-->
                                    <li class="list-header">Navigation</li>
                        
                                    <!--Menu list item-->
                                    <li class="active-link">
                                        <a href="index.php">
                                            <i class="fa fa-tachometer"></i>
                                            <span class="menu-title">
                                                <strong>Timeline</strong>
                                            </span>
                                        </a>
                                    </li>                       
                        
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bar-chart"></i>
                                            <span class="menu-title">Health Summary</span>
                                        </a>
                                    </li>
                                     <li>
                                        <a href="prescription.php">
                                            <i class="fa fa-pencil-square-o"></i>
                                            <span class="menu-title">Prescription</span>
                                        </a>
                                    </li>
    
                        
                                    <!--Menu list item-->
                                     <li>
                                        <a href="#">
                                            <i class="fa fa-heart"></i>
                                            <span class="menu-title">Vitals</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="bloodpressure.php"><img src="assets/bp.png" height="15" width="15"> Blood Pressure</a></li>
                                            <li><a href="bodytemperature.php"><img src="assets/bt2.png" height="15" width="15"> Body Temperature</a></li>
                                            <li><a href="heartrate.php"><img src="assets/hr2.png" height="15" width="15"> Heart Rate</a></li>
                                            <li><a href="respiratoryrate.php"><img src="assets/rr2.png" height="15" width="15"> Respiratory Rate</a></li>                                     
                                        </ul>
                                    </li>
                        
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-plus-square"></i>
                                            <span class="menu-title">Add Records</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="allergies.php"><i class="fa fa-pagelines"></i>Allergies</a></li>
                                            <li><a href="problem.php"><i class="fa fa-stethoscope"></i>Problems</a></li>
                                            <li><a href="immunization.php"><img src="assets/imm2.png" height="15" width="15"> Immunizations</a></li>
                                            <li><a href="medication.php"><i class="fa fa-medkit"></i>Medications</a></li>
                                            <li><a href="procedure.php"><img src="assets/pr3.png" height="15" width="15"> Procedures</a></li>
                                            <li><a href="lab_test.php"><i class="fa fa-flask"></i>Lab Tests</a></li>
                                            <li><a href="activities.php"><img src="assets/act2.png" height="15" width="15"> Activities</a></li>
                                            <li><a href="bmi.php"><img src="assets/bmi2.png" height="15" width="15"> BMI</a></li>
                                            <li><a href="spo2.php"><img src="assets/sp.png" height="15" width="15"> SpO2</a></li>
                                            <li><a href="blood_glucose.php"><img src="assets/bg2.png" height="15" width="15"> Blood Glucose</a></li>                                          
                                        </ul>
                                    </li>
                        
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-files-o"></i>
                                            <span class="menu-title">Reports</span>
                                        </a>
                        
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="page-invoice.html">Invoice</a></li>
                                            <li><a href="page-login.html">Login</a></li>
                                            <li><a href="page-register.html">Register</a></li>
                                            <li><a href="page-lock.html">Lock Screen</a></li>
                                            <li><a href="page-404.html">Error 404</a></li>
                                            <li><a href="page-500.html">Error 500</a></li>
                                            <li><a href="page-pricing.html">Pricing Table</a></li>
                                            <li><a href="page-search.html">Search Result</a></li>
                                            <li><a href="page-sidebar.html">Sidebar Page</a></li>
                                            <li><a href="page-user-profile.html">User Profile</a></li>
                                            <li><a href="page-blank-1.html">Blank Page</a></li>
                                            
                                        </ul>
                                    </li>
                        
                               
                                        </ul>
                                    </div>
                                </div>
                                <!--================================-->
                                <!--End widget-->

                          
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->
        
        </div>
        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pull-right">
                You have <a href="#" class="text-bold text-main"><span class="label label-danger">3</span> pending action.</a>
            </div>




            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2020 Copyright Aarogya HealthCard</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->


    
    
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    
    </div>
    <!--JAVASCRIPT-->
    <!--=================================================-->
    <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">var plugin_path = 'assets/plugins/index.html';</script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/jais.js"></script>
    <script src="assets/js/demo/jais-demo.min.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script>
         $(function() {
            $( "#datepicker-1" ).datepicker();
         });
         $(function() {
            $( "#datepicker-2" ).datepicker();
         });
          $("#dropdown1").hide();
         function sel(x)
         {
            if(x==1)
                 $("#dropdown1").hide();
                
            else
                 $("#dropdown1").show();
         }
      </script> 
    
</body>

<!-- Mirrored from www.ravijaiswal.com/Jais_admin/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 04 Aug 2017 15:25:58 GMT -->
</html>
