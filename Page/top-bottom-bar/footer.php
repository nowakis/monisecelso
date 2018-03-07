
        
        <!-- FOOTER SECTION -->
            <footer>
            	<div class="image-divider fixed-height" style="background-image:url(images/normal/2013_Irago-18.jpg);" data-stellar-background-ratio="0.5" >
                
                	<div class="divider-overlay"></div>
                    
                    <!-- Use Center Middle Alignment to align middle the content for fixed-height parallax -->
                    <div class="alignment"> 
                    	<div class="v-align center-middle">                  	
                    
                    		<div class="container">                 	 
                    			<div class="row">
                        			<div class="col-md-12">
                          				
                                          <!--
                                        <div class="animation fadeInUp">
                     						<div id="thank-you">
                     							<div id="thank">Obrigado</div>
                     						</div>
                                        </div>
                                        -->
                        
                        				<div class="heart-divider animation delay1 fadeInUp">
                        					<span class="white-line"></span>
                        					<i class="de-icon-heart pink-heart"></i>
                        					<i class="de-icon-heart white-heart"></i>
                        					<span class="white-line"></span>
                        				</div>
                                    
										<div id="footer-couple-name" class="animation delay1 fadeInUp">
                                			MONISE & CELSO
                                		</div>
                     
                     				</div>
                     			</div>
                     		</div>
                     
                     	</div>
                   	</div>
                    
                </div>
            </footer>
		<!-- jQuery -->
    	<script src="js/jquery-1.11.1.min.js"></script>
        <!-- Pace -->
        <script src="js/pace/pace.min.js"></script> 
    	<!-- Bootstrap -->
    	<script src="js/bootstrap/bootstrap.js"></script>    
        <!-- Modernizr -->
        <script src="js/modernizr/modernizr.js"></script>  
        <!-- Device JS -->
        <script src="js/devicejs/device.js"></script>  
        <!-- TinyNav -->
        <script src="js/tinynav/tinynav.min.js"></script>
        <!-- SmoothScroll -->
        <script src="js/smoothscroll/jquery.smooth-scroll.js"></script>
        <!-- Flexslider -->
        <script src="js/flexslider/jquery.flexslider.js"></script>  
        <!-- Sticky -->
        <script src="js/sticky/jquery.sticky.js"></script>  
        <!-- Waypoint -->
        <script src="js/waypoint/jquery.waypoints.min.js"></script>
        <!-- DoubleTapToGo -->
        <script src="js/jquery-ui-widget/jquery.ui.widget.js"></script>
        <script src="js/jquery-doubletaptogo/jquery.dcd.doubletaptogo.js"></script>
        <!-- Vide -->
        <script src="js/vide/jquery.vide.js"></script>
        <!-- Stellar -->
        <script src="js/stellar/jquery.stellar.js"></script>
        <!-- Masonry -->
        <script src="js/masonry/masonry.pkgd.min.js"></script>
        <!-- Countdown -->
        <script src="js/countdown/jquery.plugin.js"></script>
        <script src="js/countdown/jquery.countdown.js"></script>
        <!-- Countdown Labels / Localisation -->
        <script src="js/countdown/jquery.countdown-custom-label.js"></script>
        <!-- Magnific Popup -->
        <script src="js/magnific-popup/jquery.magnific-popup.js"></script>
        <!-- Owl Carousel -->
        <script src="js/owlcarousel/owl.carousel.js"></script>
         <!-- RSVP -->
        <script src="js/rsvp/rsvp.js"></script>
         <!-- SHOP -->
        <script src="js/rsvp/shop.js"></script>
        <!-- Custom Core Script -->
        <script type="text/javascript" src="js/script.js"></script>        
        
        <!-- Custom Additional Script -->
        <?php
		if ($_SERVER['SCRIPT_NAME'] == '/gallery.php') { ?>
            <script type="text/javascript" src="js/main-slider-fade.js"></script>
        <?php } else { ?>
            <script type="text/javascript" src="js/main-slider-image-animation.js"></script>
        <?php } ?>


        <!-- Mascara --> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js" type="text/javascript"></script>        

		<script type="text/javascript">
			$(function() {
				//$.mask.definitions['~'] = "[+-]";
				$("#phone").mask("(99) 99999-9999");
			});
		</script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115289410-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-115289410-1');
        </script>

	</body>
</html>
