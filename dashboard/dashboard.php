<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ravijaiswal.com/Jais_admin/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 04 Aug 2017 15:24:40 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile | Aarogya HealthCard</title>


    <!--STYLESHEET-->
    <!--=================================================-->

	
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/jais.css" rel="stylesheet">
    <link href="assets/css/demo/jais-demo-icons.css" rel="stylesheet">
    <!-- <link href="assets/css/demo/jais-demo.css" rel="stylesheet"> -->

</head>
<?php
	
	$uid=$_SESSION['uid'];
	$docid=$_SESSION['login_id'];
	
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$date= date('Y-m-d H:i:s');
		
		if(isset($_POST['create'])){
			$mysqli->query("INSERT INTO u_case(u_id,doc_id,place,c_date) VALUES($uid,$docid,'Harmony','$date')");
		}
		if(isset($_POST['save'])){
			$caseid=$_POST['case'];
			$obs=$_POST['observations'];
			$dia=$_POST['diagnosis'];
			$ins=$_POST['investigation'];
			$med=$_POST['medications'];
			$pln=$_POST['plan'];
			$dis=$_POST['disease'];
			if($mysqli->query("INSERT INTO prescription(u_case_id,observations,diagnosis,investigation,medications,plan,disease) VALUES($caseid,'$obs','$dia','$ins','$med','$pln','$dis')")){
				echo"Inserted";
			}
			else{
				echo("Error:".$mysqli->error);
			}
		}
		else{
			echo"ERROR";
		}
		
		
		
	}
?>
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg" style="padding-bottom: 40px">
        
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
                                <div class="username hidden-xs"><?php print($_SESSION['doctor_name']); ?></div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                                <!-- Dropdown heading  -->
                                <div class="pad-all bord-btm">
                                    <ul class="head-list">
                                    <li>
                                        <a href="profile.html">
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

						INFO: 	panel collapse - stored on user localStorage (handled by app.js _panels() function).
								All pannels should have an unique ID or the panel collapse status will not be stored!
					-->
					<form method="post">
						<input type="submit" name="create" class="btn btn-primary btn-lg" value="Create Case" onClick="javascript:alert();">
					</form>
					
					<hr>
					<?php
						$result = $mysqli->query("SELECT * from u_case WHERE u_id=$uid ORDER BY c_date DESC" );
						
						if(mysqli_num_rows($result)>0)
						{
							WHILE($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
								echo '<a class="openCase" data-toggle="modal" data-target=".bs-example-modal-lg" data-id="'.$row['u_case_id'].'"><div class="col-md-9">
								
					<div class="panel-default" style="padding:5px;">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>Case ID#'.$row['u_case_id'].'</strong> <!-- panel title -->
								
								<small class="size-12 weight-300 text-mutted hidden-xs">'.$row['c_date'].'</small>
								
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

							<strong>Doctor\'s Name: Dr</strong><br>
							<strong>Hospital Name:</strong><br>
							<strong>Disease</strong><br>
							<small class="size-12 weight-300 text-mutted hidden-xs">Details of Case</small>
						</div>
						<!-- /panel content -->
						
					</div>
					</div>
					</a></form>';
							}
							
						}
						else{
							echo'<p align="center">No cases to display. Create a new one.</p>';
						}
					?>
					
					<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">

										<!-- header modal -->
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myLargeModalLabel">Case Details<?php print_r($_POST); ?></h4>
										</div>

										<!-- body modal -->
										<div class="modal-body">
											<div class="tabs nomargin">

										<!-- tabs -->
										<ul class="nav nav-tabs nav-justified">
											<li class="active">
												<a href="#jtab1_nobg" data-toggle="tab">
													<i class="glyphicon glyphicon-plus-sign"></i> Prescription
												</a>
											</li>
											<li class="">
												<a href="#jtab2_nobg" data-toggle="tab">
													<i class="glyphicon glyphicon-tint"></i> Medications
												</a>
											</li>
											<li class="">
												<a href="#jtab3_nobg" data-toggle="tab">
													<i class="glyphicon glyphicon-duplicate"></i> Lab Reports
												</a>
											</li>
										</ul>

										<!-- tabs content -->
										<div class="tab-content transparent">
											<div id="jtab1_nobg" class="tab-pane active">
												<form method="post">
													<fieldset>
														
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Observations</label>
															<textarea name="observations" rows="4" class="form-control required"></textarea>
														</div>
													
														<div class="col-md-6 col-sm-6">
															<label>Clinical examination & Diagnosis</label>
															<textarea name="diagnosis" rows="4" class="form-control required"></textarea>
														</div>
													</div>
												</div>
												<div class="row">
												<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Investigation</label>
															<textarea name="investigation" rows="4" class="form-control required"></textarea>
														</div>
													
														<div class="col-md-6 col-sm-6">
															<label>Inscription/ Medications</label>
															<textarea name="medications" rows="4" class="form-control required"></textarea>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Plan of care & treatment</label>
															<textarea name="plan" rows="4" class="form-control required"></textarea>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Diagonised Disease/Problem</label>
															<input type="text" name="disease" value="" class="form-control required">
														</div>														
													</div>
												</div>
												
												<div class="row">
													<input type="hidden" class="hcase" name="case" value="">
													<input type="submit" name="save" class="btn btn-primary btn-lg btn-block" value="Save Details">
												</div>
													</fieldset>
												</form>
											</div>

											<div id="jtab2_nobg" class="tab-pane">
												<form>
													<fieldset>
														<div class="row">
															<label class="checkbox">
																<input type="checkbox" value="1">
																<i></i> Medicine 1
															</label>
														</div>
														<div class="row">
															<label class="checkbox">
																<input type="checkbox" value="1">
																<i></i> Medicine 2
															</label>
														</div>
														<div class="row">
															<label class="checkbox">
																<input type="checkbox" value="1">
																<i></i> Medicine 3
															</label>
														</div>
														<div class="row">
															<label class="checkbox">
																<input type="checkbox" value="1">
																<i></i> Medicine 4
															</label>
														</div>
														<div class="row">
															<label class="checkbox">
																<input type="checkbox" value="1">
																<i></i> Medicine 5
															</label>
														</div>
														<div class="row">
													<button type="button" class="btn btn-primary btn-lg btn-block">Save Details</button>
												</div>
													</fieldset>
												</form>
											</div>
											<div id="jtab3_nobg" class="tab-pane">
											<form>
													<fieldset>
														
												
											<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Test Name</label>
															<input type="text" name="contact[first_name]" value="" class="form-control required">
														</div>														
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Observations</label>
															<input type="text" name="contact[first_name]" value="" class="form-control required">
														</div>														
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12">
															<label>
																Test Report 
																<small class="text-muted">Scaned Copy</small>
															</label>

															<div class="fancy-file-upload fancy-file-info">
																<i class="fa fa-upload"></i>
																<input type="file" class="form-control" name="contact[attachment]" onchange="jQuery(this).next('input').val(this.value);" />
																<input type="text" class="form-control" placeholder="no file selected" readonly />
																<span class="button">Choose File</span>
															</div>
															<small class="text-muted block">Max file size: 10Mb (pdf/jpg/png)</small>
														</div>
													</div>
												</div>
												<div class="row">
													<button type="button" class="btn btn-primary btn-lg btn-block">Save Details</button>
												</div>
												</fieldset>
												</form>
											</div>
										</div>

									</div>
										</div>

									</div>
								</div>
							</div>
					
					<!-- /PANEL -->




				</div>
                <!--===================================================-->
                <!--End page content-->


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
                                            <p class="mnp-name"><?php  print($_SESSION['ufullname']); ?></p>
											<span class="mnp-desc"><?php  print($_SESSION['ugender']); ?>, Age: <?php 
												$today = new DateTime();
												$birthdate = new DateTime($_SESSION['udob']);
												$int = $today->diff($birthdate);
												print($int->format('%y'));
												?></span>
                                        </a>
                                            <img class="img-circle img-sm img-border" src="assets/images/2.png" alt="Profile Picture">
                                        </div>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        <a href="index.php" class="list-group-item">
                                            <i class="glyphicon glyphicon-menu-left"></i> Clear Record
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
						
                                    <!--Menu list item-->
                                    
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="fa fa-pencil-square-o"></i>
						                    <span class="menu-title">Add Records</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
						                    <li><a href="form-elements.html">Allergies</a></li>
											<li><a href="form-masked-inputs.html">Problems</a></li>
											<li><a href="form-pickers.html">Immunizations</a></li>
											<li><a href="form-ui-sliders.html">Medications</a></li>
											<li><a href="form-validation.html">Procedures</a></li>
											<li><a href="form-html-editors.html">BMI</a></li>											
						                </ul>
						            </li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="#">
						                    <i class="fa fa-files-o"></i>
						                    <span class="menu-title">Reports</span>
						                </a>
						
						              
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
        
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        
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
	<script>
		$('.openCase').click(function(){
			var id=$(this).attr('data-id');
			jQuery.post("dashboard.php",{param:id},function(data){
				console.log(data);
			},'html');
			$('.hcase').val(id);
		});
	</script>
</body>

<!-- Mirrored from www.ravijaiswal.com/Jais_admin/index.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 04 Aug 2017 15:25:58 GMT -->
</html>
