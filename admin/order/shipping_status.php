<?php
include("../../config.php");
session_start();

if(isset($_REQUEST["o_id"]))
{
	$oid = $_REQUEST["o_id"];
	$shp="UPDATE orders SET shipping ='Delivered' where id=".$oid;
	

	
	if(mysqli_query($db,$shp))
	{
		header("location:order.php");
	}
	else
	{
		header("location:order.php");
	}

}



?>