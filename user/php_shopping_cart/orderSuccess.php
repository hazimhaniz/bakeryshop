<?php session_start();
    if (empty($_SESSION['c_id']))
   {
      header('Location: ../signin/signin.php');
      // Immediately exit and send response to the client and do not go furthur in whatever script it is part of.
      exit();
   }
?>
<?php

include("../../config.php");
if(!isset($_REQUEST['id'])){
    header("Location: product.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success</title>
    <meta charset="utf-8">
    <style>
    

    .container{width: 100%;padding: 50px;}
    p{color: #34a853;font-size: 18px;}
    table tr td{padding: 10px 10px 10px 90px;
	font-family:cursive; border-style: groove;
}
table tr th{padding:10px 0px 20px 20px;
	font-family:garamond;
	font-size:20px;
border-style: groove;}
	table{
		border-style: groove;
	}
	.logo{width:330px; height:210px;margin-left:300px;margin-right:auto;border-radius: 10px;}
.logocontainer{top:4px;margin-bottom: 10px;}
.print{margin-left: 750px;}
.home{width:80px;height: 80px;margin-left: 10px;border-radius: 10px;}
    </style>


</head>
<body>
<div class="logocontainer">
					<img class="logo" src="../../png/logo1.png" alt="logo" >
			</div>
			<div>
				<a href="../index/index.php"><img class="home" src="../../png/home.png"></a>
			</div>
<div class="container">
    <h1>Order Status</h1>
    
    <?php
	  $osql= "SELECT DISTINCT product.product_id,product.product_pic,product.product_name,product.product_price,orders.total_price,order_items.quantity FROM order_items,orders,customer,product WHERE orders.id=order_items.order_id and order_items.product_id=product.product_id and order_items.order_id=".$_REQUEST['id'];
        $result = mysqli_query($db, $osql);
        $row= mysqli_num_rows($result);
        ?>
        <table >
        <tr>
								<th>product ID</th>
								<th>Product Picture</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								</tr
        <?php
	  			while($row = mysqli_fetch_assoc($result)){
							$image = $row["product_pic"];
							$price=$row["total_price"];
							?>   
						
							<tr>
							<td><?php echo  $row['product_id']?></td>
							<?php echo "<td><img src='../../admin/product/img/".$row['product_pic']."' width='100' height='100' ></td>"; ?>
							<td><?php echo  $row['product_name']?></td>	
							<td>RM <?php echo  $row['product_price']?></td>
							<td><?php echo $row['quantity'];?></td>		
							</tr>
							<?php
							}
							?>
							</table>
    <p>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
  <?php
   $sql="SELECT * FROM customer WHERE c_id = ".$_SESSION['c_id'];
	$result = mysqli_query($db, $sql);
        $row= mysqli_num_rows($result);
  while($row = mysqli_fetch_assoc($result))
        	{
  	?>
        <p><?php echo $row['c_name']; ?></p>
        <p><?php echo $row['c_email']; ?></p>
        <p><?php echo $row['c_hp']; ?></p>
        <p><?php echo $row['c_address']; ?></p>
    <?php
	   }?>
	   
</div>
<div class="print">
	<img src="../../png/print.png" onclick="myFunction();" width=50px; height=50px;>
</div>

<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>