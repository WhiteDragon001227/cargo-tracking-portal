<?php 
$mail = stripslashes($_REQUEST['mail']);
$password = stripslashes($_REQUEST['password']);
//echo $username.$password;
//exit(1);
$dbhost = 'internal-db.s193161.gridserver.com';
$dbuser = 'db193161';
$dbpass = 'dearjohn';
$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
 
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('db193161_tracking');

$qry=mysql_query("SELECT * FROM users WHERE email='$mail' and password='$password'");
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
$row=mysql_fetch_array($qry);
	if($row['email']==$mail&&$row['password']==$password){
	session_start();
	// store session data
	$_SESSION['username']=$row['username'];
	$_SESSION['email']=$row['email'];
	$_SESSION['name']=$row['name'];
	$_SESSION['is_admin']=$row['is_admin'];
	$_SESSION['is_logged_in']=true;
	mysql_close($conn);
	if($row['is_admin']=='yes')
	header("Location: ./homepage.php"); /* Redirects to homepage of the admin */
	else
	header("Location: ./homepageUser.php"); /* Redirects to homepage of the admin */
	
	exit;
	}
	else
	header("Location: ./login.php?error=InvalidCredentials");
 
 
}


?>