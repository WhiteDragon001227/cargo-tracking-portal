<?php session_start();
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PackEX TRACKING PORTAL</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/logincss.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Package EXpress INC.</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
          		<?php if(isset($_SESSION['is_logged_in']))
						{echo "<li class='dropdown'> <a href='homepage.php' style='margin-top: 0px;' class='dropdown-toggle' data-toggle='dropdown'>Hello ".$_SESSION['name']."</a>
						<ul class='dropdown-menu'><div id='logoutid'><a href='checkUser.php'>Go to Homepage</a><br><a href='logout.php'>Logout</a></div></ul>
						</li>";
						}		
                    	 else{echo "<li class='dropdown'> <a href='login.php' style='margin-top: 0px;' class='dropdown-toggle' data-toggle='dropdown'>Login </a>
				<ul class='dropdown-menu'><div id='logoutid'><a href='register.php'>Regsiter Yourself</a><br><a href='login.php'>Login</a></div></ul>
				</li>";}?>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li class="active">
                        <a href="services.php">Services</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Track A Package <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li id="Tracking number">
			<form method="post" id="pnr_form" name="pnr_form">
            <input name="Tracking_id" class="normalFormTracking" id="trackfield" style="width: 200px; margin-left:10px;margin-right:10px;" maxlength="14">
							
                            <!--<input   type="submit"  name="submit" id="submit" value="Track">--> <br>
            <input id="tracking_mode_0" class="normalRadio" name="typ" type="radio" checked="checked" value="32" style="margin-left: 10px;"/>
            <label class="normalFormLabelHead" for="tracking_mode_0">
                Parcel Label No.
            </label><br>
            <button name="submitButton"  onclick = "submitFormInPopUp()"  style="height:30px; width:150px; margin-left:10px;">Track another Package</button>
            <input type="hidden" id="lang" name="lang" value="en">
        </form>
        <script>function submitFormInPopUp() 
{
 window.open('','Prvwindow','location=no,status=no,toolbar=no,scrollbars=yes,width=1024,height=650');

 document.pnr_form.action = "./track.php";
 document.pnr_form.target = "Prvwindow";
 document.pnr_form.submit(); 
}</script>
                            </li>
                        </ul>
                    </li>
                    
<li>
                                <a href="faq.php">FAQ</a>
</li>
                           
                      
            </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">PackEX Shipment Results</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Shipment Status Page</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <p><?php
				
$dbhost = 'internal-db.s193161.gridserver.com';
$dbuser = 'db193161';
$dbpass = 'dearjohn';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

$id=$_REQUEST['Tracking_id']; 

//echo "hello".$id; 
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
/*$sql = 'SELECT Tracking_id, Status_id, progress_ID, destination_id, sendersname_id, receivers_id,weight_id  , FROM Tracking';*/ //i remove
$sql = "SELECT * FROM `tracking` WHERE `Tracking_id` = '$id' "; // i add

mysql_select_db('db193161_tracking');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
/*$row = mysql_fetch_array($retval, MYSQL_ASSOC);
if($row==NULL)
echo "<span style='color:red;'>Invalid Tracking.No</span>";*/
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
     echo "
<table id='statusFeed' width=\"50%\" border=\"1\">\n";
  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Tracking Number:  </th><td>[{$row['Tracking_id']}] </td>
  </tr>";


  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Status:  </th><td>{$row['Status_id']}</td>
  </tr>";

  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Destination: </th><td>{$row['destination_id']}</td>
  </tr>";
	

  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Sender :  </th><td>{$row['sendersname_id']}</td>
  </tr>";
	
  echo "<tr> ";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Receiver :  </th><td>{$row['receivers_id']}</td>
  </tr>
";
		
  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Weight(Kg/Lbs) :  </div></th><td>{$row['weight_id']}</td>
  </tr>
";
  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Service Type:  </div></th><td>{$row['service_id']}</td>
  </tr></table>";
	/*------------------------------------------------------Shipment Info------------------------------------------------------------*/	
  echo " <table id='shipment' style='border: 1px solid darkgray;'><tr>";
    echo "<div id='heading'><th>Date/Time</th>";
   echo " <th style='text-align: center;'>Activity</th>";
   echo " <th>Location</th></div></tr>";

   echo" <tr>
   <td>{$row['Date']}</td>
    <td>{$row['progress_ID']} </td>
    <td>{$row['location']} </td>
  </tr>
  <tr>
   <td>{$row['Date1']}</td>
    <td>{$row['progress_ID1']} </td>
    <td>{$row['location1']} </td>
  </tr>
  <tr>
    <td>{$row['Date2']}</td>
    <td>{$row['progress_ID2']}</td>
    <td>{$row['location2']}</td>
  </tr>
  <tr>
    <td>{$row['Date3']}</td>
    <td>{$row['progress_ID3']}</td>
    <td>{$row['location3']}</td>
  </tr>
  <tr>
    <td>{$row['Date4']}</td>
    <td>{$row['progress_ID4']}</td>
    <td>{$row['location4']}</td>
  </tr>
  <tr>
    <td>{$row['Date5']} </td>
    <td>{$row['progress_ID5']} </td>
    <td>{$row['location5']}</td>
  </tr>";
  echo "<tr>";
    echo" <td>{$row['Date6']} </td>";
    echo" <td>{$row['progress_ID6']}</td>";
    echo " <td>{$row['location6']}</td>
  </tr>
</table>";
if($row['progress_ID1']!=NULL) {$val1=1;$designId1='circleProgressActive';} 
else {$val1=0;$designId1='circleProgress';}
if($row['progress_ID2']!=NULL){$val2=1;$designId2='circleProgressActive';} 
else {$val2=0;$designId2='circleProgress';}
if($row['progress_ID3']!=NULL){$val3=1;$designId3='circleProgressActive';} 
else {$val3=0;$designId3='circleProgress';}
if($row['progress_ID4']!=NULL){$val4=1;$designId4='circleProgressActive';} 
else {$val4=0;$designId4='circleProgress';}
if($row['progress_ID5']!=NULL){$val5=1;$designId5='circleProgressActive';} 
else {$val5=0;$designId5='circleProgress';}
if($row['progress_ID6']!=NULL){$val6=1;$designId6='circleProgressActive';} 
else {$val6=0;$designId6='circleProgress';}
echo "<div id='rightBox'>
<div id='shipStartDate'>Shipping(start) date<br></div>
<div id='textInfo'>
	{$row['Date']},
    {$row['location']}<br>
	{$row['progress_ID']} </div>
<div id='shipStartDate'>Track Progress</div>	
<div id='textInfo'><div id='progressBar'>
<meter value='$val1'>{$row['progress_ID1']}</meter><div id='$designId1'>1</div>
<meter value='$val2'>{$row['progress_ID2']}</meter><div id='$designId2'>2</div>
<meter value='$val3'>{$row['progress_ID3']}</meter><div id='$designId3'>3</div>
<meter value='$val4'>{$row['progress_ID4']}</meter><div id='$designId4'>4</div>
<meter value='$val5'>{$row['progress_ID5']}</meter><div id='$designId5'>5</div>
<meter value='$val6'>{$row['progress_ID6']}</meter><div id='$designId6'>6</div>
</div>
<br>";
if($val6!=1)echo "<span style='color:red;'>Not Delivered";
else echo "<span>Delivered";
echo"<br>Current Status : {$row['Status_id']}</span> </div>

<div id='shipStartDate'>Estimated Delivery Date</div>
<div id='shipEndDate'></div>
</div>";
}


mysql_close($conn);
?></p>
                
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Packageexpres.com 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
