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
height:550px;
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
  font-size:1em;
  
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
margin-left:40%;
}
.nav{
margin-right:10%;
}

body{

background-image:url("a5.jpg");
background-size:cover;}
#fpassword{bottom: 100px;}
.error p{font-size: 20px;color:red;margin-left: 10px;}
</style>
<body> 

<div class="logo">
<img id="logo" src="../logo.png" width="300px" height="200px" alt=""/>
</div>

<div class="nav">
<ul>
  
   <li><a class="home4" href="../signup/signup.php">Sign Up</a></li>
  
</ul>
</div>
</style>
<body >

<h1>Login page</h1>

<form name="login" method="post" action="verify.php">
  <div class="login">
  <div id="uname"></br>
    <label><h2><b>Username</b></h2></label>
    <input type="text" placeholder="Please Enter Your Username" name="c_username" required>
    </div>
    <div id="psw">
    <label><h2><b>Password</b></h2></label>
    <input type="password" placeholder="Please Enter Your Password" name="c_password" required>
      </div>
      <div class="error"><p><?php if (isset($_GET["err"])) echo "Wrongde Username or Password"; ?></p></div>
      
     </br>
     </br>
   <p><a href="forgetpass.php">Change Password</a></p>
 <div id="loginbtn">  
    <button type="submit" name="loginbtn">Login</button><br/>
    </div>
  
  </div>
  
</form>


</body>
</html>

