<?php
include("../../config.php");
session_start();  

?>
<!DOCTYPE html>
<html>

<head>

	<title>Admin View Feedback</title>
<style type="text/css">
		body{background-image: url(../../png/back1.jpg);
	background-size:cover;
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



#out img{position: absolute;right:400px;}
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
				
<table>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Content</th>
						</tr>

<?php

$sql="SELECT * FROM feedback";
$result = mysqli_query($db, $sql);
$row= mysqli_num_rows($result);


     while($row = mysqli_fetch_assoc($result))
     { 
?>   
<tr>
<td><?php echo $row["f_id"]?></td>
<td><?php echo $row["f_name"]; ?></td>
<td><?php echo $row["f_email"]; ?></td>
<td><?php echo $row["f_content"]; ?></td>

</tr>   
<?php	
	}

?>
						


						
	
</table>
				</div>
				
					

				
		</div>
		<div id="out"><img src="../../png/bye.png" width=50px; height="50px" onclick="out();"></div>
	
	<script type="text/javascript">
		function out()
		{
			window.location="../login/login.php";
		}
	</script>
	<script type="text/javascript">
					function goproduct()
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
					
					function addAdmin()
					{
						window.location="../addAdmin/add-admin.php";
					}
					function feedback()
					{
						window.location="feedback.php";
					}
					
				</script>

</body>
</html>