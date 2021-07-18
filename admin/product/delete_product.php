<?php
include("../../config.php");
session_start();

if(isset($_REQUEST["product_id"]))
{
	$pid = $_REQUEST["product_id"];
	$del="DELETE from product where product_id =".$pid;
	

	
	if(mysqli_query($db,$del))
	{
		header("location:product.php");
	}

}



?>