<?php 
session_start();
  if (empty($_SESSION['c_id']))
   {
      header('Location: ../signin/signin.php');
      // Immediately exit and send response to the client and do not go furthur in whatever script it is part of.
      exit();
   }    
?>
<?php
include("../../config.php");

$pid=$_REQUEST['pid'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bakery Product Details</title>
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
    margin-top: 220px;
}
body{

background-image:url("../../png/back1.jpg");
background-size: cover;
background-repeat: no-repeat;

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
.cart img:hover{background-color: white;width:25px;height: 25px;}
.header{margin-left: 7%;}
.logo{width:330px; height:210px;margin-left:600px;margin-right:auto;border-radius: 10px;}
.logocontainer{position:absolute;top:4px;}


.navbar{

margin-bottom:2%;
 

}

.pic{

width:1600px;
height:220px;

}

#product-pic{float: left;margin-right: 10%;}
#cart-icon{position: absolute;right: 120px;}
#cart-icon:hover{width:65px;height: 65px;}
#middle{margin-left: 10%;margin-top: 6%;}

#middle span,label{font-size: 16pt;}
#middle span{position: absolute;left:860px;}
#product-information{width:400px;height: 200px;float: left;}
#product-information div{margin-bottom: 10px;}
#add button{width: 100px;height: 50px;margin-top: 40px;position: absolute;left:1200px;}
.addtocart{margin:0;
padding:15px;
background:#68F9D2;
font-size:20px;
color:black;
opacity:0.7;
border-radius:25px;
margin-left: 600px;
position: absolute;
bottom: 100px;
}
img{border-radius: 20px;}
.middle img:hover{width:370px;height: 370px;transition: 1s;}
.addtocart:hover{color:white;background-color:#575253;border-radius:15px;transition:0.7s;}
#cart-icon{position: absolute;right: 120px;}
#cart-icon:hover{width:65px;height: 65px;}
a{text-decoration: none;}
#un:hover{background-color:red;}
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
		  <li><a class="menu" href="product.php">Menu</a></li>
		  <li><a class="outlet" href="../orderHistory.php">Order History</a></li>
		  <li><a class="about" href="../aboutus/aboutus.php">About</a></li>
		  <li><a class="signin" href="../logout.php">Log Out</a></li>
		</ul>
	
			</div>
			
	</div>
	<div id="cart-icon">
		<a href="viewCart.php"><img src="../../png/cart.png" width="60px" height="60px"></a>
	</div>
	<hr class="colorline">
	<br>
	<div id="middle">
	<?php
		$sql="SELECT * from product where product_id= '$pid'";
		$result = mysqli_query($db, $sql);
        	$row= mysqli_num_rows($result);
        	while($row=mysqli_fetch_assoc($result))
        	{
        			$image=$row['product_pic'];

	?>
		<div id="product-detail">
			<div id="product-pic">
				<?php echo "<a href><img src='../../admin/product/img/".$row['product_pic']."' width='350' height='350' ></a>"; ?>
			</div>
			<div id="product-information">
				<div id="product-name">
					<label>Name :</label>
					<span><?php echo $row['product_name'];?></span>
				</div>
				<br>
				<div id="product-ingredient">
					<label>Ingredient :</label>
					<span><?php echo $row['product_ingredient'];?></span>
				</div>
				<br>

				<div id="product-size">
					<label>Size(kg):</label>
					<span><?php echo $row['product_size'];?></span>
				</div>
				<br>

				<div id="product-price">
					<label>Prices :</label>
					<span>RM <?php echo $row['product_price'];?></span>
				</div>
				<br>
				<div id="product-des">
					<label>Description :</label>
					<span><?php echo $row['product_desc'];?> </span>
				</div>
				<br>

			</div>
		</div>
		<div id="add">
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
	<?php }?>
</body>
</html>