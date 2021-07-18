<?php

      session_start();  
    $_SESSION['c_id']=null;
    unset($_SESSION['c_id']);
    header("Cache-Control: no-cache, must-revalidate");
	header("location:signin/signin.php");
?>