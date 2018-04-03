<!--This is the Register backend Page-->
<?php
include('config.php');
if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
	
	$insert="INSERT INTO registertbl (email,username,hashedpassword)
			VALUES (:email,:username,:hashedpassword)";
			
	$statement = $connection->prepare($insert);
	
	$statement -> bindValue(":email",$email, PDO::PARAM_STR);
	$statement -> bindValue(":username",$username, PDO::PARAM_STR);
	$statement -> bindvalue(":hashedpassword",$hashedpassword, PDO::PARAM_STR);
	$statement -> execute();
}
header('location:welcome.html');
?>