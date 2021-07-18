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
.list ul {list-style-type:none;margin-left: 15%;background-image: url(../../png/back1.jpg);width:1200px;height: 600px;border-radius: 20px;}
.list ul li{;width:1000px;height:100px;font-size: 20px;}
.list ul li img{width:245px ; height:200px;
}
.list input{font-size:20px;border-radius: 20px;width:800px;}
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
.addtocart:hover{color:white;background-color:#575253;border-radius:15px;transition:0.7s;}
#cart-icon{position: absolute;right: 120px;}
#cart-icon:hover{width:65px;height: 65px;}
.submitbtn button{color:white;background-color: black;position: absolute;left:1300px;top:1000px;
	font-size:30px;border-radius: 10px;box-shadow: 2px 0px 0px 5px;
}
form p{font-size: 100px;}

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
	
	<form name="edit" method="post">
	
	<ul><p><?php if(isset($message)) echo $message; ?></p>
		<li><label>Name :</label><?php echo$row['c_name'];?></li>
		<li><label>Username :</label><?php echo $row['c_username'];?></li>
		<li><label>Birthday :</label><input type="date" name="bd"></li>
		<li><label>Email:</label><input type="email" name="email"></li>
		<li><label>Phone Number:</label><input type="text" name="hp"></li>
		<li><label>Address:</label><input type="text" name="address"></li>

	</ul>
	<div class="submitbtn">
		<button type="submit" name="submit">Update</button>
	</div>
	</form>

	<?php } ?>
	<?php
	
	$message="";
		if (isset($_POST['submit'])) 
		{	$error=false;
			$c_email=$_POST["email"];
			$c_hp=$_POST["hp"];
			$c_address=$_POST["address"];
			$birthday=$_POST["bd"];

						if(empty($c_hp))
						{
							$error = true;
							$message = "* Please enter your phone number.";
						}
						if(array_key_exists('c_hp', $_POST))
					 		 {
					  	 		 if(!preg_match('/^[0-9]{3}-[0-9]{8}$/', $_POST['c_hp']))
					   				 {
					   				 	if(!preg_match('/^[0-9]{3}-[0-9]{7}$/', $_POST['c_hp']))
					   				 	{
					   				 		$error=true;
					      					$message = 'Invalid Number!';
					      				}
					      				
					    			 }
					    	 }
					    	  $query = "SELECT c_email FROM customer WHERE c_email='$c_email'";
						      $result = mysqli_query($db,$query);
						      $count = mysqli_num_rows($result);
						      if($count!=0)
							  {
						       	$error = true;
						       	$message = "* Provided Email is already in use.";
						      }
						      if(empty($c_email))
						  		{
						  			$error=true;
						  			$message="Please enter email";
						  		}
						  		if(empty($birthday))
								{
									$error = true;
									$message = "* Please enter your date of birth.";
								}

						if(!$error)
						{
							$sql="UPDATE customer SET c_email='$c_email',c_hp='$c_hp',birthday='$birthday',c_address='$c_address'where c_id=".$_SESSION['c_id'];
							      if (mysqli_query($db, $sql)) 
								  {
							 		header("refresh:0.1");
									header("Location:customer_information.php");
							      } 
							      else 
								  {
							               echo  "ERROR";
							      }
						 }

							      mysqli_close($db);
		 }
			
	?>
	</div>
	
	
</div>
	</div>
</body>
</html>