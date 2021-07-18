<?php session_start();
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
<?php

include("../../config.php");
?>
	<title>Passion Bakery Shop</title>
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

background-image: url(../../png/back1.jpg);
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
.acc{background-color: #90AA90;}
.home {background-color: #90EE90;}
.menu{background-color: #FF4500;}
.outlet{background-color: #641E16;}
.about{background-color: #FF6E82;}
.signin{background-color:#F9E79F;}
.header{margin-left: 7%;}
.logo{width:330px; height:210px;margin-left:600px;margin-right:auto;border-radius: 10px;}
.logocontainer{position:absolute;top:4px;}
.productshow{margin-left: 7%;clear:both;}
.productshow div{float:left;}

.detaildisplay{display: none;}
.product4 img:hover{display:inline-block;}
.product1 img {
 

          transition: all 1s ease;
}
 
.product1 img:hover {
  width: 340px;
  height: 350px;
}
.product2 img {
 

          transition: all 1s ease;
}
 
.product2 img:hover {
  width: 340px;
  height: 350px;
}
.product3 img {
 

          transition: all 1s ease;
}
 
.product3 img:hover {
  width: 340px;
  height: 350px;
}
.product4 img {
 
  
          transition: all 1s ease;
}
 
.product4 img:hover {
  width: 340px;
  height: 350px;
}

.navbar{

margin-bottom:2%;
margin-top: 200px;

}


.pic{

width:1600px;
height:220px;

}

.addtocart{margin: 0;
padding:20px;
background:#68F9D2;
font-size:20px;
color:white;
opacity:0.7;
border-radius:25px;
position: relative;left:70px;top:60px;
}
.addtocart:hover{color:white;background-color:#575253;border-radius:15px;transition:0.7s;}
.product1{position: relative;display: inline-block;}
.dropdown-content{display: none;position: absolute;background-color: #f9f9f9;min-width: 340px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);font-size: 16pt;}
.product1:hover .dropdown-content{display: block;}
.product2:hover .dropdown-content{display: block;}
.product3:hover .dropdown-content{display: block;}
.product4:hover .dropdown-content{display: block;}
#footer{background-color:gray;position:fixed;bottom:0px;width: 95%;height:80px;left:40px;opacity: 0.7;}
#footer li{padding-right: 150px;font-size: 20px;}
.latest {float: left;position: absolute;left:160px;top:800px;width: padding:10px;margin-bottom: 200px;}
.latest img{width:300px; height:250px;border-radius: 20px;margin-right: 100px;}
.latest img:hover{opacity: 0.8;}
.latest a{text-decoration: none;color:black;font-size:21px;}
.pro{margin-bottom: 140px;float: left;}
.dd{width:200px;height: 50px;left: 20px;}
.dd p:hover{color:blue;cursor: url(../../png/cookie.png), auto;}
</style>
</head>
<body>
	<div class="header">
			<div class="logocontainer">
					<img class="logo" src="../../png/logo1.png" alt="logo" >
			</div>
		
			
			<div class="navbar">
		<ul>
		  <li><a class="home" href="../index/index.php">Home</a></li>
		  <li><a class="menu" href="../php_shopping_cart/product.php">Menu</a></li>
		  <li><a class="outlet" href="../orderHistory.php">Order History</a></li>
		  <li><a class="acc" href="customer_information.php">Account</a></li>
		  <li><a class="signin" href="../logout.php">Log Out</a></li>
		</ul>
	
			</div>
	</div>
	<div class="bodycontent">
		<div class="productshow">
			<div class="product1">
				<img src="P7092055.jpg" alt="cake" width="400px" height="350px">
				<div class="dropdown-content">
					<p>Dessert always the best</p>
				</div>
				
				
				
			</div>
			<div class="product2">
				<img src="the-eiffel-tower-creation-for-french-desserts-frid.jpg" alt="cake" width="400px" height="350px">
				<div class="dropdown-content">
					<p>Dessert always the best</p>
				</div>
			</div>
			<div class="product3">
				<img src="340x_top-chef-just-desserts-season-1-top-recipe-101-heather-h_0.jpg" alt="cake" width="400px" height="350px">
				<div class="dropdown-content">
					<p>Dessert always the best</p>
				</div>
			</div>
			<div class="product4">
				<img src="NickSquireAmorettiB35V2228.jpg" alt="cake" width="400px" height="350px">
				<div class="dropdown-content">
					<p>Dessert always the best</p>
				</div>
			</div>
			

			
		</div>
		<div class="latest">
		<h1>Latest Product</h1>
		<hr/>
			<?php
				$sql="SELECT * FROM product where available='available'
						ORDER BY RAND() LIMIT 4 ";
						$result=mysqli_query($db,$sql);
						$row=mysqli_num_rows($result);

						while ($row=mysqli_fetch_assoc($result)) 
						{
							$image=$row['product_pic'];
							?>
							<div class="pro">
							<?php echo "<a href><img src='../../admin/product/img/".$row['product_pic']."' width='100' height='100' ></a>"; ?>
							<div class="dd">
								<p><a href="../php_shopping_cart/product_detail.php?pid=<?php echo $row['product_id'];?>"><?php echo $row['product_name'];?></a></p>
							</div>
							<a class="addtocart" href="../php_shopping_cart/cartAction.php?action=addToCart&product_id=<?php echo $row["product_id"]; ?>">Add to cart</a>
							</div>
						<?php	
						}

			?>
		</div>
	</div>


</body>
</html>