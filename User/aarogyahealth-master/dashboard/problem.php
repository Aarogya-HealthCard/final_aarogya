<?php
session_start();
?>
<?php include "C:/xampp/htdocs/New folder/aarogyahealth-master/dashboard/dbconnect.php"?>
<?php 
$uid=$_SESSION['u_id'];
$my=$mysqli->query("SELECT u_id from u_gen_info WHERE u_id='$uid'");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])){
            $uproblem=$_POST['uproblem'];
            $choice=$_POST['choice'];
            $udate=$_POST['udate'];
            $diagnosis=$_POST['diagnosis'];
            $note=$_POST['note'];
            $query=$mysqli->query("INSERT INTO  u_problem(u_id,uproblem,choice,udate,diagnosis,notes) VALUES ('$uid','$uproblem','$choice','$udate','$diagnosis','$note')");
           
        }
    }
    $disp=$mysqli->query("SELECT * from u_problem");
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
                                <strong style="text-transform: uppercase;font-weight: bold;">Problem</strong>
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
                            <h4>It contains problems that you have added.</h4>
                        </div>
                        <!-- /panel content -->
                    </div>
                    <!-- /PANEL -->




                <p>Please add your problem details here.</p>
                <!--===================================================-->
                <!--End page content-->
                

                    <div id="panel-1" class="panel panel-default" >
                        <div class="panel-heading">
                               <div id="page-title">
                                
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ADD PROBLEM</button>
                                 <div class="modal fade" id="myModal" role="dialog" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">ADD PROBLEM</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                           <!-- <div style="border-top: 1px solid blue;border-bottom: 1px solid blue;width: 100%">
                                            <a class="a1" href="#">A</a>
                                            <a class="a1" href="#">B</a>
                                            <a class="a1" href="#">C</a>
                                            <a class="a1" href="#">D</a>
                                            <a class="a1" href="#">E</a>
                                            <a class="a1" href="#">F</a>
                                            <a class="a1" href="#">G</a>
                                            <a class="a1" href="#">H</a>
                                            <a class="a1" href="#">I</a>
                                            <a class="a1 ln-disabled" href="#">J</a>
                                            <a class="a1" href="#">K</a>
                                            <a class="a1" href="#">L</a>
                                            <a class="a1" href="#">M</a>
                                            <a class="a1" href="#">N</a>
                                            <a class="a1" href="#">O</a>
                                            <a class="a1" href="#p">P</a>
                                            <a class="a1 ln-disabled" href="#">Q</a>
                                            <a class="a1" href="#">R</a>
                                            <a class="a1" href="#">S</a>
                                            <a class="a1" href="#">T</a>
                                            <a class="a1" href="#">U</a>
                                            <a class="a1" href="#">V</a>
                                            <a class="a1" href="#">W</a>
                                            <a class="a1 ln-disabled" href="#">X</a>
                                            <a class="a1 ln-disabled" href="#">Y</a>
                                            <a class="a1 ln-disabled" href="#">Z</a>                            
                                            </div><br>-->
                                                <select class="form-control" id="prblm" name="choice1">
                                                    <option value="Select">Select one</option>
                                                    <option value="Acne">Acne</option>
                                                    <option value="Adhd">Adhd</option>
                                                    <option value="Alcohol Addiction">Alcohol Addiction</option>
                                                    <option value="Allergies">Allergies</option>
                                                    <option value="Alzheimer">Alzheimer</option>
                                                    <option value="Amoebiasis">Amoebiasis</option>
                                                    <option value="Anaemia">Anaemia</option>
                                                    <option value="Anaesthesia-Local">Anaesthesia-Local</option>
                                                    <option value="Anaesthesia General">Anaesthesia General</option>
                                                    <option value="Angina">Angina</option>
                                                    <option value="Anxiety">Anxiety</option>
                                                    <option value="Appetite">Appetite</option>
                                                    <option value="Arrhythmiasis">Arrhythmiasis</option>
                                                    <option value="Arthritis">Arthritis</option>
                                                    <option value="Asthma/Copd">Asthma/Copd</option>
                                                    <option value="Auto Immune Disease">Auto Immune Disease</option>
                                                    <option value="Ayurvedic Medicine">Ayurvedic Medicine</option>
                                                    <option value="Bladder And Prostate Disorders">Bladder And Prostate Disorders</option>
                                                    <option value="Bleeding Disorders">Bleeding Disorders</option>
                                                    <option value="Blood Clot">Blood Clot</option>
                                                    <option value="Bone Metabolism">Bone Metabolism</option>
                                                    <option value="Cancer/Oncology">Cancer/Oncology</option>
                                                    <option value="Cholelithiasis/Gall Stones">Cholelithiasis/Gall Stones
                                                    </option>
                                                    <option value="Cleanser">Cleanser</option>
                                                    <option value="Constipation">Constipation</option>
                                                    <option value="Contraception">Contraception</option>
                                                    <option value="Cough And Cold">Cough And Cold</option>
                                                    <option value="Dandruff">Dandruff</option>
                                                    <option value="Depression">Depression</option>
                                                    <option value="Diabetes">Diabetes</option>
                                                    <option value="Diarrhoea">Diarrhoea</option>
                                                    <option value="Digestion">Digestion</option>
                                                    <option value="Dry Eye">Dry Eye</option>
                                                    <option value="Dry Skin">Dry Skin</option>
                                                    <option value="Ear Conditions">Ear Conditions</option>
                                                    <option value="Epilepsy/Convulsion">Epilepsy/Convulsion</option>
                                                    <option value="Fever">Fever</option>
                                                    <option value="Fungal">Fungal</option>
                                                    <option value="Gastro Intestinal Motility Disorders">Gastro Intestinal Motility Disorders</option>
                                                    <option value="General">General</option>
                                                    <option value="Glaucoma">Glaucoma</option>
                                                    <option value="Gout">Gout</option>
                                                    <option value="Haematopoiesis">Haematopoiesis</option>
                                                    <option value="Haemorrhoid">Haemorrhoid</option>
                                                    <option value="Hair Loss">Hair Loss</option>
                                                    <option value="Heart Failure">Heart Failure</option>
                                                    <option value="Heart Medicines">Heart Medicines</option>
                                                    <option value="Hepatitis B Infection">Hepatitis B Infection</option>
                                                    <option value="High Cholesterol">High Cholesterol</option>
                                                    <option value="Hormonal Therapy">Hormonal Therapy</option>
                                                    <option value="Hyperpigmentation">Hyperpigmentation</option>
                                                    <option value="Hypertension">Hypertension</option>
                                                    <option value="Hyperthyroidism">Hyperthyroidism</option>
                                                    <option value="Hypnosis">Hypnosis</option>
                                                    <option value="Hypotension">Hypotension</option>
                                                    <option value="Idiopathic Pulmonary Fibrosis">Idiopathic Pulmonary Fibrosis</option>
                                                    <option value="Immune Sera">Immune Sera</option>
                                                    <option value="Immunoglobulins">Immunoglobulins</option>
                                                    <option value="Impotence/Erectile Dysfunction(Ed)">Impotence/Erectile Dysfunction(Ed)</option>
                                                    <option value="Infection">Infection</option>
                                                    <option value="Juvenile Spondyloarthropathy">Juvenile Spondyloarthropathy 
                                                    </option>
                                                    <option value="Juvenile Seronegative Polyarthritis">Juvenile Seronegative Polyarthritis </option>
                                                    <option value="Juvenile Seropositive Polyarthritis">Juvenile Seropositive Polyarthritis </option>
                                                    <option value="Kidney Disease/Stones">Kidney Disease/Stones</option>
                                                    <option value="Leprosy">Leprosy</option>
                                                    <option value="Liver Disease">Liver Disease</option>
                                                    <option value="Malaria">Malaria</option>
                                                    <option value="Migraine">Migraine</option>
                                                    <option value="Muscle Cramps/Spasticity">Muscle Cramps/Spasticity</option>
                                                    <option value="Muscle Spasm">Muscle Spasm</option>
                                                    <option value="Mydriasis">Mydriasis</option>
                                                    <option value="Nasal Congestion">Nasal Congestion</option>
                                                    <option value="Neuropathic Pain">Neuropathic Pain</option>
                                                    <option value="Nootropics And Neurotrophics">Nootropics And Neurotrophics
                                                    </option>
                                                    <option value="Oral Care">Oral Care</option>
                                                    <option value="Osteoporosis">Osteoporosis</option>
                                                    <option value="Other Eye Conditions">Other Eye Conditions</option>
                                                    <option value="Pain">Pain</option>
                                                    <option value="Parasitic Worms">Parasitic Worms</option>
                                                    <option value="Parkinson">Parkinson</option>
                                                    <option value="Peripheral Hypertension">Peripheral Hypertension</option>
                                                    <option value="Poisoning/Overdose">Poisoning/Overdose</option>
                                                    <option value="Prenature Ejaculation">Prenature Ejaculation</option>
                                                    <option value="Psoriasis/Seborrhea/Ichthyosis">Psoriasis/Seborrhea/Ichthyosis</option>
                                                    <option value="Psychosis">Psychosis</option>
                                                    <option value="Pyrexia">Pyrexia</option>
                                                    <option value="Rabies">Rabies</option>
                                                    <option value="Scabies">Scabies</option>
                                                    <option value="Schizophrenia">Schizophrenia</option>
                                                    <option value="Skin Infections">Skin Infections</option>
                                                    <option value="Smoking">Smoking</option>
                                                    <option value="Stretch Marks">Stretch Marks</option>
                                                    <option value="Sunscreen Preparations">Sunscreen Preparations</option>
                                                    <option value="Supplement">Supplement</option>
                                                    <option value="Surgicals">Surgicals</option>
                                                    <option value="Tetanus">Tetanus</option>
                                                    <option value="Thrombolysis">Thrombolysis</option>
                                                    <option value="Thrombotic Disorders">Thrombotic Disorders</option>
                                                    <option value="Tuberculosis">Tuberculosis</option>
                                                    <option value="Ulcer/Reflux/Flatulence">Ulcer/Reflux/Flatulence</option>
                                                    <option value="Ulcerative Colitis/Bowel Inflammatory Disease">Ulcerative Colitis/Bowel Inflammatory Disease</option>
                                                    <option value="Urinary Retention">Urinary Retention</option>
                                                    <option value="Uterus Conditions">Uterus Conditions</option>
                                                    <option value="Vaccines">Vaccines</option>
                                                    <option value="Vaginal Conditions">Vaginal Conditions</option>
                                                    <option value="Varicose Veins">Varicose Veins</option>
                                                    <option value="Vertigo">Vertigo</option>
                                                    <option value="Viral">Viral</option>
                                                    <option value="Vomitting/Emesis">Vomitting/Emesis</option>
                                                    <option value="Warts/Callauses/Other Skin Lesion">Warts/Callauses/Other Skin Lesion</option>
                                                    <option value="Weight Loss">Weight Loss</option>
                                                    <option value="Wound">Wound</option>
                                                    <option value="Zinc Adverse Reaction">Zinc Adverse Reaction</option>
                                                    <option value="Zonal Bullous Emphysema">Zonal Bullous Emphysema</option>
                                                    <option>Others</option>
                                                </select><br>
                                                  Can't find your problem?<input type="radio" value="Can't" onclick="sel(0)" 
                                                  id="rd"><br><br>
                                                  <input type="text" name="choice1" class="form-control" id="otherAnswer" placeholder="Enter problem">
                                        
                                        </div>                                   
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" data-dismiss="modal" id="showTxt" disabled>NEXT</button>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="myModal2" role="dialog" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title">ADD PROBLEM</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <form method="POST" action="">   
                                        <div class="modal-body">
                                                                
                                                 <label for="inputEmail4">Problem:</label>
                                                 <input type="text" name="uproblem" class="form-control" id="prb_dis" readonly="">
                                                 <br>
                                                 <label for="inputEmail4">Do you still have this problem?</label><br>
                                                 <input type="radio"  name="choice" value="Yes">Yes
                                                 <input type="radio"  name="choice" value="No">No
                                                 <br><br>
                                                 <label for="inputEmail4">Diagnosis Date:</label>
                                                 <input type="text" name="udate" class="form-control" placeholder="dd/mm/yy" id="datePb">
                                                 <br>
                                                 <label for="inputEmail4">Diagnosis by:</label>
                                                 <input type="text" name="diagnosis" class="form-control" placeholder="Doctor/Hospital Name">
                                                 <br>
                                                 <label for="inputEmail4">Notes:</label>
                                                 <textarea rows="3" cols="38"  name="note" class="form-control">
                                                 </textarea> 
                                           
                                        </div>                                   
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <input type="submit" name="submit" value="ADD" class="btn btn-primary">  
                                        </div>
                                         </form>
                                    </div>
                                </div>
                            </div>

                    <!--Searchbox-->
                    <br>
                    
                    <div class="searchbox">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..">
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
                                <?php
                               echo "<table class='table table-bordered table-hover'>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Problem</th>
                                            <th>Choice</th>
                                            <th>Date</th>
                                            <th>Diagnosis</th>
                                        </tr>";
                                        
                                        while($row=mysqli_fetch_array($disp))
                                        {
                                            echo "<tr>";
                                            echo "<td>".$row['pr_id']."</td>";
                                            echo "<td>".$row['uproblem']."</td>";
                                            echo "<td>".$row['choice']."</td>";
                                            echo "<td>".$row['udate']."</td>";
                                             echo "<td>".$row['diagnosis']."</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                        ?>
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
                                        <a href="viewprofile.php" class="list-group-item">
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
                                            <li><a href="#"><i class="fa fa-stethoscope"></i>Problems</a></li>
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
            $( "#datePb" ).datepicker();
         });

          (function() {
    
        var pr = document.getElementById('prblm');
        var e2 = document.getElementById('otherAnswer');


    function getSelectedOption(sel) {
        var opt;
        for ( var i = 0, len = pr.options.length; i < len; i++ ) {
            opt = pr.options[i];
            if ( opt.selected === true ) {
                break;
            }
        }
        return opt;
    }
     document.getElementById('showTxt').onclick = function () {
        // access text property of selected option
        var optionValue = pr.options[pr.selectedIndex].text;
        if(optionValue != "Select one")
            document.querySelector("#prb_dis").value = optionValue;
        else {
            var val = document.querySelector("#otherAnswer").value;
            document.querySelector("#prb_dis").value = val;
        }
    }
    
    }());
          $("#otherAnswer").hide();
          function sel(x)
         {
            if(x==1)
                 $("#otherAnswer").hide();
                
            else
                 $("#otherAnswer").show();
                 $('#prblm').prop("disabled", true);
                 $('#showTxt').prop("disabled", false);
         }

         $(document).ready(function () {
         $('#prblm').val("Select");
  
        $('#prblm').change(function () {
            selectVal = $('#prblm').val();
   
            if (selectVal == 0) {
            $('#showTxt').prop("disabled", true);
            }
            else {
            $('#showTxt').prop("disabled", false);
            $('#rd').prop("disabled", true);
            }
        })
  
        });

      
    </script> 

</body>

<!-- Mirrored from www.ravijaiswal.com/Jais_admin/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 04 Aug 2017 15:25:58 GMT -->
</html>
