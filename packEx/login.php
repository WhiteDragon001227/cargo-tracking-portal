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
                <h1 class="page-header">User
                    <small>Login</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Login</li>
                </ol>
            </div>
        </div>
        <!-- /.row --><center><form name="loginForm" method="post" onSubmit="formValidation()">
		<div class="login">
        <div id="head">User Login</div><br>
        <div class="control-group form-group">
                        <div class="controls" style="text-align: -webkit-left;">
                            <label style="margin-left: 15px;">Email Address:</label>
                            <input type="email" class="form-control" style="margin-left: 15px;width: 400px;" placeholder="Email-id" name="mail" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
         </div><br>
        <div class="control-group form-group">
                 <div class="controls" style="text-align: -webkit-left;">
                   <label style="margin-left: 15px;">Password:</label>
                     <input type="password" class="form-control" placeholder="Password" style="margin-left: 15px;width: 400px;"  name="password" id="name" required data-validation-required-message="Please enter password.">
                       <p class="help-block"></p>
                        </div>
         </div><div id="buttons">
        <input type="submit" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset">
        <br>
        <?php
		 if(isset($_GET['error'])){$error=$_GET['error'];echo "<span style='color:red;'>".$error."</span>";}?>
        </div>
        <div style="float:right;margin-right: 10px;margin-top: 7px;">Not a Registered user? Then <a href="register.php">Register Here</a></div>
        </div></form>
        <script>function formValidation()  
					{ 
						
						document.loginForm.action = "./verifyLogin.php";
						document.loginForm.submit(); 
					}</script>
        
        </center>
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
