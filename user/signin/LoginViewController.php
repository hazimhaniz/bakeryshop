<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");


if (!isset($_SESSION['c_id'])) {
    header('Location: signin.php?err');
 
}
echo 'You have successfully logged as '.$_SESSION['c_id'];

?>