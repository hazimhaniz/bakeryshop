<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

	<title>Order Detail</title>
<style type="text/css">
	body{background-image: url(../../png/back1.jpg);
	background-size:2000px 1200px;
	background-repeat:no-repeat;
	}
	button{font-family:garamond;font-weight:bold; font-size:15px;}
	label {margin-right:30px;float: left;}
	#calc {margin-left: 500px;margin-top:450px;}
	#calc p{margin-left: 430px;}
	#calc label{margin-left: 60px;}
	
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
	
	#inner-content{position: absolute;top: 400px;left:620px;background-image:url(a.jpg);
	 box-shadow:5px 5px 5px 5px #bbb;
border-radius:25px;
margin-left:1%;
background-image:url(white-abstract-background_2.png);
overflow-y:scroll;
height:400px;width:1000px;
	 }
	
	table tr td{padding: 10px 10px 10px 90px;
	font-family:cursive; 
}
	table tr th{padding:10px 0px 20px 20px;
	font-family:garamond;
	font-size:20px;}
	#editbtn{position: absolute;top:200px;right:100px;}

#admin-name p{color:black;}
label {margin-right:30px;float: left;}
#calc{position: absolute;top:400px;left:150px;}
	#calc p{margin-left: 430px;}
	#calc label{margin-left: 60px;}
#out img{position: absolute;right:400px;}
.name{font-family:cursive; font-size:25px; margin-left:35px; color:white;}
#total p,label{font-size: 20pt;}
#admin-name span{color: black;font-style: italic;}
</style>
</head>
<body>
<div id="logo">
		<img src="logo3-Recovered.png" alt="logo" width="250px" height="170px">
	</div>
	<div id="nav-back">
		<img src="navbar.jpg" alt="nav" width="1100px" height="180px">
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
					<button onclick="goCus();">View Customer</button>
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
				
					
			</div>
			<div id="inner-content">
				<div id="order-header">
					<?php
					
					include("../../config.php");
					if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'checkdetail' && !empty($_REQUEST['order_id']))
    {
        $orderID = $_REQUEST['order_id'];
        $sql= "SELECT DISTINCT product.product_id,product.product_pic,product.product_name,product.product_price,orders.total_price,order_items.quantity FROM order_items,orders,customer,product WHERE orders.id=order_items.order_id and order_items.product_id=product.product_id and order_items.order_id='$orderID'";
        $result = mysqli_query($db, $sql);
        $row= mysqli_num_rows($result);
       
        

        }
    }
					?>
					<p>#Order ID <?php echo $orderID?></p>
					<table>
		
			
							<tr>
								<th>product ID</th>
								<th>Product Picture</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								</tr>
								<?php
						while($row = mysqli_fetch_assoc($result)){
							$image = $row["product_pic"];
							$price=$row["total_price"];
							?>   
						
							<tr>
							<td><?php echo  $row['product_id']?></td>
							<<?php echo "<td><img src='../product/img/".$row['product_pic']."' width='100' height='100' ></td>"; ?>
							<td><?php echo  $row['product_name']?></td>	
							<td>RM <?php echo  $row['product_price']?></td>
							<td><?php echo $row['quantity'];?></td>		
							</tr>
							<?php
							}
							?>
							</table>
						
      
					

				</div>
				
			</div>
			<div id="calc">
						
						<div id="total">
							<label>Total</label>
							<p>RM <?php echo $price;?></p>
						</div>
					</div>
	<script type="text/javascript">
		function goCus()
					{
						window.location="../customer/admin-view-customer.php";
					}
					function goOrder()
					{
						window.location="../order/order.php";
					}
					function goProd()
					{
						window.location="../product/product.php";
					}
	</script>
	<div id="out"><img src="../../png/bye.png" width=50px; height="50px" onclick="out();"></div>
	
	<script type="text/javascript">
		function out()
		{
			window.location="../../admin-login/admin login.html";

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

</body>
</html>