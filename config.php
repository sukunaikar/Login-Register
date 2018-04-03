<!--Thsi is the Database Connection-->
<?php 
$dsn="mysql:host=localhost; dbname=demo";
$username="root";
$password=" ";
try
{
	$connection=new PDO($dsn, $username, $password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "Query Failed." . $e->getMessage();
}
?>
