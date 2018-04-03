<!--This is the Login backend Page-->
<?php session_start();?>
<?php
include('config.php');
	if(isset($_POST['submit']) && ($_POST['email']) && ($_POST['password']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
	}
		$a=$email;
		$b=$password;			
	$result = $connection->prepare("SELECT * FROM registertbl WHERE email=:email");
	$result->bindValue(":email", $email, PDO::PARAM_STR);
	$result->execute();
	$row = $result->fetch();  
	$c=$row['email'];
	$hashedpassword=$row['hashedpassword'];	
	if ($a===$c)
		{	
			if(password_verify($b,$hashedpassword))
			{	
				header('location:welcome.php');	
			}
			else
			{
				echo "Either Email or Password is Invalid.";
			}
		}
	else
	{
		echo "Either Email or Password is Invalid.";
	}		

if(is_array($row) && !empty($row))
{
	$validuser = $row['email'];
	$_SESSION['valid'] = $validuser;
	$_SESSION['id'] = $row['id'];			
} 
else 
{
	echo "Invalid email or password.";
	echo "<br/>";
	echo "<a href='login.html'>Go back</a>";
}
	if(!isset($_SESSION['valid']))
	{
	header('location:home.html');			
	}
?>
