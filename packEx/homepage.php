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

<body style="overflow-x: hidden;">
<?php if(!isset($_SESSION['is_logged_in'])){echo " &nbsp;&nbsp;&nbsp;error .....Please Login...<a href='login.php'>here</a>";exit; }?>
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
						{echo "<li class='dropdown'> <a href='#' style='margin-top: 0px;' class='dropdown-toggle' data-toggle='dropdown'>Hello ".$_SESSION['name']."</a>
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
            <button name="submitButton" onclick = "submitFormInPopUp()"  style="height:30px; width:150px; margin-left:10px;">Track</button>
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
                <h1 class="page-header">Hello
                    <small>Admin</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Admin HomePage</li>
                </ol>
            </div>
        </div>
        <!-- /.row --><center>
		<div class="login">
        
        <div id="head">Admin Details</div>
		<br>
        <table cellpadding="2" cellpadding="2">
        <tr><td>UserName :</td><td><?php echo $_SESSION['username'];?></td></tr>
        <tr><td>Name :</td><td><?php echo $_SESSION['name'];?></td></tr>
        <tr><td>Registered Email:</td><td><?php echo $_SESSION['email'];?></td></tr>
        </table>
        <div id="updateButton">
        <form action="./updateTrack.php" name="myform">
         Enter your Tracking.No:<input name="Tracking_id" class="normalFormTracking" id="trackfield" style="width: 200px;margin-bottom: 15px;margin-left:10px;margin-right:10px;" maxlength="14">
        <input type="button" name="commit" value="Update Tracking Details" onClick="myFunction()">
        </form></div>
        <script type="text/javascript">
		function myFunction() 
		{
			document.myform.action = "./updateTrack.php";
 			document.myform.submit();
		}
		</script>
        
        <form action="./createTrack.php" name="myform1">
        <input type="button" name="commitButton" value="Create New Tracking Detail" style="width:135px;margin-top: 45px;" onClick="myFunction1()">
        </form></div>
        <script type="text/javascript">
		function myFunction1() 
		{
			document.myform1.action = "./createTrack.php";
 			document.myform1.submit();
		}
		</script>
        </div>
        </center>
        <hr>
		<div class="trackingBox" style="margin-left: 70px;margin-right: 70px;">
        Tracking Details of All the Users
        <hr>
		<?php
$dbhost = 'internal-db.s193161.gridserver.com';
$dbuser = 'db193161';
$dbpass = 'dearjohn';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);


 
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
/*$sql = 'SELECT Tracking_id, Status_id, progress_ID, destination_id, sendersname_id, receivers_id,weight_id  , FROM Tracking';*/ //i remove
$sql = "SELECT * FROM `tracking` "; // i add

mysql_select_db('db193161_tracking');
$result = mysql_query( $sql, $conn );
if(! $result )
{
  die('Could not get data: ' . mysql_error());
}
echo "<form action='./updateTrack.php' method='post' name='form1'>";
echo "<table id='newStatusFeed'>
<tr>
<th>  </th><th>S.no</th>  <th>Tracking.No</th>  <th>Current Status</th>  <th>Sender</th>  <th>Receiver</th>  
<th>Destination</th>  <th>Service Type</th>  <th>Package Weight</th>  <th>Shipping Start Date</th>    
</tr>";
$i=0;

while($row = mysql_fetch_array($result)) 
{
$i++;
echo "<tr>
 <td><input type='radio' name='tr_id' value='{$row['Tracking_id']}'></td><td> $i </td>  <td> {$row['Tracking_id']} </td>  <td> {$row['Status_id']} </td>  <td> {$row['sendersname_id']} </td>  <td> {$row['receivers_id']} </td> 
 <td> {$row['destination_id']} </td>  <td> {$row['service_id']} </td>  <td> {$row['weight_id']} </td>  <td> {$row['Date1']} </td>
</tr>
";
if($i>10)break;  
}
echo"</table><center>
<input type='submit' value='Delete Tracking Details' onClick='formValidation()'/>
<input type='submit' value='Update Tracking Details'/>
<input type='reset' value='reset'/>
</center></form>";
mysql_close($conn);
?> <script>function formValidation()  
					{ 
						
						document.form1.action = "./deleteRecord.php";
						document.form1.submit(); 
					}</script>
        </div>
        </div>
       <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="margin-left: 110px;">Copyright &copy; Packageexpres.com 2014</p>
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
