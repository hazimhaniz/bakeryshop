<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<?php
include("../../config.php");
 session_start();
 $message="";
 if (isset($_POST["submit"]))
{  $error =false;
    $c_name=$_POST["Name"];
	$c_username=$_POST["userName"];
	$c_password=($_POST["password"]);
	$c_email=$_POST["userEmail"];
	$c_hp=$_POST["c_hp"];
	$c_address=$_POST["c_address"];
	$birthday=$_POST["c_bd"];
	if(!isset($_POST['tc']))
    			{
    				$error=true;
    				$message="Accept Terms and conditions before submit";
    			}
    			if(empty($c_address))
	{
		$error = true;
		$message = "* Please enter your adress.";
	}
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
   if(empty($birthday))
	{
		$error = true;
		$message = "* Please enter your date of birth.";
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
    
   	if($_POST['password']==""&&empty($_POST['password']))
   	{
   		$error=true;
   		$message="Please enter password";
   	}
   	else
      if($_POST['password'] != $_POST['confirm_password']){
   	
   	
	$error=true; 
	$message = 'Passwords should be same<br>'; 
	}
	 $query = "SELECT c_username FROM customer WHERE c_username ='$c_username'";
      $result = mysqli_query($db,$query);
      $count = mysqli_num_rows($result);
      if($count!=0)
	  {
        $error = true;
        $message = "* Provided Username is already in use.";
      }
      if(empty($c_username))
  	{
  		$error=true;
  		$message="Please enter username";
  	}
	if(empty($c_name))
	{
         $error = true;
         $message = "* Please enter your name.";
    } 
    if(count($_POST)==0)
    			{
    				$message="Please enter the form";
    			}			
   
   if(!$error)
   {
      $sql = "insert into customer (c_name,c_username,c_password,c_email,c_hp,c_address,birthday) values ('$c_name','$c_username','$c_password','$c_email','$c_hp','$c_address','$birthday')";
      if (mysqli_query($db, $sql)) 
	  {
 ?>
        <script>
			alert( "Register Successfully!");
		</script>
<?php
      } 
      else 
	  {
               echo  "ERROR";
      }
    }

      mysqli_close($db);
 }
  
   ?>
<title>Register Page</title>

<style>
a{text-decoration: none;}

	
		#Form{	
				font-size:25px;
				
				font-weight:bold;
				letter-spacing:5px;
				color:#641E16;
				
				
		
		
			}
			form{margin-left:8%;margin-right:57%;background-image:url("../../png/back1.jpg");
			background-size:cover; background-repeat: no-repeat;
		}
			input[type]
	
		.text{
				
				font-size:25px;
				
				padding-left:10px;
				color:#FF4500;
				font-family:garamond;
				font-weight:bold;
				
			  }
			  form input{font-size: 20px;border-radius: 10px;}
			  .text1{
				
				font-size:25px;
				font-family:garamond;
				font-weight:bold;
				padding-left:10px;
				color:#FF6E82;
				
				
			  }
				
				.text2{
				
				font-size:25px;
				font-family:garamond;
				font-weight:bold;
				padding-left:10px;
				color:#FF6E82;
				
				
			  }
		body{
			
				line-height:30px;
				background-image:url(../../png/back1.jpg);
				
				
			
				
	  
	  
			}
			
		
		#term{		color:#000000;
				font-size:15px;
				font-weight:bold;
				t
		
		
		
			 }
			 #term a{color:#3377ff;}
			
			#logo{
	margin-left: 300px;
	margin-right: auto;
}
form span{float: right;font-size: 20px;}
body{

background-size:1930px 1200px;
font-family:Constantia, "Lucida Bright", "DejaVu Serif", Georgia, serif;font-size:14px;} 

.home{

background-color:#90EE90 ;}
	
::placeholder {
  color: red;
  opacity: 1; /* Firefox */
}

.home1{

background-color:#FF4500;}

.home2{

background-color:#641E16;}

.home3{

background-color:#FF6E82;}

.home4{

background-color:#F9E79F  ;}
a:hover:not(.active){
   font-size: 150%;
   background-color: black;
}
ul {
    list-style-type: none;
    margin: 50;
    padding:20px;
    overflow: hidden;
	
    margin-left: 8%;
    margin-right:25%;
    
}

 li a {
    display: block;
    color: white;
    text-align: center;
    padding: 4px 60px;
    text-decoration: none;

	font-size:1em; 
	
    padding-right: 40px;
    padding-left: 50px;
    transition: 0.5s;
   
}
.nav{
margin-right:10%;

}

li {
   
	
	
    float:left;


}		 

input{ background-color:gray;transition: 0.8s;
font-family:monospace;
font-weight:bold;
margin-right:2%;
}
input[type="submit"]{background-color:#FFB3C1;}
.button input{background-color:#FFB3C1;transition: 0.8s;
font-family:monospace;
font-weight:bold;
margin-right:2%}
.button input:hover{background-color:#F9E79E; }
#fname{margin-right:100px;}
#email{margin-right: 100px;}
#psw{margin-right: 100px;}
#nophone{margin-right: 100px;}
.message {font-size: 20px;color: red;font-weight: bold;text-align: center;width: 100%;padding: 10;}
.demo-table {background-image: url(../../png/back1.jpg);width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
.demo-table td {font-size: 20px;padding: 20px 15px 10px 15px;}
.demoInputBox {font-size: 20px;padding: 7px;border: #F0F0F0 1px solid;border-radius: 10px;}
</style>



</head>

<body>

	<img id="logo" src="../../png/logo1.png" width="300" height="200" alt=""/>



<div class="nav">
<ul> 
   <li><a class="home4" href="../signin/signin.php">Sign In</a></li>
  
</ul>
</div>
<form name="frmRegistration" method="post" action="">
<table border="0" width="500" align="center" class="demo-table">
<div class="message"><?php if(isset($message)) echo $message; ?></div>
<tr>
<td>Name</td>
<td><input type="text" class="demoInputBox" name="Name" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
</tr>
<tr>
<td>Username</td>
<td><input type="text" class="demoInputBox" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" class="demoInputBox" name="password" value=""></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" class="demoInputBox" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
</tr>
<tr>
	<td>Birthday</td>
	<td><input type="date" class="demoInputBox" name="c_bd" value="<?php if (isset($_POST['c_bd'])) echo $_POST['c_bd'];?>"></td>
</tr>
<tr>
<td>Phone Number</td>
<td><input type="text" placeholder="011-39663562" class="demoInputBox" name="c_hp" value="<?php if(isset($_POST['c_hp']))echo $_POST['c_hp'];?>">
</td>
</tr>
<tr>
	<td>Addresss</td>
	<td><input type="text" class="demoInputBox" name="c_address" value="<?php if(isset($_POST['c_address']))echo $_POST['c_address'];?>"></td>
</tr>
<tr>
<td></td>
<td><input type="checkbox" name="tc" value="1"> I accept Terms and Conditions</td>
</tr>
</table>
<div>
<input type="submit" name="submit" value="Register" class="btnRegister">
</div>
</form>
</body>
</html>
