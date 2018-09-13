<?php
ob_start();
session_start();
include ('config.php');
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (!isset($_SESSION['user_session'])) {
header("location:index.php");

}
 else{
 $_id=$_SESSION['user_session'];
// $user_id=$_SESSION['role'];
 } 
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Landlord Digital</title>

<!-- The styles -->
 <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>
<link rel="stylesheet" href="css/bootstrap.datetimepicker.css">
<link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
<link href="css/charisma-app.css" rel="stylesheet">

<link href='css/new/style.css' rel='stylesheet'>
<link href='css/priventive.css' rel='stylesheet'>


<link href='css/animate.min.css' rel='stylesheet'>
    <link href=" css/jquery.noty.css" rel='stylesheet'>
	<link href=" css/css_theme.min.css" rel='stylesheet'>

   <link href=" https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">

<style type="text/css" class="init">
</style>

<link href="css/jquery.dataTables.min.css" rel="stylesheet">
<link href="css/buttons.dataTables.min.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.flash.min.js"></script>
<script src="js/jszip.min.js"></script>	
<script src="js/pdfmake.min.js"></script>
<script src="js/vfs_fonts.js"></script>	
<script src="js/buttons.html5.min.js"></script>			
<script src="js/buttons.print.min.js"></script>	

<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>

<script>
var base_url= 'http://www.hilleconomicgroup.com';
</script>

<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link href="css/charisma-app.css" rel="stylesheet">

		<style>
		@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
		body, h1, h2, h3, h4, h5, h6{
			font-family: 'Open Sans', sans-serif;
		}
	</style>
	
</head>
<body>
<div class="navbar navbar-default" role="navigation">
  <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span></span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['user_session'] ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="profile.php">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
			</div>
</div>