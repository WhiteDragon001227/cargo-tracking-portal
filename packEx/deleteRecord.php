<?php session_start();


$Tracking_id = stripslashes($_REQUEST['tr_id']);

$dbhost = 'internal-db.s193161.gridserver.com';
$dbuser = 'db193161';
$dbpass = 'dearjohn';
$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
 
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$sql="DELETE from tracking WHERE Tracking_id='$Tracking_id'";

mysql_select_db('db193161_tracking');		
$qry=mysql_query( $sql, $conn );

if(!$qry)
{
die("Query Failed: ". mysql_error());
}
else
{
	//print_r($qry);
	//exit;
	header("Location: ./homepage.php");mysql_close($conn); /* Redirects to homepage of the admin */
	exit;
	}
	
 


?>