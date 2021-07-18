<?php 
session_start();
      if (empty($_SESSION['c_id']))
   {
      header('Location: ../signin/signin.php');
      // Immediately exit and send response to the client and do not go furthur in whatever script it is part of.
      exit();
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bakery Product</title>
	<style type="text/css">
		.header ul {
    list-style-type: none;
    margin: 50;
    padding: 30px;
    overflow: hidden;
   
    
    top: 50;
    min-width: 40.5%;
    margin-left: 25%;
    top:200px;
}
body{

background-image:url("../../png/back1.jpg");
background-repeat: no-repeat;
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

.header li a:hover:not(.active) {
    background-color: black;
    transition: 1s;
}

.home {background-color: #90EE90;}
.menu{background-color: #FF4500;}
.outlet{background-color: #641E16;}
.about{background-color: #FF6E82;}
.signin{background-color:#F9E79F;}
.cart img:hover{background-color: white;width:25px;height: 25px;}
.header{margin-left: 7%;}
.logo{width:330px; height:210px;margin-left:600px;margin-right:auto;border-radius: 10px;}
.logocontainer{position:absolute;top:4px;}


.navbar{

margin-top:200px;
margin-bottom:2%;
 

}



#footer{position: absolute;bottom: 0;font-size: 18pt;background-color: grey;width: 87%;height:100px;left:100px;opacity: 0.8;}
#footer li{padding-right: 50px;}
.productindex{padding:10px;}
.list ul {list-style-type:none;margin-left: 15%;}
.list ul li{float:left;padding-left:15px;width:400px;height:550px;}
.list ul li img{width:245px ; height:200px;border-radius: 20px;
}
.list ul li img:hover{width:295px;height:250px;transition:1s}
.description{margin:10px;}
.pp{color:red;
padding-bottom:15px;
}
 a{
text-decoration:none;
               font-weight:bold;
}

.pd{width:100%;height:10%;margin-bottom:15px;}
.pn a{color:black;}

.addtocart{margin: 0;
padding:15px;
background:#68F9D2;
font-size:20px;
color:black;
opacity:0.7;
border-radius:25px;
}
#un:hover{background-color:red;}
.addtocart:hover{color:white;background-color:#575253;border-radius:15px;transition:0.7s;}
#cart-icon{position: absolute;right: 120px;}
#cart-icon:hover{width:65px;height: 65px;}
.search{margin-left: 500px;margin-top: 0px;background-color: gray;opacity: 0.8;width:400px;height: 50px;border-radius: 20px;}
.search form{padding-top: 18px;padding-left: 20px;}
.search form select{width:120px;}
.search form button{border-radius: 20px;}

	</style>


</head>
<body>
		<div class="header">
			<div class="logocontainer">
					<img class="logo" src="../../png/logo1.png" alt="logo" >
			</div>
			<img class="pic" src="">
			
			<div class="navbar">
		<ul>
		  <li><a class="home" href="../index/index.php">Home</a></li>
		  <li><a class="menu" href="product.php">Menu</a></li>
		  <li><a class="outlet" href="../orderHistory.php">Order History</a></li>
		  <li><a class="about" href="../aboutus/aboutus.php">Contact Us</a></li>
		  <li><a class="signin" href="../logout.php">Log Out</a></li>
		</ul>
	
			</div>
		
	</div>
	<div id="cart-icon">
		<a href="viewCart.php"><img src="../../png/cart.png" width="60px" height="60px"></a>
	</div>
	<div class="search">
				<form name="searchbar" class="searchback" method="post">
					
						
						<labe>Price Range:<label>
						<select name="range">
							<option value="1">RM10~RM20</option>
							<option value="2">RM21~RM40</option>
							<option value="3">RM41~RM60</option>
							<option value="4">RM61~RM80</option>
							<option value="5">RM80~above</option>
						</select>
						<button type="submit" name="searchp">Search
				</form>
			</div>
	<div id="middle">
		<div class="productindex">
     <h2>PRODUCTS</h2>
     <hr class="colorline">
	<br>
	<div class="list">
	<ul>
		
		<?php
		
		include("../../config.php");
		if(isset($_POST["searchp"]))
{
	$range=$_POST['range'];

	switch ($range) 
	{
		case '1':$sql="SELECT * from product where product_price between 10 and 20";
			break;
		case '2':$sql="SELECT * from product where product_price between 21 and 40";
			break;
		case '3':$sql="SELECT * from product where product_price between 41 and 60";
			break;
		case '4':$sql="SELECT * from product where product_price between 61 and 80";
			break;
		case '5':$sql="SELECT * from product where product_price >80";	
			break;
		default:$sql="SELECT * from product";
			break;		
	}

}
else

		{	
			 $sql="SELECT * FROM product ";
		}
			$result = mysqli_query($db, $sql);
        	$row= mysqli_num_rows($result);

        	while($row = mysqli_fetch_assoc($result))
        	{
        		$image=$row['product_pic'];
        	
        ?>

		<li>

			<div>
				<?php echo "<a href><img src='../../admin/product/img/".$row['product_pic']."' width='100' height='100' ></a>"; ?>
				<div class="description">
					<div class="pp">
						RM <?php echo $row['product_price'];?>
					</div>
					<div class="pn">
					<a href="product_detail.php?pid=<?php echo $row['product_id'];?>"><?php echo $row['product_name'];?></a>
					</div>
					<div class="pd">
						<?php echo $row['product_desc'];?> 
					</div>
					<?php
					if($row['available']=="available")
					{
						?>
					<a class="addtocart" href="cartAction.php?action=addToCart&product_id=<?php echo $row["product_id"]; ?>">Add to cart</a>
					<?php
					}
					else
					{
					?>
					<a class="addtocart" id="un">Unavailable</a>
					<?php
					}
					?>
				</div>
			</div>

		</li>
		 
		<?php } ?>
	</ul>
	</div>
	
</div>
	</div>
</body>
</html>