<?php

include("../../config.php");
session_start();  

?>
<!DOCTYPE html>
<html>

<head>

	<title>Admin View Product</title>
<style type="text/css">
		body{background-image: url(../../png/back1.jpg);
	background-size:cover;
	
	}
	button{font-family:garamond;font-weight:bold; font-size:15px;}
	
	
	#nav-back{ position: absolute;left:450px;top:20px;
position:absolute;top:4px;opacity:0.7;}

	#logo{margin-left:850px;margin-right:auto;border-radius:10px;z-index: 1000;
position:relative;}

	#lnav{width:40px;height: 70px;
	margin-left:5%;margin-top:5%;
	}
	#editbtn{margin-right:70%;margin-top:3%;  }
	#lnav button{width:150px;height: 70px;margin-bottom: 30px; border-radius:35px; box-shadow:5px 5px 5px 5px #808080;
	
	background-image:url(../../png/back1.jpg);
	background-size:150px 100px;}
	
	#admin-photo img{width:80px; height:80px; margin-left:50%;margin-top:80%; }
	
	#admin-photo{float: left; margin-bottom:20%; }
	#admin-name p{color:black;}
	#admin-name span{font-style: italic;color:black;}
	#lnav{position: absolute;top:150px;}
	
	#lnav{float: left;}
	
	#inner-content table{position: absolute;top: 400px;left: 400px;width:1300px;
	 box-shadow:5px 5px 5px 5px #bbb;

	 }
	
	table tr td{padding: 30px 20px 20px 10px;
	font-family:cursive; text-align: center;
}
	table tr th{padding:10px 0px 20px 0px;
	font-family:garamond;
	font-size:20px;}
	#editbtn{position: absolute;top:200px;right:100px;}
.search{margin-left: 560px;margin-top: 65px;}
.search form ul{
	list-style-type: none;

}
.search form select{width: 120px;}
.search form{padding-left: 10px;padding-top:7px;padding-bottom: 5px;	}
.search form button{margin-left: 20px;border-radius: 20px;}
.search form label{font-size: 25px;}
.searchback{background-color:black;opacity: 0.4;color:white;width:330px;height: 40px;background-size: cover;border-radius: 20px;}
.searchback button{margin-left: 400px;margin-top: 10px;color:black;font-size: 20px;}

.search form ul li{font-size: 20px;float: left;}

#out img{position: absolute;right:400px;top:200px;}
.name{font-family:cursive; font-size:25px; margin-left:35px; color:white;}
</style>
</head>
<body>
<div id="logo">
		<img src="../../png/logo1.png" alt="logo" width="250px" height="170px">
	</div>
	
	

	
	<div id="content">
		<div id="lnav">
			<div id="up-content">
			
				<div id="admin-name">
					<p class="name"><span>Admin</span> &nbsp;<?php echo $_SESSION["admin_name"]; ?></p>
				</div>
				
			</div>
			<div id="lnav-content">
				<div id="btn1">
					<button onclick="goproduct();">View Product</button>
				</div>
				<div id="btn2">
					<button onclick="goCus();">View Customer</button>
				</div>
				<div id="btn3">
					<button onclick="goOrder();">View Order</button>
				</div>
				<div id="btn4">
					<button onclick="feedback();">Feedback</button>
				</div>
				
				<div id="btn5">

					<button onclick="addAdmin();">Add Admin</button>
				</div>
				
			</div>
					
			</div>
			<div id="inner-content">
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
				<div id="editbtn">
				<img src="../../png/add.png" width=50px; height=50px; onclick="addP();">
					

				</div>
				
					<table>
						<tr>
						
							<th>No</th>
							<th>Photo</th>
							<th>Name</th>
							<th>Ingredient</th>
							<th>Size(kg)</th>
							<th>Price</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
<?php


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
	
$sql="SELECT * FROM product";


$result = mysqli_query($db, $sql);
$row= mysqli_num_rows($result);
     while($row = mysqli_fetch_assoc($result))
     { 
$image = $row["product_pic"];
?>   
<tr>
<td><?php echo $row["product_id"];?></td>
<?php echo "<td><img src='img/".$row['product_pic']."' width='100' height='100' ></td>"; ?>

<td><?php echo $row["product_name"]; ?></td>
<td><?php echo $row["product_ingredient"]; ?></td>
<td> <?php echo $row["product_size"]; ?></td>
<td>RM<?php echo $row["product_price"]; ?></td>
<td><?php echo $row["available"]; ?></td>
<td><img src="../../png/status.png" width=20px; height=20px; onclick ="window.document.location='update_status.php?product_id=<?php echo $row["product_id"];?>';">

	<img src="../../png/edit.png" width=20px; height=20px; onclick ="window.document.location='edit_product.php?product_id=<?php echo $row["product_id"];?>';">
</td>
</tr>   
<?php	
	}

?>
<style type="text/css">
	td p,img.hover{cursor:pointer;}
</style>						


						
	
</table>

				
		</div>
		<div id="out"><img src="../../png/bye.png" width=50px; height="50px" onclick="out();"></div>
	
	<script type="text/javascript">
		function out()
		{
			window.location="../../admin/login/login.php";
		}
	</script>
	<script type="text/javascript">
					function goproduct()
					{
						window.location="product.php";
					}
					function goCus()
					{
						window.location="../customer/admin-view-customer.php";
					}
					function goOrder()
					{
						window.location="../order/order.php";
					}
					function addP()
					{
						window.location="add-product.php";
					}
					function addAdmin()
					{
						window.location="../addAdmin/add-admin.php";
					}
					function feedback()
					{
						window.location="../feedback/feedback.php";
					}
					
				</script>

</body>
</html>