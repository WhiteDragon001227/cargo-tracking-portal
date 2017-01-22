<?php 

  session_start();

$dbhost = 'internal-db.s193161.gridserver.com';
$dbuser = 'db193161';
$dbpass = 'dearjohn';
$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
 
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('db193161_tracking');

$username = stripslashes($_REQUEST['username']);
$password = stripslashes($_REQUEST['password']);
$cpassword = stripslashes($_REQUEST['cpass']);
$fullname = stripslashes($_REQUEST['name']);
$email = stripslashes($_REQUEST['mail']);
if(strstr($fullname, '@')||strstr($fullname, '.')||strstr($fullname, '/')||strstr($fullname, '$'))
header("Location: ./register.php?error=Invalid Character in the Name field");
else if(strstr($username, '@')||strstr($username, '.'))
header("Location: ./register.php?error=Invalid Character in the Username field");
else if(strlen($password)>20||strlen($password)<7)
header("Location: ./register.php?error=Password Length shold be confined between 7-20");
else if($password!=$cpassword)
header("Location: ./register.php?error=Password and confirm Password donot match");

$qry=mysql_query("SELECT * FROM users WHERE email='$email'");
$result = mysql_query("SELECT * FROM users", $conn);
$num_rows = mysql_num_rows($result);
$num_rows=$num_rows+1;
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
$row=mysql_fetch_array($qry);
	if($row['username']==NULL){
						$no='no';
						$sql="INSERT INTO users (sno,username, password, name,is_admin,email) VALUES ('$num_rows','$username', '$password', '$fullname','$no','$email')";
						$result = mysql_query($sql, $conn);

			if (!$result) {
  				die('Error: ' . mysql_error($conn));
				}
		
				mysql_close($conn);
				header("Location: ./login.php?error=User Registered Successfully!!Please Login"); /* Redirects to homepage of the admin */
				exit;
								}
	else
	header("Location: ./register.php?error=User with this Email is Already existing");
 
 
}


?>