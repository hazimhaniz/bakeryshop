
<?php
// include database configuration file
include 'dbConfig.php';

// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;

      if (empty($_SESSION['c_id']))
   {
      header('Location: ../signin/signin.php');
      // Immediately exit and send response to the client and do not go furthur in whatever script it is part of.
      exit();
   }

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: product.php");
}

// get customer details by session customer ID
$query = $db->query("SELECT * FROM customer WHERE c_id = ".$_SESSION['c_id']);
$custRow = $query->fetch_assoc();

  $err_name="";
  $err_no="";
  $err_date="";
  $err_svc="";

  

  if(isset($_POST['payment']))
  {
	
	
  	$cardname=$_POST['card_name'];
  	$card_no=$_POST['card_no'];
  	$exp_m=$_POST['exp_month'];
  	$exp_y=$_POST['exp_year'];
  	$scv=$_POST['scv'];
  	$bank=$_POST['bank'];
  	$type=$_POST['type'];
	$card_insert="INSERT INTO credit_card(cardholder,credit_no,exp_year,exp_month,security_code,type,bank) VALUES('$cardname','$card_no','$exp_y','$exp_m','$scv','$type','$bank')";
	$insert= mysqli_query($db, $card_insert);
	
	if($insert){
		$sql= "SELECT * FROM credit_card where credit_no ='$card_no' and security_code='$scv'and cardholder='$cardname' and bank='$bank' and type='$type'";
		$checksql = mysqli_query($db, $sql);
		$check= mysqli_num_rows($checksql); 

		if(empty($cardname)&&$cardname=="")
			$err_name="pls enter the card name";
		else if(empty($card_no))
			$err_no="pls enter the valid credit card number";
		else if(empty($exp_m)||empty($exp_y))
			$errdate="pls enter a expiry date";
		else if(empty($scv))
			$err_svc="pls enter a security code";
		else if($checksql!=0)
		{header("Location:cartAction.php?action=placeOrder");
		}
		else{
		 header("Location:payment.php");}
	}
		 

}


  
  
  ?>

<!DOCTYPE html>
<html>
<title>Checkout</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cart.css">
   
    <style>
    .container{width: 100%;padding: 50px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
<style type="text/css">
	body{
background-image:url(../../png/back1.jpg);
background-repeat:no-repeat;
background-size:2200px 1500px;

	}


ul {
    list-style-type: none;
  
    padding: 30px;
    overflow: hidden;

     list-style-type: none;
    
    margin-top:13%;
    min-width: 40.5%;
    margin-left: 8%;
   
}
span{
	color:red;
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
.logo{width:350px; height:220px;margin-left:340px;margin-right:auto;margin-top:2%;border-radius:10px;}
.logocontainer{top:4px;}
.navbar{ height: 200px;
    width: 1003px;
}
div .navbar{
	margin-bottom: 0px;
}




h1{

font-size:30px;
font-family:monospace;
font-weight:bold;
 color:#0066ff;

}


#icon	{

				padding:5px;

		}



.container{
width:50%;

border-radius:20px;

box-shadow:5px 5px 5px 5px #bbb;
background-image:url(payment.jpg);
background-size:1000px 1100px;
background-repeat:no-repeat;

margin-left:5%;
margin-top:3%;

			}
			

fieldset { border:0px;
}

			
.grp_label{
			margin-top:10px;

		}

label{
font-family:monospace;
font-size:15px;
font-weight:bold;
color: #005ce6;
}		

	
input{
border-color:#3385ff;
border-style:double;
border-width:thin;
border-radius:5px;

box-shadow:2px 2px 2px 2px #bbb;
}

#grp_icon li{	
				list-style-type:none;
				position:relative;
				float:left;
margin-left:2%;
			}
			

</style>

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
		  <li><a class="about" href="../aboutus/aboutus.php">Contact Us </a></li>
		  <li><a class="signin" href="../logout.php">Log Out</a></li>
		</ul>
	
			</div>	

			
	</div>

<div class="container">
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'RM'.$item["price"] ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo 'RM'.$item["subtotal"]; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo 'RM'.$cart->total(); ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Order Details</h4>
        <p><?php echo $custRow['c_name']; ?></p>
        <p><?php echo $custRow['c_email']; ?></p>
        <p><?php echo $custRow['c_hp']; ?></p>
        <p><?php echo $custRow['c_address']; ?></p>
    </div>
    <div class="footBtn">
        <a href="product.php" class="btn btn-warning">< Continue Shopping</a>
       
    </div>
</div>

<div class="container">
 
 	<form name="payment" method="post">
    <fieldset >
	
	<h1>Payment</h1>
<br>
		<div class="grp_label">
		
		</div>

	  
      <div class="element">
			<label class="element-label">Card Holder's Name</label>
		
				<div class="content">
			
				<input type="text" name="card_name"  size="40" maxlength="50"
				placeholder="Card Holder's Name">
				<span><?php echo $err_name;?></span>
			
				</div>
		
      </div>
	  <br/>
	  
      <div class="element">
	  
			<label class="element-label">Card Number</label>
			
				<div class="content">
				
				<input type="text" name="card_no" size="40" maxlength="50"
				placeholder="Debit/Credit Card Number">
				<span><?php echo $err_no;?></span>
				
				</div>
      </div>
	  <br/>
	  
      <div class="element">
	  
			<label class="element-label">Expiration Date</label>
		
			<div class="content">
		
					<select name="exp_month">
			  
						<option>Month</option>
						<option value="01">Jan (01)</option>
						<option value="02">Feb (02)</option>
						<option value="03">Mar (03)</option>
						<option value="04">Apr (04)</option>
						<option value="05">May (05)</option>
						<option value="06">June (06)</option>
						<option value="07">July (07)</option>
						<option value="08">Aug (08)</option>
						<option value="09">Sep (09)</option>
						<option value="10">Oct (10)</option>
						<option value="11">Nov (11)</option>
						<option value="12">Dec (12)</option>
					</select>
					

					<select name="exp_year">
						<option value="17">2017</option>
						<option value="18">2018</option>
						<option value="19">2019</option>
						<option value="20">2020</option>
						<option value="21">2021</option>
						<option value="22">2022</option>
						<option value="23">2023</option>
						<option value="24">2024</option>
						<option value="25">2025</option>
						<option value="26">2026</option>
						<option value="27">2027</option>
					</select>
					<span><?php echo $err_date;?></span>
					
					
					
				
				
			</div>
	</div>
	<br/>
	
      <div class="element">
	  
			<label class="element-label">Card SCV</label>
		
				<div class="content">
		
				<input type="text" name="scv"  size="40" maxlength="50"
				placeholder="Security Code">
				<span><?php echo $err_svc;?></span>
		  
				</div>
      </div>
	  <br/>
	<div class="element">
			<label class="element-label">Card Bank</label>
			<select name="bank">
				<option value="cimb">CIMB BANK</option>
				<option value="public">PUBLIC BANK</option>
				<option value="hongleong">HONG LEONG BAN</option>
				<option value="maybank">MAYBANK"</option>
			</select>
		</div>
		<br/>

		<div class="element">
    		<label class="element-label">Card Type</label>
			<select name="type">
			<option value="master">Master</option>
			<option value="visa">Visa</option>
			</select>
		</div>
		
		
		
		
      <div class="element">
	  
				<input class="btn btn-success orderBtn" type="submit" name="payment" value="submit"></input>
      </div>

	 </br>
	  
    </fieldset>
	
  </form>
  
  
</div>
</body>
</html>