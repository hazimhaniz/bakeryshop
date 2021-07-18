<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

	<title>Admin View Order</title>
<style type="text/css">
	body{background-image: url(../../png/back1.jpg);
	background-size:2000px 1200px;
	background-repeat:no-repeat;
	}
	button{font-family:garamond;font-weight:bold; font-size:15px;}
	
	
	#nav-back{ position: absolute;left:450px;top:20px;
position:absolute;top:4px;opacity:0.7;}

	#logo{margin-left:850px;margin-right:auto;border-radius:10px;z-index: 1000;
position:relative;}

	#lnav{width:40px;height: 70px;
	margin-left:5%;margin-top:5%;
	}
	#editbtn{margin-right:17%;margin-top:3%;  }
	#lnav button{width:150px;height: 70px;margin-bottom: 30px; border-radius:35px; box-shadow:5px 5px 5px 5px #808080;
	
	background-image:url(White-Wallpaper-2-2.jpg);
	background-size:150px 100px;}
	
	#admin-photo img{width:80px; height:80px; margin-left:50%;margin-top:80%; }
	
	#admin-photo{float: left; margin-bottom:20%; }
	
	#lnav{position: absolute;top:150px;}
	
	#lnav{float: left;}
	
	#inner-content table{position: absolute;top: 400px;left: 450px;background-image:url(a.jpg);
	 box-shadow:5px 5px 5px 5px #bbb;
border-radius:25px;
margin-left:1%;
background-image:url(white-abstract-background_2.png);
	 }
	
	table tr td{padding: 30px 20px 20px 10px;
	font-family:cursive; text-align: center;
}
	table tr th{padding:10px 0px 20px 20px;
	font-family:garamond;
	font-size:20px;}
	#editbtn{position: absolute;top:200px;right:100px;}

#out img{position: absolute;right:400px;}


.name{font-family:cursive; font-size:25px; margin-left:35px; color:white;}
#admin-name p{color:black;}
#admin-name span{color: black;font-style: italic;}
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
					<button onclick="goProd();">View Product</button>
				</div>
				<div id="btn2">
					<button onclick="goCus();">View Member</button>
				</div>
				<div id="btn3">
					<button onclick="goOrder();">View Order</button>
				</div>
				<div id="btn4">
					<button onclick="feed();">Feedback</button>
				</div>
				
				<div id="btn5">

					<button onclick="aa();">Add Admin</button>
				</div>
			</div>
			<script type="text/javascript">
				function goProd()
				{
					window.location="../product/product.php";
				}
				function goCus()
				{
					window.location="../customer/admin-view-customer.php";
				}
				function goOrder()
				{
					window.location="../order/order.php";
				}
				function aa()
				{
					window.location="../addAdmin/add-admin.php";
				}
				function feed()
				{
					window.location="../feedback/feedback.php";
				}
			</script>
				
					
			</div>
		<div id="inner-content">
				<table>
					<tr>
						
						<th>No</th>
						<th>Customer Name</th>
						<th>Amount</th>
						<th>Payment Status</th>
						<th>Shipping Status</th>
						<th>Paid date</th>
						
					</tr>
					<?php
include("../../config.php");
$sql="SELECT * FROM orders";
$result = mysqli_query($db, $sql);
$row= mysqli_num_rows($result);


     while($row = mysqli_fetch_assoc($result)){
$ID=$row['customer_id'];if($row['status']=1)
	$pstatus="Paid";
?>   
<tr>
<td><?php echo $row['id'];?></td>
<?php
	$cus_sql="SELECT * FROM customer where c_id= '$ID'";
	$cresult=mysqli_query($db,$cus_sql);
	$crow=mysqli_num_rows($cresult);
	while($crow = mysqli_fetch_assoc($cresult)){
?>

<td><?php echo $crow['c_name']; ?></td>
<td>RM<?php echo $row['total_price']; ?></td>

<td><?php echo $pstatus ?></td>
<td><?php echo $row['shipping'];?></td>
<td><?php echo $row['created'];?></td>
<td><a class="btn btn-success" href="order-detail.php?action=checkdetail&order_id=<?php echo $row["id"]; ?>"><img src="../../png/view.png" width=20px height=20px></a>
<?php if($row['shipping']=="Processing")
	{
	?>	<a href="shipping_status.php?o_id=<?php echo $row['id'];?>"><img src="../../png/status.png" width=20px height=20px></a>
	<?php
	}
?>
</td>

</tr>   
<?php	
}	
}
?>

				</table>
			</div>	
		<div id="out"><img src="../../png/bye.png" width=50px; height="50px" onclick="out();"></div>
	
	<script type="text/javascript">
		function out()
		{
			window.location="../login/login.php";
		}
	</script>
	

</body>
</html>