<?php 

  session_start();

$Tracking_id = stripslashes($_REQUEST['Tracking_id']);
$Status_id = stripslashes($_REQUEST['Status_id']);
$destination_id = stripslashes($_REQUEST['destination_id']);
$sendersname_id = stripslashes($_REQUEST['sendersname_id']);
$receivers_id = stripslashes($_REQUEST['receivers_id']);
$weight_id = stripslashes($_REQUEST['weight_id']);
$service_id = stripslashes($_REQUEST['service_id']);
$Date = stripslashes($_REQUEST['Date']);
$progress_ID = stripslashes($_REQUEST['progress_ID']);
$location = stripslashes($_REQUEST['location']);
$Date1 = stripslashes($_REQUEST['Date1']);
$progress_ID1 = stripslashes($_REQUEST['progress_ID1']);
$location1 = stripslashes($_REQUEST['location1']);
$Date2 = stripslashes($_REQUEST['Date2']);
$progress_ID2 = stripslashes($_REQUEST['progress_ID2']);
$location2 = stripslashes($_REQUEST['location2']);
$Date3 = stripslashes($_REQUEST['Date3']);
$progress_ID3 = stripslashes($_REQUEST['progress_ID3']);
$location3 = stripslashes($_REQUEST['location3']);
$Date4 = stripslashes($_REQUEST['Date4']);
$progress_ID4 = stripslashes($_REQUEST['progress_ID4']);
$location4 = stripslashes($_REQUEST['location4']);
$Date5 = stripslashes($_REQUEST['Date5']);
$progress_ID5 = stripslashes($_REQUEST['progress_ID5']);
$location5 = stripslashes($_REQUEST['location5']);
$Date6 = stripslashes($_REQUEST['Date6']);
$progress_ID6 = stripslashes($_REQUEST['progress_ID6']);
$location6 = stripslashes($_REQUEST['location6']);


$dbhost = 'internal-db.s193161.gridserver.com';
$dbuser = 'db193161';
$dbpass = 'dearjohn';

/*$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';*/
$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
 


if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$sql="UPDATE tracking SET Status_id='$Status_id',destination_id='$destination_id',sendersname_id='$sendersname_id',
receivers_id='$receivers_id',weight_id='$weight_id',service_id='$service_id',Date='$Date',progress_ID='$progress_ID',
location='$location',Date1='$Date1',progress_ID1='$progress_ID1',location1='$location1',Date2='$Date2',progress_ID2='$progress_ID2',
location2='$location2',Date3='$Date3',progress_ID3='$progress_ID3',location3='$location3',
Date4='$Date4',progress_ID4='$progress_ID4',location4='$location4',Date5='$Date5',progress_ID5='$progress_ID5',
location5='$location5',Date6='$Date6',progress_ID6='$progress_ID6',location6='$location6' WHERE Tracking_id='$Tracking_id'";

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