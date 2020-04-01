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
            $medicine=$_POST['medicine'];
            $udate=$_POST['udate'];
            $Strength=$_POST['u_date'];
            $u_phone=$_POST['u_phone'];
            $u_address=$_POST['u_address'];
            $notes=$_POST['notes'];
            $query=$mysqli->query("INSERT INTO  u_medication(u_id,u_,u_doctor,u_date,u_phone,u_address,notes,) VALUES ('$uid','$u_hospital','$u_doctor','$u_date','$u_phone','$u_address','$notes','$')");
            
           
        }
    }
    $result=$mysqli->query("SELECT * from u_medication");
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
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

                    <!-- 
                        PANEL CLASSES:
                            panel-default
                            panel-danger
                            panel-warning
                            panel-info
                            panel-success

                        INFO:   panel collapse - stored on user localStorage (handled by app.js _panels() function).
                                All pannels should have an unique ID or the panel collapse status will not be stored!
                    -->
                    <div id="panel-1" class="panel panel-default">
                        <div class="panel-heading">
                            <span class="title elipsis">
                                <strong style="text-transform: uppercase;font-weight: bold;">Medication</strong>
                                 <!-- panel title -->
                            </span>
                            
                            <!-- right options -->
                            
                            <ul class="options pull-right list-inline">
                                <li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
                                <li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
                            </ul>
                            <!-- /right options -->

                        </div>

                        <!-- panel content -->
                        <div class="panel-body">
                            <h4>It contains medication that you have added.</h4>
                        </div>
                        <!-- /panel content -->
                    </div>
                    <!-- /PANEL -->




                <p>Please add your medication details here.</p>
                <!--===================================================-->
                <!--End page content-->
                

                    <div id="panel-1" class="panel panel-default" >
                        <div class="panel-heading">
                               <div id="page-title">
                                
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ADD MEDICATION</button>
                            <div class="modal fade" id="myModal" role="dialog" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">ADD MEDICATION</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <form> 
                                                <div class="table-responsive">  
                                                <table class="table"  id="dynamic_field"> 
                                                   <tr> 
                                                   <td>          
                                                 <label for="inputEmail4">Medicine:</label>
                                                 <input type="text" name="u_med[]" class="form-control" placeholder="Medicine">
                                                    </td>
                                                    <td>
                                                 <label for="inputEmail4">Strength:</label>
                                                 <input type="text" name="u_strength[]" class="form-control" placeholder="Strength">
                                                    </td>
                                                  <td>
                                                    <label for="inputDosage4">Dosage:</label>
                                                    <input type="number" class="form-control" name="u_dosage[]" min="1" name="dose" id="dose" placeholder="Pills/Drops/Tsp">
                                                    </td>
                                                    <td>
                                                        <label>Duration:</label>
                                                        <select class="form-control">
                                                            <option value="Day">Day</option>
                                                            <option value="Noon">Noon</option>
                                                            <option value="Night">Night</option>
                                                            <option value="Day-Night">Day-Night</option>
                                                            <option value="Day-Noon-Night">Day-Noon-Night</option>
                                                        </select>
                                                 </td>
                                                <td>
                                                <button type="button" style="margin-top: 15px;border-radius: 60%; font-size: 20px" name="add" id="add" class="btn btn-success pull-right">+</button>  </td>
                                                </tr>
                                                </table>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        </div>                              
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="button" class="btn btn-primary">ADD</button>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <!--Searchbox-->
                    <br>
                    
                    <div class="searchbox">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search Medicine..">
                            <span class="input-group-btn">
                                <button class="text-muted" type="button"><i class="demo-pli-magnifi-glass"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                                             
                            <!-- /right options -->                           
                        </div>
                        
                        <!-- panel content -->
                        <div class="panel-body">

                            <div id="flot-sales" class="fullwidth height-250">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Entered by</th>
                                            <th>Prescribed On</th>
                                            <th>Medicine</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="8" class="text-center">Nothing added</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>

                        </div>
                        <!-- /panel content -->
                    </div>
                    <!-- /PANEL -->

                </div>

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
            
            
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
                                        <a href="viewprofile.html" class="list-group-item">
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
                                        <a href="index.html">
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
                                        <a href="prescription.html">
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
                                            <li><a href="bloodpressure.html"><img src="assets/bp.png" height="15" width="15"> Blood Pressure</a></li>
                                            <li><a href="bodytemperature.html"><img src="assets/bt2.png" height="15" width="15"> Body Temperature</a></li>
                                            <li><a href="heartrate.html"><img src="assets/hr2.png" height="15" width="15"> Heart Rate</a></li>
                                            <li><a href="respiratoryrate.html"><img src="assets/rr2.png" height="15" width="15"> Respiratory Rate</a></li>                                     
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
                                            <li><a href="allergies.html"><i class="fa fa-pagelines"></i>Allergies</a></li>
                                            <li><a href="problem.html"><i class="fa fa-stethoscope"></i>Problems</a></li>
                                            <li><a href="immunization.html"><img src="assets/imm2.png" height="15" width="15"> Immunizations</a></li>
                                            <li><a href="#"><i class="fa fa-medkit"></i>Medications</a></li>
                                            <li><a href="procedure.html"><img src="assets/pr3.png" height="15" width="15"> Procedures</a></li>
                                            <li><a href="lab_test.html"><i class="fa fa-flask"></i>Lab Tests</a></li>
                                            <li><a href="activities.html"><img src="assets/act2.png" height="15" width="15"> Activities</a></li>
                                            <li><a href="bmi.html"><img src="assets/bmi2.png" height="15" width="15"> BMI</a></li>
                                            <li><a href="spo2.html"><img src="assets/sp.png" height="15" width="15"> SpO2</a></li>
                                            <li><a href="blood_glucose.html"><img src="assets/bg2.png" height="15" width="15"> Blood Glucose</a></li>                                          
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
            $( "#dateMd" ).datepicker();
         });

        $("#month1").hide();
        $("#week1").hide();
        $("#day1").hide();
         function hide_showtb()
          {
                var select_status=$('#duration').val();
                if (select_status=='day') {
                    $('#day1').show();
                    $('#week1').hide();
                    $('#month1').hide();
                }
                else if (select_status=='week') {
                    $('#week1').show();
                    $('#day1').hide();
                    $('#month1').hide();
                }
                else
                {
                    $('#month1').show();
                    $('#week1').hide();
                    $('#day1').hide();
                }
         }

         $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="u_med[]" placeholder="Medicine" class="form-control name_list" /></td><td> <input type="text" name="u_strength[]" class="form-control" placeholder="Strength"></td><td><input type="number" class="form-control" name="u_dosage[]" min="1" name="dose" id="dose" placeholder="Pills/Drops/Tsp"></td><td><select class="form-control"><option value="Day">Day</option> <option value="Noon">Noon</option><option value="Night">Night</option><option value="Day-Night">Day-Night</option><option value="Day-Noon-Night">Day-Noon-Night</option> </select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
      </script> 

</body>

<!-- Mirrored from www.ravijaiswal.com/Jais_admin/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 04 Aug 2017 15:25:58 GMT -->
</html>
