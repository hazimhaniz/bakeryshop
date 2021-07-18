<?php
include("../../config.php");
session_start();

if(isset($_REQUEST["product_id"]))
{
	$pid = $_REQUEST["product_id"];
	$sql="SELECT available from product where product_id =".$pid;
	$result=mysqli_query($db,$sql);
	$row=mysqli_num_rows($result);

	while($row = mysqli_fetch_assoc($result))
     { 
if($row['available']=="available")
{
$up = "UPDATE product SET available = 'unavailable' WHERE product_id = ".$pid;
}
else if($row['available']="unavailable")
{
$up2 = "UPDATE product SET available = 'available' WHERE product_id = ".$pid;
}
	
	if(mysqli_query($db,$up))
	{
		header("location:product.php");
	}
	else if(mysqli_query($db,$up2))
	{
		header("location:product.php");
	}

}
}


?>