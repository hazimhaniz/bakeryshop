<?php
session_start();
if (empty($_SESSION['c_id']))
   {
      header('Location: ../signin/signin.php');
      // Immediately exit and send response to the client and do not go furthur in whatever script it is part of.
      exit();
   }
include("../config.php");
$cid = $_SESSION['c_id'];


?>
<!DOCTYPE html>
<html>
<head>

	<title>F.Y.P Bakery Shop</title>
	<style>
	ul {
    list-style-type: none;
    margin: 50;
    padding: 30px;
    overflow: hidden;
   
    
    top: 50;
    min-width: 40.5%;
    margin-left: 22%;
    top:200px;
}
body{
background-image: url(../png/back1.jpg);
background-size: cover;
}
li{

 float: left;}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 9px 60px;
    padding-right: 50px;
    padding-left: 50px;
    text-decoration: none;
   
}

li a:hover:not(.active) {
    background-color: black;
    transition: 1s;
}

.home {background-color: #90EE90;}
.menu{background-color: #FF4500;}
.outlet{background-color: #641E16;}
.about{background-color: #FF6E82;}
.signin{background-color:#F9E79F;}
.header{margin-left: 7%;}
.logo{width:330px; height:210px;margin-left:600px;margin-right:auto;border-radius: 10px;}
.logocontainer{position:absolute;top:4px;}

.navbar{

margin-bottom:2%;
margin-top: 200px;

}
table tr th,td{text-align: center;font-size: 20px;}
.bodycontent{width:1500px;margin-left: 200px;}
h1{text-align: center;}
table tr td{border-style: groove;}

table{
	border-style: groove;
}

</style>
</head>
<body>
	<div class="header">
			<div class="logocontainer">
					<img class="logo" src="../png/logo1.png" alt="logo" >
			</div>
		
			
			<div class="navbar">
		<ul>
		  <li><a class="home" href="index/index.php">Home</a></li>
		  <li><a class="menu" href="php_shopping_cart/product.php">Menu</a></li>
		  <li><a class="outlet" href="orderHistory.php">Order History</a></li>
		  <li><a class="about" href="aboutus/aboutus.php">Contact Us</a></li>
		  <li><a class="signin" href="signin/signin.php">Log Out</a></li>
		</ul>
	
			</div>
	</div>
	<div class="bodycontent">
	<h1>Order Detail</h1>
		<table style="width:100%">
		
			<tr>
				<th>No</th>
				<th>Product Name</th>
				<th>Product Picture</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Subtotal</th>
			</tr>
<?php

				if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'checkdetail' && !empty($_REQUEST['order_id']))
    {
        $orderID = $_REQUEST['order_id'];
        $sql= "SELECT DISTINCT product.product_id,product.product_pic,product.product_name,product.product_price,orders.total_price,order_items.quantity FROM order_items,orders,customer,product WHERE orders.id=order_items.order_id and order_items.product_id=product.product_id and order_items.order_id='$orderID'";
        $result = mysqli_query($db, $sql);
        $row= mysqli_num_rows($result);
        		$count=0;
				while ($row=mysqli_fetch_assoc($result)) 
			{ 
   				++$count;

			      $image=$row['product_pic'];
			      $total=$row['total_price'];
			      

		?>
			<tr>
				<td><?php echo $count; ?></td>
				<td><?php echo $row["product_name"];?></td>
				<td><?php echo "<img src='../admin/product/img/".$row['product_pic']."' width='100' height='100' >"; ?></td>
				<td><?php echo $row["quantity"];?></td>		
				<td>RM <?php echo $row["product_price"]; ?></td>
				<td>Rm <?php echo ($row["quantity"]*$row["product_price"]);?></td>
				
			</tr>
        <?php
    }
    ?>
    <tr id="total">
    	<td colspan="5">Total</td>
    	<td>RM<?php echo $total;?></td>
    </tr>
    <?php
                 }
}
       ?>

		</table>

		</div>
		
	</div>


</body>
</html>