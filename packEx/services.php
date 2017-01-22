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
            <button name="submitButton"  onclick = "submitFormInPopUp()"  style="height:30px; width:150px; margin-left:10px;">Track</button>
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
                <h1 class="page-header">Services
                    <small>We Offer</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Services</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="image/CARGO.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <!-- Service Panels -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Services Panels</h2>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>PackEX Express</h4>
                        <p>The fastest service if you want parcels delivered before your deadlines</p>
                        <a href="index.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>PackEX Ground</h4>
                        <p>This service is for those who are not in a hurry but wants safe delivery of parcels</p>
                        <a href="index.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>PackEX Freight</h4>
                        <p>Yes ! Finally we have a service for those who need the freight services</p>
                        <a href="index.php" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>PackEX Mail Forwarding</h4>
                        <p>Now cross borders and shop at home to your own USA ADDRESS!!!</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service Tabs -->
        <div class="row"></div>

        <!-- Service List -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
      <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Our Service List</h2>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">PackEX Express</h4>
                        <p>(PackEX Express) is an express transportation company, offering time-certain delivery within one to three business days and serving markets. </p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">PackEX Ground</h4>
                        <p>(PackEX Ground) is a provider of small-package ground delivery service. PackEX Ground provides day-certain service to every business address in the United States and Canada</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">PackEX Freight</h4>
                        <p>(PackEX Freight) is a provider of less-than-truckload (LTL) freight services.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">PackEX Mail Forwarding                       </h4>
                        <p>(PackEX Mail Forwarding) Offers USA address For those who wants to buy from American Stores and have them shipped over to Any Country</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-bomb fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">PackEX Drop Shipping                       </h4>
                        <p>(PackEX Drop Shipping) Just like the mail forwarding service this is a unique and first of its kind that offers USA address from more than SIX! states</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">PackEX Pick Up</h4>
                        <p>(PackEX Pick Up) offers Pick up service of packages FREE OF CHARGE </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">PackEX Truck Rentals                       </h4>
                        <p>(PackEX Truck Rentals) Offers Truck Rental For Movers and customers who want to move heavy machinery</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-space-shuttle fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">PackEX Domestic Money Transfer</h4>
                        <p>(PackEX Domestic Money Transfer) Is just like the other postal money transfers but packEX is FASTER! yes! WE ARE!</p>
                    </div>
                </div>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-recycle fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">PackEX Express Cheque Cashing Service                    </h4>
                        <p>Feel Free to passby our shipping Center to cash Your cheque.</p>
                    </div>
                </div>
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
