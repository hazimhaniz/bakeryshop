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
.list ul {list-style-type:none;margin-left: 15%;background-image: url(../../png/back1.jpg);width:1200px;height: 500px;border-radius: 20px;box-shadow: 5px 10px 20px 0px}
.list ul li{margin-top: 10px;width:1000px;height:70px;font-size: 20px;}

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
.addtocart:hover{color:white;background-color:#575253;border-radius:15px;transition:0.7s;}
#cart-icon{position: absolute;right: 120px;}
#cart-icon:hover{width:65px;height: 65px;}
.editbtn a{color:white;background-color: black;
	bottom:100px;position: absolute;font-size:50px;border-radius: 10px;box-shadow: 2px 0px 0px 5px;
}

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
		  <li><a class="home" href="index.php">Home</a></li>
		  <li><a class="menu" href="../php_shopping_cart/product.php">Menu</a></li>
		  <li><a class="outlet" href="../orderHistory.php">Order History</a></li>
		  <li><a class="about" href="../aboutus/aboutus.php">Contact Us</a></li>
		  <li><a class="signin" href="../logout.php">Log Out</a></li>
		</ul>
	
			</div>
		
	</div>
	<div id="cart-icon">
		<a href="../php_shopping_cart/viewCart.php"><img src="../../png/cart.png" width="60px" height="60px"></a>
	</div>
	<div id="middle">
		<div class="productindex">
     <h2>Customer Information</h2>
     <hr class="colorline">
	<br>
	<div class="list">
	<?php
	include('../../config.php');
		$sql="SELECT * from customer where c_id=".$_SESSION['c_id']; ;
		$result=mysqli_query($db,$sql);
		$row=mysqli_num_rows($result);

		while($row=mysqli_fetch_assoc($result))
		{

	?>
	<ul>
		<li><label>Name :</label><?php echo$row['c_name'];?></li>
		<li><label>Username :</label><?php echo $row['c_username'];?></li>
		<li><label>Birthday :</label><?php echo $row['birthday'];?></li>
		<li><label>Email:</label><?php echo $row['c_email'];?></li>
		<li><label>Phone Number:</label><?php echo $row['c_hp'];?></li>
		<li><label>Address:</label><?php echo $row['c_address'];?></li>
		<div class="editbtn">
		<a href="edit_cus_information.php?cid=<?php echo $row['c_id']?>">Edit</a>
	</div>
	</ul>

	

	<?php } ?>
	</div>
	
</div>
	</div>
</body>
</html>