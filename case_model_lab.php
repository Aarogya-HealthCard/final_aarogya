<?php
	require 'db.php';
	$caseid=$_GET['case'];
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
											
											<li  class="active">
												<a href="#jtab3_nobg" data-toggle="tab">
													<i class="glyphicon glyphicon-duplicate"></i> Lab Reports
												</a>
											</li>
										</ul>

										<!-- tabs content -->
										<div class="tab-content transparent">

											<div id="jtab3_nobg" class="tab-pane active">
											<form method="post" enctype="multipart/form-data">
													<fieldset>
														
												
											<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Test Name</label>
															<input type="text" name="test_name" value="<?php echo $rowlab['t_name'];?>" class="form-control required">
														</div>														
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12 col-sm-12">
															<label>Observations</label>
															<input type="text" name="test_notes" value="<?php echo $rowlab['t_notes'];?>" class="form-control required">
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

															
															<?php
																if($rowlab['status'] == 0){
																	echo '<div class="fancy-file-upload fancy-file-info"><i class="fa fa-upload"></i>
																<input type="file" class="form-control" name="image" onchange="jQuery(this).next(\'input\').val(this.value);" />
																<input type="text" name="imgname" class="form-control" placeholder="no file selected" readonly />
																<span class="button">Choose File</span>
																</div>
																<small class="text-muted block">Max file size: 10Mb (pdf/jpg/png)</small>';
																}
																else{
																	echo '<div class="row"><img src="upload/'.$rowlab['t_img'].' " width="450px" height="450px"></div>';
																}
																
															?>
															
															
														</div>
													</div>
												</div>
												<div class="row">
												<input type="hidden" class="hcase" name="case" value="<?php echo $caseid; ?>">
													<?php 
														if($rowlab['status'] == 0)
													echo '<input id="imgsave" type="submit" name="save" class="btn btn-primary btn-lg btn-block" value="Save Details">'
													?>
												</div>
												</fieldset>
												</form>
											</div>
										</div>

									</div>
										</div>