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
 <link rel="stylesheet" type="text/css" href="css/dhtmlxcalendar.css"/>
	<script src="js/dhtmlxcalendar.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/logincss.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
<style>
		#calendar_input {
			border: 1px solid #909090;
			font-family: Tahoma;
			font-size: 12px;
		}
		#calendar_icon {
			vertical-align: middle;
			cursor: pointer;
		}
	</style>
    
   <script>
		var myCalendar;
		function doOnLoad() {
			myCalendar = new dhtmlXCalendarObject(["calendar","calendar1","calendar2","calendar3","calendar4","calendar5","calendar6"]);
		}
	</script>
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onLoad="doOnLoad();">

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

if(isset($_REQUEST['tr_id']))
$id=$_REQUEST['tr_id'];
else
if(isset($_REQUEST['Tracking_id']))
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
//print_r($row);
     echo "<form action='./updateValuesToDatabase.php' method='post' name='myform'>
<table id='statusFeed' width=\"50%\" border=\"1\">\n";
  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Tracking Number:  </th><td><input type='text' name='Tracking_id' class='form-control extra' value='{$row['Tracking_id']}' /> </td>
  </tr>";


  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Status:  </th><td><input type='text' name='Status_id' class='form-control extra' value='{$row['Status_id']}'/> </td>
  </tr>";

  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Destination: </th><td><input type='text' name='destination_id' class='form-control extra' value='{$row['destination_id']}'/></td>
  </tr>";
	

  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Sender :  </th><td><input type='text' name='sendersname_id' class='form-control extra' value='{$row['sendersname_id']}'/></td>
  </tr>";
	
  echo "<tr> ";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Receiver :  </th><td><input type='text' name='receivers_id' class='form-control extra' value='{$row['receivers_id']}'/></td>
  </tr>
";
		
  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Weight(Kg/Lbs) :  </div></th><td><input type='text' name='weight_id' class='form-control extra' value='{$row['weight_id']}'/></td>
  </tr>
";
  echo "<tr> \n";
    echo "<th bgcolor=\"#CCCCCC\" scope=\"col\">Service Type:  </div></th><td><input type='text' name='service_id' class='form-control extra' value='{$row['service_id']}' required data-validation-required-message='Please enter Service Type'/></td>
  </tr></table>";
	/*------------------------------------------------------Shipment Info------------------------------------------------------------*/	
 echo "<input type='button' name='commit' style='margin-top:40px;height:60px;' value='Update Tracking Details' onClick='myFunction()'>";

echo "<div id='rightBox' style='margin-top: -245px;height: 355px;'><div id='head' style='width: 511px;'>Update The Package Position and Time:</div> ";
  echo " <table id='shipment' style='border: 1px solid darkgray;width: 87%;margin-top: 35px;'><tr>";
    echo "<div id='heading'><th>Date/Time</th>";
   echo " <th style='text-align: center;'>Activity</th>";
   echo " <th>Location</th></div></tr>";

   echo" <tr>
   <td><input type='text'"; if($row['Date']==NULL)echo " id='calendar' "; echo "class='form-control extra1Date' name='Date' value='{$row['Date']}'"; if($row['Date']!=NULL)echo " readonly "; echo "/></td>
    <td><input type='text' class='form-control extra1Date' name='progress_ID' value='{$row['progress_ID']}'/> </td>
    <td><input type='text' class='form-control extra1Date' name='location' value='{$row['location']}'/> </td>
  </tr>
  <tr>
   <td><input type='text'"; if($row['Date1']==NULL)echo " id='calendar1' "; echo "class='form-control extra1Date' name='Date1' value='{$row['Date1']}'"; if($row['Date1']!=NULL)echo " readonly "; echo "/></td>
    <td><input type='text' class='form-control extra1Date' name='progress_ID1' value='{$row['progress_ID1']}'/> </td>
    <td><input type='text' class='form-control extra1Date' name='location1' value='{$row['location1']}'/> </td>
  </tr>
  <tr>
    <td><input type='text'"; if($row['Date2']==NULL)echo " id='calendar2' "; echo "class='form-control extra1Date' name='Date2' value='{$row['Date2']}'"; if($row['Date2']!=NULL)echo " readonly "; echo "/></td>
    <td><input type='text' class='form-control extra1Date' name='progress_ID2' value='{$row['progress_ID2']}'/></td>
    <td><input type='text' class='form-control extra1Date' name='location2' value='{$row['location2']}'/></td>
  </tr>
  <tr>
    <td><input type='text'"; if($row['Date3']=='')echo " id='calendar3' "; echo "class='form-control extra1Date' name='Date3' value='{$row['Date3']}'"; if($row['Date3']!=NULL)echo " readonly "; echo "/></td>
    <td><input type='text' class='form-control extra1Date' name='progress_ID3' value='{$row['progress_ID3']}'/></td>
    <td><input type='text' class='form-control extra1Date' name='location3' value='{$row['location3']}'/></td>
  </tr>
  <tr>
    <td><input type='text'"; if($row['Date4']=='')echo " id='calendar4' "; echo "class='form-control extra1Date' name='Date4' value='{$row['Date4']}'"; if($row['Date4']!=NULL)echo " readonly "; echo "/></td>
    <td><input type='text' class='form-control extra1Date' name='progress_ID4' value='{$row['progress_ID4']}'/></td>
    <td><input type='text' class='form-control extra1Date' name='location4' value='{$row['location4']}'/></td>
  </tr>
  <tr>
    <td><input type='text'"; if($row['Date5']==NULL)echo " id='calendar5' "; echo "class='form-control extra1Date' name='Date5' value='{$row['Date5']}'"; if($row['Date5']!=NULL)echo " readonly "; echo "/></td>
    <td><input type='text' class='form-control extra1Date' name='progress_ID5' value='{$row['progress_ID5']}'/> </td>
    <td><input type='text' class='form-control extra1Date' name='location5' value='{$row['location5']}'/></td>
  </tr>";
  echo "<tr>";
    echo" <td><input type='text'"; if($row['Date6']==NULL)echo " id='calendar6' "; echo "class='form-control extra1Date' name='Date6' value='{$row['Date6']}'"; if($row['Date6']!=NULL)echo " readonly "; echo "/></td>";
    echo" <td><input type='text' class='form-control extra1Date' name='progress_ID6' value='{$row['progress_ID6']}'/></td>";
    echo " <td><input type='text' class='form-control extra1Date' name='location6' value='{$row['location6']}'/></td>
  </tr>
</table>
</div>
</form>
";
}


mysql_close($conn);
?></p>
     <script type="text/javascript">
		function myFunction() 
		{
			document.myform.action = "./updateValuesToDatabase.php";
 			document.myform.submit();
		}</script>           
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
<script src="js/jqBootstrapValidation.js"></script>
     <script src="js/contact_me.js"></script>
</body>

</html>
