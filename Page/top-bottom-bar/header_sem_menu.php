<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
     	<meta content="width=device-width, initial-scale=1.0" name="viewport">
     	<meta name="description" content="">
      	<meta name="author" content="www.nowakis.com">
      	<title>Livia &amp; Fabio</title>
        
        <link rel="icon" href="images/favicon.jpg">
        <!-- Bootstrap -->
    	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" type="text/css" media="screen" />
        <!-- Pace -->
        <link rel="stylesheet" href="css/preloader.css"  media="screen">
        <link rel="stylesheet" href="css/preloader-default.css"  media="screen">
        <!-- Flexslider -->
        <link rel="stylesheet" href="css/flexslider/flexslider.css" type="text/css">
        <!-- Animate -->
        <link rel="stylesheet" href="css/animate/animate.css" type="text/css">       
        <!-- Countdown -->
        <link rel="stylesheet" href="css/countdown/jquery.countdown.css" type="text/css">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="css/magnific-popup/magnific-popup.css" type="text/css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="css/owlcarousel/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="css/owlcarousel/owl.theme.css" type="text/css">
        <!-- Icon -->
        <link rel="stylesheet" href="css/fonts/fontello/css/fontello.css" type="text/css" media="screen" />
        <!-- Font -->
        <link href='//fonts.googleapis.com/css?family=Oswald:200,400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href="//fonts.googleapis.com/css?family=Comfortaa%7CScope+One%7CTangerine:700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

        <!-- Theme CSS -->
    	<link href="css/style.css" rel="stylesheet" media="screen">
        
        <!-- Skin CSS -->
    	<!-- <link href="css/skin/light-teal/light-teal.css" rel="stylesheet" media="screen"> -->
        <!-- <link href="css/skin/light-teal/light-teal-reverse-navbar.css" rel="stylesheet" media="screen"> -->
        <link href="css/skin/pattern/pattern-1.css" rel="stylesheet" media="screen">

		<?php
		if ($_SERVER['SCRIPT_NAME'] == 'gallery.php') {
			echo '
			<style>
				html { overflow-y: scroll; }
			</style>
			';
		}
		?>
	</head>

<?php
$bodyClass = '';
if ($_SERVER['SCRIPT_NAME'] != '/' && $_SERVER['SCRIPT_NAME'] != '/index' && $_SERVER['SCRIPT_NAME'] != '/index.php') {
	$bodyClass = 'class="slider-title-page"';
}
if ($_SERVER['SCRIPT_NAME'] == '/gallery.php') {
	$bodyClass = 'class="full-gallery-page"';
}
?>
	<body <?php echo $bodyClass ?>>
    	<!--PRELOADER-->
        <div id="preloader">
        
        	<div class="alignment">
            	<div class="v-align center-middle"> 
            		
                    <!-- LEFT HEART -->
            		<div class="heart-animation">                	
            			<i class="de-icon-heart"></i>
               	 	</div>
                
                	<!-- RIGHT HEART -->
                	<div class="heart-animation-reverse">
            			<i class="de-icon-heart"></i>
                	</div>     
                     
                </div>
            </div>
            
        </div> <!--END of PRELOADER-->
       
        
		<?php
		$menuOption = '';
		if ($_SERVER['SCRIPT_NAME'] != '/gallery.php' && $_SERVER['SCRIPT_NAME'] != '/shop.php' && $_SERVER['SCRIPT_NAME'] != '/confirmation.php') {
			$menuOption = 'transparent';
		}
		?>

        <!-- NAVIGATION --> 
    	<header id="nav-header">
        	<nav id="nav-bar" class="top-bar fluid-width <?php echo $menuOption ?> nav-center sticky-nav animation fadeInDown">
            	
                <div id="nav-wrapper">
            		
                    <!-- LOGO -->
            		<div class="logo-wrapper">
                		<!-- CSS LOGO --> 
                        <a href="index.html">
                    		<div class="css-logo rounded">
                   				<div class="css-logo-text">
                        			<strong>L</strong><i class="de-icon-heart-1"></i><strong>F</strong>
                    			</div>
                    		</div>
                        </a>
                    
                    	<!-- IMG LOGO 
                    	<div class="img-logo">
                    		<img src="images/slide1.jpg">
                    	</div>-->
                	</div>
                	<!-- END of LOGO -->
                    
                    
                </div>
                
            </nav>
        </header> <!-- END of NAVIGATION -->