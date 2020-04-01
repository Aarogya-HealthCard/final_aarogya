<?php
require 'db.php';
session_start();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="assets/plugins/scanner/bootstrap.min.css">

<title>QR Code Scanner Example</title>
</head>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if( $_SESSION['logged_in']==true){
				$number = $_POST['cardid'];
      			$result = $mysqli->query( "SELECT * FROM u_gen_info WHERE u_id=$number" );
				if ( $result->num_rows == 0 ) { 
					print("User does'n exist!!");
				}
				else { 
					$user = $result->fetch_assoc();
					$_SESSION['uid']=$user['u_id'];
					$_SESSION['ufullname']=$user['fname'].' '.$user['l_name'];
					$_SESSION['ugender'] = $user['gender'];
					$_SESSION['udob'] = $user['dob'];
					header( "location: dashboard.php" );
				}
			}
			else{
				header( "location: login.php" );
			}
		}
?>
<body>
	<header class="header_sticky">	
		<div class="container">
					<div id="logo" align="center">
						<a href="index.html" title="Aarogya"><img src="img/aarog2.png" data-retina="true" alt="" width="275" height="40"></a>
					</div>	
		</div>		<!-- /container -->
	</header>
	<div class="container" style="text-align: center;background-color: #3f4079; color: white">
		<h1> Scan the QR code </h1>
		<br><br>

		<div id="qr" style="display: inline-block; width: 600px; height: 450px; border: 1px solid silver"></div>
		<br><br>

		<div class="row">
			<button id="scan" class="btn btn-success btn-sm">start scaning</button>
			<button id="stop" class="btn btn-warning btn-sm disabled">stop scanning</button>
			<button id="change" class="btn btn-warning btn-sm disabled">change camera</button>
		</div>
		<br><br>
		<div class="row">
			<div class="col-md-12">
				<code>Click "Start Scanning" to <b>start scanning QR Code</b></code>
				<br>
				<span class="feedback" style="margin: 10px; display: inline-block"></span>
			</div>
		</div>
		<form method="post">
			<input type="hidden" id="cardid" name="cardid" value="0">
		</form>
	</div>
</body>

<script src="assets/plugins/scanner/jquery.js"></script>
<script src="assets/plugins/scanner/jsqrcode-combined.js"></script>
<script src="assets/plugins/scanner/html5-qrcode.js"></script>
<script>
$(document).ready(function() {
	$("#scan").on('click', function() {
		$("code").html('scanning');
		$('#qr').html5_qrcode(function(data){
		         // do something when code is read
		         $(".feedback").html('<img src="assets/plugins/scanner/yes.png" style="height: 20px"> Code scanned as: <strong>' +data +'</strong>');
				 $('#cardid').val(data);
				 $("form").submit();
		    },
		    function(error){
		        //show read errors 
		        $(".feedback").html('<img src="assets/plugins/scanner/no.png" style="height: 20px"> Unable to scan the code! Error: ' +error)
		    }, function(videoError){
		        //the video stream could be opened
		        $(".feedback").html('<img src="assets/plugins/scanner/no.png" style="height: 20px"> Video error');
		    }
		);

		$("#scan").addClass('disabled');
		$("#stop").removeClass('disabled');
		$("#change").removeClass('disabled');
	});

	$("#stop").on('click', function() {
		$("#qr").html5_qrcode_stop();
		$("code").html('Click "Start Scanning" to <b>start scanning QR Code</b>');

		$("#scan").removeClass('disabled');
		$("#stop").addClass('disabled');
		$("#change").addClass('disabled');
		$(".feedback").html("");
	});
	$("#change").on('click', function() {
		$("#qr").html5_qrcode_changeCamera();

		$("#scan").addClass('disabled');
		$("#stop").removeClass('disabled');
	});
});
	
</script>
</html>