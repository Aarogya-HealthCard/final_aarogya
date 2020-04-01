<?php
	require 'db.php';
	session_start();

	$caseid=$_GET['case'];
	$resultc = $mysqli->query("SELECT * from u_case WHERE u_case_id=$caseid");
	$rowc= $resultc->fetch_assoc();
	$result = $mysqli->query("SELECT * from prescription WHERE u_case_id=$caseid");
	$row= $result->fetch_assoc();
	$resultlab = $mysqli->query("SELECT * from lab_test WHERE u_case_id=$caseid");
	$rowlab= $resultlab->fetch_assoc();
	$resultph = $mysqli->query("SELECT * from pharmacy WHERE u_case_id=$caseid");
?>
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myLargeModalLabel">Case Details<?php echo $caseid; ?></h4>
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
															<textarea name="observations" rows="4" class="form-control required"><?php echo $row['observations'];?></textarea>
														</div>
													
														<div class="col-md-6 col-sm-6">
															<label>Clinical examination & Diagnosis</label>
															<textarea name="diagnosis" rows="4" class="form-control required"><?php echo $row['diagnosis'];?></textarea>
														</div>
													</div>
												</div>
												<div class="row">
												<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Investigation</label>
															<textarea name="investigation" rows="4" class="form-control required"><?php echo $row['investigation'];?></textarea>
														</div>
													
														<div class="col-md-6 col-sm-6">
															<label>Plan of care & treatment</label>
															<textarea name="plan" rows="4" class="form-control required"><?php echo $row['plan'];?></textarea>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="form-group">
														<div class="col-md-6 col-sm-6">
															<label>Diagonised Disease/Problem</label>
															<input type="text" id="disease" name="disease" value="<?php echo $row['disease'];?>" class="form-control required">
														</div>														
													
														<div class="col-md-4 col-sm-4">
															<label>Next Visit</label>
															<input type="date" name="visit" value="" class="form-control">
														</div>
														<?php 
															if($rowc['status'] == "Closed"){
																if($rowc['doc_id'] == $_SESSION['login_id']){
																	echo '<div class="col-md-2 col-sm-2">
																		
																		<input type="submit" name="reopen" class="btn btn-primary btn-lg btn-block" value="Reopen">
																		
																	</div>';
																}
																
															}
															else{
																echo '<div class="col-md-2 col-sm-2">
															<label>Close Case</label>
															<input type="checkbox" name="status">
															
														</div>	';
															}
														?>
																												
													</div>
												</div>
												
												<div id="rep" class="row">
													<input type="hidden" class="hcase" name="case" value="<?php echo $caseid; ?>">
													<?php 
														if($row['status'] == 0)
													echo '<input type="submit" name="save" class="btn btn-primary btn-lg btn-block" value="Save Details">'
													?>
												</div>
													</fieldset>
												</form>
											</div>

											<div id="jtab2_nobg" class="tab-pane">
												<form>
													<?php
													if(mysqli_num_rows($resultph)>0)
													{
														WHILE($rowmed= mysqli_fetch_array($resultph,MYSQLI_ASSOC)){
															
														echo'<div class="row">
															<label class="checkbox">
																<input type="checkbox" name="medics[]" value="'.$rowmed['p_medicine'].'" ';
															if($rowmed['m_status'] == 1){
																	echo 'checked="true"';
																}
															echo '.">
																<i></i>'.$rowmed['p_medicine'].'
															</label>
														</div>';
														}
													}
														else{
															echo "<p>No medicines to display</p>";
														}
														?>
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
															<input type="text" name="contact[first_name]" value="<?php echo $rowlab['t_name'];?>" class="form-control required">
														</div>														
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Observations</label>
															<input type="text" name="contact[first_name]" value="<?php echo $rowlab['t_notes'];?>" class="form-control required">
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
															<?php
																if($rowlab['status'] == 1){
																echo '<img src="upload/'.$rowlab['t_img'].'">';
																}
															?>
															</div>
															
														</div>
													</div>
												</div>
												
												</fieldset>
												</form>
											</div>
										</div>

									</div>
										</div>
										