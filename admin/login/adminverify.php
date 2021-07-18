<?php

session_start();

include("../../config.php");

if (isset($_POST["loginbtn"]))
{
	$an=$_POST["an"];
	$ap=$_POST["ap"];
    
    $sql = "SELECT * from admin where admin_name = '$an' and admin_password = '$ap' ";
	
	$result = mysqli_query($db, $sql);
	
	
	if ($row = mysqli_fetch_assoc($result))
	{
		$_SESSION["admin_name"]= $row["admin_name"];
		$_SESSION["admin_password"] = $row["admin_password"];
			
		header("Location: ../product/product.php");
	}
	else
	{	
		mysqli_close($db);
		header("Location:login.php?err=loginerr");
	}
	
}

?>