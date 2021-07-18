<?php
include("../../config.php");
session_start();  
$passError="";
$passError2="";
$nameError="";
if (isset($_POST["submit"]))
{  $error =false;
   $username=$_POST["admin_username"];
   $pw1=$_POST["pw1"];
   $pw2=$_POST["pw2"];
  if(empty($username))
  {
  	$error=true;
  	$nameError="Please enter your name";
  }
else if (empty($pw1)){
         $error = true;
         $passError = "Please enter password.";
   } 
   else if(strlen($pw1) < 6) {
            $error = true;
            $passError = "Password must have atleast 6 characters.";
      }

    else if($pw1 != $pw2){
      $error = true;
      $passError2 = "Password are difference with confirm password !";}
 if(!$error)
 {
  $sqlregister = "insert admin (admin_name,admin_password) values 
	('$username','$pw2')";
	
	$sqlcheck = "select admin_name from admin where admin_id = '$username'";
	$checkid = mysqli_query($db, $sqlcheck);
	
	$rowcount = mysqli_num_rows($checkid);
	
	if ($rowcount != 0)
	{
	?>
		<script type = "text/javascript">
			document.getElementById("idexist").innerHTML = "User already existed"
		</script>
<?php
	} else {
		if (mysqli_query($db, $sqlregister)) {
			echo '<script>';
			echo 'alert("New Admin Added")';
			echo '</script>';
		} else {
			echo "Error: " . $sqlregister . "<br>" . mysqli_error($db);
		}
	}
	mysqli_close($db);
}
}
?>
<!DOCTYPE html>
<html>

<head>

	<title>Add Admin</title>
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
	
	#lnav{position: absolute;top:150px;}
	
	#lnav{float: left;}
	
	#inner-content{position: absolute;top: 400px;left: 500px;box-shadow: 10px 5px 5px 5px #bbb;border-radius: 5px;
		width:700px;
		height:350px;
	 

	 }
	 #admin-name span{font-style: italic;color:black;}
	 #inner-content label{font-size: 20pt;}
	
	table tr td{padding: 30px 20px 20px 10px;
	font-family:cursive; 
}
	table tr th{padding:10px 0px 20px 0px;
	font-family:garamond;
	font-size:20px;}
	#editbtn{position: absolute;top:200px;right:100px;}

label,input{float:left;}
input[type="submit"]{width:70px;height:50px;left:600px;position: absolute;}
span{font-size: 20pt;color:red;}

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
			<h1>ADD ADMMIN</h1>
					<form name="addAdmin" method="post">
			
	   <label>Username : </label>
      <input type="name" id="add_admin_id" name="admin_username">
      <span><?php echo $nameError ?></span>
      <br><br> <br><br>


	   <label>Password : </label>
      <input type="password" id="add_admin_password" name="pw1"> 
      <span><?php echo $passError ?></span>
      <br><br> <br><br>

     

	   <label>Confirm Password : </label>
      <input type="password" id="confirm_admin_password" name="pw2">  
      <span><?php echo $passError2 ?></span>
      </br></br>
       <input type="submit" value="ADD" id="add_admin_button" name="submit">
     
      <br><br>

      </form>


						
	
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
					function addP()
					{
						window.location="add-product.php";
					}
					function addAdmin()
					{
						window.location="add-admin.php";
					}
					function feedback()
					{
						window.location="../feedback/feedback.php";
					}
					
				</script>

</body>
</html>