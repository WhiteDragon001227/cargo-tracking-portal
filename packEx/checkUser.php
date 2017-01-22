<?php session_start();
if ($_SESSION['is_admin']=='yes')
header("Location: ./homepage.php"); /* Redirect browser to admin homepage*/
else
header("Location: ./homepageUser.php"); /* Redirect browser to admin homepage*/
exit;?>