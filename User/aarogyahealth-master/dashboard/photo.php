<?php include "includes/dbconnect.php"; ?>
<?php
include('../LOGIN-SIGNUP/session.php'); ?>


<?php
  # code...
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['coverImage']['tmp_name'])) {
$sourcePath = $_FILES['coverImage']['tmp_name'];
$targetPath = "images/cover_photo/".$_FILES['coverImage']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img class="image-preview" src="<?php echo $targetPath; ?>" class="upload-preview" />
<?php
$query1="UPDATE user SET header_photo='$targetPath' WHERE user_id=".$_SESSION['user_id'];
$result=mysqli_query($connection,$query1);
if ($result) {
  echo "Success";
}
else {
  echo "Failed".mysqli_error($connection);
}

}}
}

?>
