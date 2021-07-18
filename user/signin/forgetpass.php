<!DOCTYPE html>
<?php
session_start();
   include("../../config.php");
   
 ?>

<html>

</head>
<title>Sign In</title>
<style type="text/css">
  form {
    border: px double ;
 box-shadow:5px 5px 5px 5px #bbb;
 border-radius:25px;
    margin-left: 15%;
    margin-right:50%;
width:680px;
height:600px;
background-image:url(a4.jpg);
background-size:1200px 1200px;

}


input[type=text], input[type=password] {
    width: 50%;
    padding: 5px 1px;
    margin: 10px 0;
    border: 0px double ;
  border-color:#000000;
  margin-left: 10px;
  box-shadow:3px 3px 3px 3px #ffb3b3;
  border-radius: 10px;
  font-size: 20px;
}

button {
    background-color: #FF6E82;
    color: white;
  
  
    padding: 10px 1px;
    margin: 40px 0;
  margin-left:10px;
  margin-top: 0px;
  font-size:1em;
  border-radius: 10px;
    width: 20%;
  
  cursor: pointer;
}

button:hover{color:#000000;}


.cancelbutton{
    
    padding: 10px 18px;
    background-color:   #696969;
}

span.password{
    float: left-side;
    padding-top: 20px;
  font-family:monospace;
  font-size:15px;

color:#000000;



}

h1{
color:#641E16;
 

font-family:Garamond;
font-size:2em;
margin-left:15%;
    margin-right:30%;
  

}
h2{
color:#FF4500; 


font-family: garamond;
font-size:30px;
font-weight:bold;
margin-left:2%;
width:300px;height: 50px;
margin-bottom: 10px;
}

input[type=checkbox] {
  transform: scale(1.3)

}

ul {
    list-style-type: none;
    margin: 50;
    padding:20px;
    overflow: hidden;
  
    margin-left: 15%;
    margin-right:25%;
    
}

li {
   
  
  
    float:left;


}
a{text-decoration: none;}
 li a {
    display: block;
    color: white;
    text-align: center;
    padding: 10px 60px;
    text-decoration: none;

     font-size:1em; 
  
    padding-right: 40px;
    padding-left: 50px;
    transition: 0.5s;
   
}
li a:hover:not(.active) {
    background-color: black;
    transition: 1s;
}

.home{

background-color:#90EE90 ;}

.home1{

background-color:#FF4500;}

.home2{

background-color:#641E16;}

.home3{

background-color:#FF6E82;}

.home4{

background-color:#F9E79F  ;}
a:hover:not(.active){
  font-weight: bold;
}
.logo{
margin-left:25%;
}
.nav{
margin-right:10%;
}
body{

background-image:url("a5.jpg");
background-size:cover;}
#fpassword{bottom: 100px;}
.login p{font-weight: bold;font-size:20px;color:red;margin-top:0px;position:absolute;right:1000px;}
.login input{float: left;margin-top: 0px;}

</style>
<body> 

<div class="logo">
<img id="logo" src="../logo.png" width="300px" height="200px" alt=""/>
</div>

<div class="nav">
<ul>
  
   <li><a class="home4" href="signin.php">Sign In</a></li>
  
</ul>
</div>
</style>
<body >

<h1>Change Password</h1>
<?php

$error_pass="";
$error_p1="";
$error_p2="";
$error_name="";
if(isset($_POST['submitbtn']))
{
  $error=false;
  $username=$_POST['c_username'];
  $current=$_POST['current_password'];
  $p1=$_POST['new_password'];
  $p2=$_POST['confirm_password'];

if(empty($username))
{
  $error=true;
  $error_name="Please enter username";
}
else
{
  $cid="SELECT c_id from customer where c_username='$username'";
  $result=mysqli_query($db,$cid);
  $idrow=mysqli_num_rows($result);
  if($idrow==0)
  {
    $error=true;
    $error_name="User doesn't exist";
  }
}
if(empty($current))
{
  $error=true;
  $error_pass="Please enter current password";
}
else
{
  $pass="SELECT c_password from customer where c_password='$current'";
  $result=mysqli_query($db,$pass);
  $row=mysqli_num_rows($result);
  if($row=mysqli_fetch_assoc($result))
  {
    $error=false;
   
  }
  else
  {
    $error=true;
     $error_pass="Password is wrong";
  }
}
if(empty($p1))
{
  $error=true;
  $error_p1="please enter new password";
}
if(empty($p2))
{
  $error=true;
  $error_p2="please enter confirm password";
}
if($p2!=$p1)
{
  $error=true;
  $error_p2="password should be same";
}

if(!$error)
{
  $sql="UPDATE customer SET c_password='$p1' where c_username='$username'";
  if (mysqli_query($db, $sql)) 
    { ?><script>
      alert( "Password change successfully");</script><?php
      header("location:signin.php");
    } 
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}

}
?>
<form name="forget" method="post">
 

  <div class="login">
    </br>
    <div>
    <label><h2><b>Username</b></h2></label>
    <input type="text" placeholder="Please Enter Your Username" name="c_username" >
    <br/>
    <p><?php echo $error_name;?></p>
    </div>
    <div id="psw">
    <label><h2><b>Current Password</b></h2></label>
    <input type="password" placeholder="Current Password" name="current_password" >
    <br/>
    <p><?php echo $error_pass;?></p>
      </div>
      <div id="psw">
    <label><h2><b>New Password</b></h2></label>
    <input type="password" placeholder="New Password" name="new_password">
    <br/>
    <p><?php echo $error_p1?></p>
      </div>
      <div id="psw">
    <label><h2><b>Confirm Password</b></h2></label>
    <input type="password" placeholder="Confirm Password" name="confirm_password">
    <br/>
    <p><?php echo $error_p2;?></p>
      </div>
      
     </br>
     </br>
   
 <div id="loginbtn">  
    <button type="submit" name="submitbtn">Change</button><br/>
    </div>
  </div>
</form>


</body>
</html>

