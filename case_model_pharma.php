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
											
											<li class="active">
												<a href="#jtab2_nobg" data-toggle="tab">
													<i class="glyphicon glyphicon-tint"></i> Pharmacy
												</a>
											</li>
											
										</ul>

										<!-- tabs content -->
										<div class="tab-content transparent">

											<div id="jtab2_nobg" class="tab-pane  active">
												<form method="post">
													<fieldset>
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
														<div class="row">
														<input type="hidden" class="hcase" name="case" value="<?php echo $caseid; ?>">
													<?php 
														
													echo '<input type="submit" name="save" class="btn btn-primary btn-lg btn-block" value="Save Details">'
													?>
												</div>
													</fieldset>
												</form>
											</div>
										</div>

									</div>
										</div>