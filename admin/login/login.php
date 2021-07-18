<!DOCTYPE html>
<?php
   include("../../config.php");
   session_start();
   
 ?>
<html>
<style>
form {
    
 
 width:600px;
 box-shadow:5px 5px 5px 5px #bbb;
 border-radius:25px;
    margin-left: 35%;
    margin-right:60%;
  background-image:url("white-abstract-background_1.png");
 background-size: cover;

}


input[type=text], input[type=password] {
    width: 40%;
    padding: 5px 1px;
    margin: 10px 0;
    border: 0px double ;
	border-color:#000000;
	border-radius:25px;
	box-shadow:3px 3px 3px 3px #737373;
  margin-left:27%;
}

button {
    background-color: #000000;
    color: white;
	
	border:0px;
    padding: 10px 1px;
    margin: 40px 0;
	margin-left:29%;
	font-size:1em;
	
    width: 15%;
	
	cursor: pointer;
	
}

.cancelbutton{
    
    padding: 10px 18px;
    background-color: 	#696969;
}

span.password{
    float: left-side;
    padding-top: 20px;
	font-family:monospace;
	font-size:15px;

color:#000000;



}




h1{
color:#000000;
 
text-shadow: 2px 2px #999999;
font-family:garamond;

font-size:2em;
margin-left:42%;
  margin-bottom:3%;
margin-top:1%;	

}
h2{
color:#000000; 


font-family: garamond;
font-size:25px;
font-weight:bold;
margin-left:27%;
}

input[type=checkbox] {
  transform: scale(1.3)

}


.logo{
margin-left:44%;

}


body{

background-image:url("white-abstract-background_1.png");

background-repeat:no-repeat;
background-size:cover;
}
#fpassword{margin-bottom: 15px;
margin-left:29%;}

.chkbox{margin-left:29%;}


</style>
<title>Admin Log In</title>
</head>
<body> 

<div class="logo">
<img id="logo" src="../../png/logo1.png" width="270px" height="170px" alt=""/>
</div>



</style>


<h1>ADMIN LOGIN PAGE</h1>

<form name="login" method="post" action="adminverify.php">
 </br>

  <div class="login">
  <div id="uname">
    <label><h2>Username</h2></label>
	<input type="text" placeholder="Please Enter Your Username" name="an" required/>
    </div>
    <div id="psw">
    <label><h2>Password</h2></label>
    <input type="password" placeholder="Please Enter Your Password" name="ap" required>
      </div>
      <div id="loginbtn">  
    <button name="loginbtn" type="submit" onclick="aa();">Login</button>
    </div>

 </div>
<?php if (isset($_GET["err"])) echo "Wrong Username or Password"; ?>
</form>

</body>
</html>

