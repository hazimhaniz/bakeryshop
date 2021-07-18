<!DOCTYPE html>
<html>
<title>Payment</title>
<style type="text/css">
	body{
background-image:url(636039321125073199505928158_Download-Best_happy_birthday_cupcake_wallpaper.jpg);
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
.navbar{

margin-bottom:2%;
margin-top:2%;}





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
					<img class="logo" src="l../logo.png" alt="logo" >
			</div>
			
			
		<div class="navbar">
		<ul>
		  <li><a class="home" href="localhost/fyp/user/index/index.php">Home</a></li>
		  <li><a class="menu" href="../php_shopping_cart/index.php">Menu</a></li>
		  <li><a class="outlet" href="#order">Order History</a></li>
		  <li><a class="about" href="../aboutus/aboutus.html">About</a></li>
		  <li><a class="signin" href="../signin/signin.php">Sign In</a></li>
		</ul>
	
			</div>	

			
	</div>
	<?php  
$id=$_SESSION['id'];
 $query = "SELECT * FROM customer WHERE c_id = $id";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);

?>
<?php
include("../../config.php");
session_start();
if(isset($_POST['payment']))
{
	$card_name=$_POST['card_name'];
	$card_no=$_POST['card_no'];
	$card_exp_m=$_POST['exp_month'];
	$card_exp_y=$_POST['exp_year'];
	$scv=$_POST['scv'];

	$card_insert="INSERT INTO payment(card_name,card_no,card_exp_m,card_exp_y,scv) VALUES('$card_name','$card_no','$card_exp_m','$card_exp_y','$scv')";
}


?>


<div class="container">
  <form name="payment" method="post">
    <fieldset >
	
	<h1>Payment</h1>
<br>
		<div class="grp_label">
			
		
	

			
			
		</div>

	  
      <div class="element">
			<label class="element-label">Name on Card</label>
		
				<div class="content">
			
				<input type="text" name="card_name"  size="40" maxlength="50"
				placeholder="Card Holder's Name">
			
				</div>
		
      </div>
	  <br/>
	  
      <div class="element">
	  
			<label class="element-label">Card Number</label>
			
				<div class="content">
				
				<input type="text" name="card_no" size="40" maxlength="50"
				placeholder="Debit/Credit Card Number">
				
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
					
					
					
				
				
			</div>
	</div>
	<br/>
	
      <div class="element">
	  
			<label class="element-label">Card SCV</label>
		
				<div class="content">
		
				<input type="text" name="scv"  size="40" maxlength="50"
				placeholder="Security Code">
		  
				</div>
      </div>
	  <br/>


		<div id="grp_icon">
    
			<img src="card_logo.png" width="200px" height="80px">
		</div>
		
		
		
      <div class="element">
	  
				<div class="button">
		
				<input href="orderHistory.php" type="submit" name="payment" value="paymant" />
		  
				</div>
      </div>
	 </br>
	  
    </fieldset>
	
  </form>
  
</div>
</body>
</html>