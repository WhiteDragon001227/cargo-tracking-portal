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
 <script type="text/javascript" language="javascript" src="js/lytebox.js"></script>
<link rel="stylesheet" href="css/lytebox.css" type="text/css" media="screen" />
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
			<form method="post" id="pnr_form1" name="pnr_form1">
            <input name="Tracking_id" class="normalFormTracking" id="trackfield" style="width: 200px; margin-left:10px;margin-right:10px;" maxlength="14">
							
                            <!--<input   type="submit"  name="submit" id="submit" value="Track">--> <br>
            <input id="tracking_mode_0" class="normalRadio" name="typ" type="radio" checked="checked" value="32" style="margin-left: 10px;"/>
            <label class="normalFormLabelHead" for="tracking_mode_0">
                Parcel Label No.
            </label><br>
            <button name="submitForm" onclick = "submitFormInPopUp()"  style="height:30px; width:150px; margin-left:10px;">Track</button>
            <input type="hidden" id="lang" name="lang" value="en">
        </form>
        <script>
function submitFormInPopUp() 
{
 window.open('','Prvwindow','location=no,status=no,toolbar=no,scrollbars=yes,width=1024,height=650');

 document.pnr_form1.action = "./track.php";
 document.pnr_form1.target = "Prvwindow";
 document.pnr_form1.submit(); 
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

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url(http://s13.postimg.org/csrhe6i0n/DSC_9564.jpg);"></div>
                <div class="carousel-caption">
                    <h2>PackEX Truck Service</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(image/Cargo-Plane-Flight-HD.jpg);"></div>
                <div class="carousel-caption">
                    <h2>PackEX Express</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url(image/warehouse.jpg);"></div>
                <div class="carousel-caption">
                    <h2>PackEX Warehouse</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Package Express Tracking Portal</h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i>At PackEX?</h4>
                    </div>
                    <div class="panel-body">
                        <p>We try to be the best in our field.Explore our site and send us your views</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Free Pick Up Service</h4>
                    </div>
                    <div class="panel-body">
                        <p>We offer free pick up service for all who need our service both old and young ,weak and strong Just use the contact us page and send us a mail.                    </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Easy to Use</h4>
                    </div>
                    <div class="panel-body">Tracking a Parcel just got easy as drinking water,just put in your parcel number and you are there now isn't that Simple! :)</div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">What we do</h2>
            </div>
            <div class="col-md-4 col-sm-6">
            <a href="image/workers.jpg" class="image lytebox" data-title="Packing Goods">
		 	<img src="image/workers.jpg" id="imageFit" class="image img-responsive img-portfolio img-hover"></a>
          	</div>
          	<div class="col-md-4 col-sm-6">
            <a href="image/RTR1JO5M.jpg" class="image lytebox" data-title="Packing Goods">
		 	<img src="image/RTR1JO5M.jpg" id="imageFit" class="image img-responsive img-portfolio img-hover"></a>
          	</div>
          <div class="col-md-4 col-sm-6">
            <a href="image/SHR46FU.png" class="image lytebox" data-title="Packing Goods">
		 	<img src="image/SHR46FU.png" id="imageFit" class="image img-responsive img-portfolio img-hover"></a>
          	</div>
          <div class="col-md-4 col-sm-6">
            <a href="image/walmart-warehouse.jpg" class="image lytebox" data-title="Packing Goods">
		 	<img src="image/walmart-warehouse.jpg" id="imageFit" class="image img-responsive img-portfolio img-hover"></a>
          	</div>
          <div class="col-md-4 col-sm-6">
            <a href="image/screen shot 2013-12-13 at 11.17.21 am.png" class="image lytebox" data-title="Packing Goods">
		 	<img src="image/screen shot 2013-12-13 at 11.17.21 am.png" id="imageFit" class="image img-responsive img-portfolio img-hover"></a>
          	</div>
          <div class="col-md-4 col-sm-6">
            <a href="image/le-petit-toyshop-delivery-van-image.jpg" class="image lytebox" data-title="Packing Goods">
		 	<img src="image/le-petit-toyshop-delivery-van-image.jpg" id="imageFit" class="image img-responsive img-portfolio img-hover"></a>
          	</div>
          
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">PackEX Shipping Services</h2>
            </div>
            <div class="col-md-6">
                <p>The PackEX Shipping Service includes:</p>
                <ul>
                    <li><strong>PackEX EXpress</strong>
                    </li>
                    <li>PackEX Ground</li>
                    <li>PackEX Freight Service</li>
                    <li>PackEX Mail Forwarder</li>
                    <li>PackEX Domestic Transfer</li>
                    <li>PackEX Truck Rentals</li>
                </ul>
                <p>Package Express Corporation (PackEX), incorporated on April 2, 2011, is a holding  company. The Company provides a portfolio of transportation, e-commerce  and business services under the PackEX brand. The Company operates in  four segments: PackEX Express, PackEX Ground, PackEX Freight and PackEX  Services. Package Express Corporation (PackEX Express) is an express  transportation company, offering time-certain delivery within one to  three business days and serving markets. PackEX Ground Package System,  Inc.</p>
            </div>
            <div class="col-md-6">
                <img src="./image/IMGA0462.jpg" alt="" width="640" height="480" class="img-responsive">
            </div>
        </div>
        <!-- /.row -->

        <hr>

 <?php /*?>        Call to Action Section 
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>If you wish to know where your PackEX parcel is at any specific time you can check on its current shipping status by entering the parcel label number or your reference number in the field below.</p>
                </div>
           <form method="post" id="pnr_form2" name="pnr_form2">
            <input name="Tracking_id" class="normalFormTracking" id="trackfield" style="width: 200px; margin-left:10px;margin-right:10px;" maxlength="14">
							
            <input id="tracking_mode_0" class="normalRadio" name="typ" type="radio" checked="checked" value="32" style="margin-left: 10px;"/>
            <label class="normalFormLabelHead" for="tracking_mode_0">
                Parcel Label No.
            </label><br>
            <button name="submitButton" onclick = "submitFormInPopUp()"  style="height:30px; width:150px; margin-left:763px;">Track</button>
            <input type="hidden" id="lang" name="lang" value="en">
        </form>
        <script>function submitFormInPopUp() 
{
 window.open('','Prvwindow','location=no,status=no,toolbar=no,scrollbars=yes,width=1024,height=650');

 document.pnr_form2.action = "./track.php";
 document.pnr_form2.target = "Prvwindow";
 document.pnr_form2.submit(); 
}</script></div>
        </div>

        <hr><?php */?>

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

    <!-- Bootstrap Core JavaScript-->
    <script src="js/bootstrap.min.js"></script> 

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
