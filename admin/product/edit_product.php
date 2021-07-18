<?php
include ('../../config.php');
session_start();

$pname_error="";
$pt_error ="";
$pprice_error="";
$psize_error="";
$pin_error="";
$pdesc_error="";
?>

<?php

if (isset($_POST["save"]))
{   $error=false;
	$product_name=$_POST["product_name"];
	$product_ingredient=$_POST["product_ingredient"];
	$product_price=$_POST["product_price"];
	$product_size=$_POST["product_size"];
	$imgFile = $_FILES["product_pic"]['name'];
	$tmp_dir = $_FILES["product_pic"]['tmp_name'];
	$imgSize= $_FILES["product_pic"]['size'];
    $product_desc=$_POST["product_desc"];
    $available=$_POST["available"];
	
	if(empty($product_name))
	{
	  $error=true;
	  $pname_error="Please Enter Your Product Name.";
	}
	else if(empty($product_ingredient))
	{
		$error=true;
		$pin_error="Please enter the product ingredients.";
	}
	else if (empty($product_size)||$product_size<=0) 
	{
		$error=true;
		$psize_error="Please enter product size.";
	}

	
	else if(empty($product_price)||$product_price<=0)
	{
	$error=true;
	$pprice_error="Please Enter A valid price.";
	}
	else if(empty($product_desc))
	{
		$error=true;
		$pdesc_error="Please enter the Description of product.";
	}
	else if (empty($imgFile))
	{
	$pt_error="Please Select image File.";
	$error=true;
	}
	else if (!empty($imgFile))
	{ $upload_dir= __DIR__. "/img/" ;
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
		
		$valid_extensions = array('jpeg','jpg','png','gif');
		
		$product_pic = rand(1000,10000000).".".$imgExt;
		if(in_array($imgExt,$valid_extensions))
	{
		if($imgSize < 5000000)
		{
			move_uploaded_file($tmp_dir,$upload_dir.$product_pic);	
		}
		else
		{
		$pt_error="Sorry, your file is too large.";	
		$error=true;
		}
	}
		else
		{
			$pt_error="Sorry, Only JPG, JPEG, PNG & GIF files are allowed.";
			$error=true;
		}
		
	}	
	
	if(!$error)
	
	{$mysqli="UPDATE product SET product_name='$product_name',product_ingredient='$product_ingredient',product_size='$product_size',product_price='$product_price',product_desc='$product_desc',product_pic='$product_pic',available='$available' where product_id =".$_REQUEST["product_id"];
	
	

		if (mysqli_query($db, $mysqli)) 
		{ ?><script>
			alert( "New record created successfully");</script><?php
			header("refresh:0.1");
		} 
		else {
			echo "Error: " . $mysqli . "<br>" . mysqli_error($db);
		}
		{
	mysqli_close($db);
}	
}
}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Admin Add Product</title>
<style type="text/css">
	body{background-image: url(white-abstract-background_2.png);
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
	
	background-image:url(White-Wallpaper-2-2.jpg);
	background-size:150px 100px;}
	
	#admin-photo img{width:80px; height:80px; margin-left:50%;margin-top:80%; }
	
	#admin-photo{float: left; margin-bottom:20%; }
	
	#lnav{position: absolute;top:150px;}
	
	#lnav{float: left;}
	
	#inner-content {position: absolute;top: 350px;left: 35%;background-image:url(a.jpg);
	 box-shadow:5px 5px 5px 5px #bbb;
border-radius:25px;
margin-left:1%;
background-image:url(white-abstract-background_2.png);
	 }
	
	table tr td{padding: 30px 20px 20px 10px;
	font-family:cursive; 
}
	table tr th{padding:10px 0px 20px 20px;
	font-family:garamond;
	font-size:20px;}
	#editbtn{position: absolute;top:200px;right:100px;}

#out img{position: absolute;right:400px;}


.name{font-family:cursive; font-size:25px; margin-left:35px; color:white;}
#add-pic img{height: 350px;width: 350px;}
#proddetail input{position: absolute;left:100px;}
#proddetail div{margin-bottom: 20px;}
#subbtn input{width: 60px;height: 30px; }
span{margin-left:220px;color:red;}
#admin-name p{color:black;}
#admin-name span{color: black;font-style: italic;margin-left: 0px;}
</style>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
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
					function feed()
					{
						window.location="../feedback/feedback.php";

					}
					function addAdmin()
					{
						window.location="../addAdmin/add-admin.php";
					}
				</script>
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

					<button onclick="addAdmin();">Add Admin</button>
				</div>
			</div>
				
					
			</div>
			<div id="inner-content">
				<form method="post" name="addproduct" enctype="multipart/form-data">
					<div id="add-pic">
				<img id="blah" src="#" alt="your image">
				<input type="file" name="product_pic" onchange="readURL(this);">
				<span><?php echo $pt_error ?> </span></br>
    				
				</div>
				<div id="proddetail">
				
				<div id="product-name">
					<label>Name :</label><input type="text" name="product_name" ><span><?php echo $pname_error ?> </span>
				</div>
				<div id="product-detail">
					<label>Ingredients:</label><input type="text" name="product_ingredient"><span><?php echo $pin_error ?> </span>
				</div>
				<div>
					<label>Size(kg) :</label><input type="text" name="product_size">
					<span><?php echo $psize_error ?> </span>
				</div>
				<div>
					<label>Price :</label><input type="text" name="product_price">
					<span><?php echo $pprice_error ?> </span>
				</div>
				<div>
					<label>Description :</label><input type="text" name="product_desc">
					<span><?php echo $pdesc_error ?> </span>
				</div>
				<div>
					<label>Status :</label><select name="available"><option value="available">Available</option><option value="Not Available">Not Available</option></select>
				</div>
				
			</div>
			<div id="subbtn">
				<input type="submit" name="save" value="save">
			</div>
				</form>
			</div>
				
		<div id="out"><img src="../../png/bye.png" width=50px; height="50px" onclick="out();"></div>
	
	<script type="text/javascript">
					function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#blah")
                    .attr("src", e.target.result)
                    .width(350)
                    .height(350);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
				</script>
	
	<script type="text/javascript">
		function out()
		{
			window.location="../login/login.php";
		}
	</script>

</body>
</html>