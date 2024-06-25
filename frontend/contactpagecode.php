<?php
       
    
include ("../admin/dbconfig.php");

if (isset($_POST['send'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	if (!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {

		$sql = "INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
		$result = mysqli_query($conn, $sql);
    if($query_run){
      $_SESSION['success'] = "Your Data is DELETED.";
      header('Location: index.php' );
}
else{
    $_SESSION['status'] = "Your Data is Not DELETED.";
    header('Location: index.php' );
}
}
}
?>