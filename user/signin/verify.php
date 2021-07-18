<?php

session_start();

include("../../config.php");

if (isset($_POST["loginbtn"]))
{
	$c_username=$_POST["c_username"];
	$c_password=($_POST["c_password"]);
    $sql = "SELECT * from customer where c_username = '$c_username' and c_password = '$c_password' ";
	
	$result = mysqli_query($db, $sql);
	
	
	if ($row = mysqli_fetch_assoc($result))
	{
		$_SESSION['c_username'] = $row["c_username"];
		$_SESSION['c_id'] = $row["c_id"];
			
		header("Location:../index/index.php");

	}
	else
	{	
		header('Location: signin.php?err');
		
	}
	
}

?>