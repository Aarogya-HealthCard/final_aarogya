<?php
require 'db.php';
session_start();
	if(is_array($_FILES)) {
		if(is_uploaded_file($_FILES['coverImage']['tmp_name'])) {
		$sourcePath = $_FILES['coverImage']['tmp_name'];
		$targetPath = "upload/".$_FILES['coverImage']['name'];
		move_uploaded_file($sourcePath,$targetPath);
		}
	}
?>