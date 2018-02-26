<?php
require_once '/vagrant/config-monisecelso.php';
require_once "header.php";
?>

<style>

/*
.row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
}
.row > [class*='col-'] {
  display: flex;
  flex-direction: column;
}
*/

</style>
        <!-- MAIN SLIDER -->
    	<section id="main-slider" class="fixed-height">      	
            
            <!-- MAIN SLIDER TITLE OUTTER WRAPPER -->
        	<div class="slide-title-outter-wrapper">
            	
            	<!-- MAIN SLIDER TITLE INNER WRAPPER -->
				<div class="slide-title-inner-wrapper">
                            	
					<!-- TITLE 1  -->
					<div class="slide-title align-bottom">
                                	
						<div class="container">
                        	<div class="row">
                        		<div class="col-md-offset-3 col-md-6">
                                                                               
                                	<div class="page-title">
                        				
                                        <h1>Lista de Presentes</h1>
                                                       
                        				<div class="heart-divider">
                            				<span class="grey-line"></span>
                            				<i class="de-icon-heart pink-heart"></i>
                            				<i class="de-icon-heart grey-heart"></i>
                            				<span class="grey-line"></span>
                        				</div>
										
										<p>
											Se você quiser nos presentear, escolha um dos itens da lista. 
                                    	</p>
                                        
                                        <a href="#content" class="smooth-scroll">                                        	
            								<i class="de-icon-down-open-big" style="font-size:40px; color:#FFF"></i>                                            
        								</a>
										

									</div>
                        
								</div>
							</div>
						</div>
                                    
					</div>
                              
                                
				</div><!-- END of MAIN SLIDER TITLE INNER WRAPPER -->
                
			</div> <!-- END of MAIN SLIDER TITLE OUTTER WRAPPER -->
                         
            <!-- MAIN SLIDER IMAGES -->
            
  			<div class="slides">
    			
                	<!-- SLIDE IMAGE -->
                	<div data-stellar-ratio="0.5" class="slide-image" style="background-image:url(images/wedding/gift-registry-1920.jpg); background-position:top">
                    </div>
    			
  			</div><!-- END of MAIN SLIDER IMAGES -->
            
		</section><!-- ENF of MAIN SLIDER -->

		<?php
		
			error_reporting(E_ALL);
			ini_set('display_errors', 1);

			$categoria = trim((isset($_GET['category'])? $_GET['category'] : ''));

			$parametro = '';

			if (!$categoria && !is_numeric($categoria)) {
				$categoria = 2;
			}

			$parametro = "?category=$categoria";

			$service_url = API_END_POINT.'wedding/gift/search'.$parametro;

			$curl = curl_init($service_url);
			//curl_setopt($curl, CURLOPT_USERPWD, API_USER . ":" . API_PASSWORD);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$curl_response = curl_exec($curl);
			
			if ($curl_response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
				die('error occured during curl exec. Additioanl info: ' . var_export($info));
			} else {
				curl_close($curl);
				$decoded = json_decode($curl_response);
			}

			if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
				$decoded = array();
			}
		?>

        <!--CONTENT SECTION-->
        <section id="content">

            <!-- CONTAINER -->            
           	<div class="container" id="products">
                
				<div class="row" style="margin-bottom:30px;">
						<h3>CATEGORIAS</h3>
						<p>
							<a href="gift.php?category=2#products" class="de-button small <?php echo ($categoria==2)?"reverse":""; ?>">
								CAMA, MESA E BANHO
							</a>
							<a href="gift.php?category=5#products" class="de-button small <?php echo ($categoria==5)?"reverse":""; ?>">
								ELETRODOMÉTICOS
							</a>
							<a href="gift.php?category=6#products" class="de-button small <?php echo ($categoria==6)?"reverse":""; ?>">
								ELETRÔNICOS
							</a>
							<a href="gift.php?category=7#products" class="de-button small <?php echo ($categoria==7)?"reverse":""; ?>">
								ELETROPORTÁTEIS
							</a>
							<a href="gift.php?category=8#products" class="de-button small <?php echo ($categoria==8)?"reverse":""; ?>">
								UTILIDADES DOMÉSTICAS
							</a>
							<a href="gift.php?category=9#products" class="de-button small <?php echo ($categoria==9)?"reverse":""; ?>">
								MÓVEIS
							</a>
							<a href="gift.php?category=99#products" class="de-button small <?php echo ($categoria==99)?"reverse":""; ?>">
								CASAMENTO
							</a>
						</p>                        		
				</div>

                <!-- BLOG -->
            	<div class="row">
                
					<?php foreach ($decoded as $item) { ?>

					<?php
						//sem estoque
						if ($item->quantidade <=0) continue;
					?>


                    <!-- BLOG ITEM-6 -->
               		<div class="blog-wrapper col-md-3">
                    
                    	<!--PHOTO-ITEM-->
                      	<div class="photo-item animation fadeIn photo-small">
								
                        	<!--PHOTO-->
                            <img src="<?php echo $item->imagem ?>" alt="" class="hover-animation">
                                            
                            <!--PHOTO OVERLAY-->
                           	<div class="layer wh100 hidden-black-overlay hover-animation half-fade-in">
                            </div><!--END of PHOTO OVERLAY-->
								
							<!--ICON LINK-->
							<div class="layer wh100 hidden-link hover-animation delay1 fade-in">
								<div class="alignment">
									<div class="v-align center-middle">
										<a href="shop.php?product=<?php echo $item->id ?>" class="de-button outline small">COMPRAR</a>
									</div>
								</div>
							</div><!--END of ICON LINK-->

						</div><!--END of PHOTO-ITEM--> 
                                        
                        <!-- TITLE & EXCERPT -->
                        <div class="title-excerpt animation fadeIn">
                        
                        	<div class="de-icon circle very-small-size custom-heart-icon">
            					<i class="de-icon-heart"></i>
            				</div>
                        	<h4><a href='#'><?php echo $item->nome ?></a></h4>
                          	<span class='small'><?php echo str_replace('#','&nbsp; ',str_pad($item->descricao,50,'#')) ?></span>
							<!--
							<p class='no-margin'>
								<?php if ($item->desconto) { ?>
									de: R$ <?php echo number_format($item->valor + $item->desconto, 2, ',', '.') ?>
								<?php } ?>
								&nbsp;
							</p>
							-->

							<div>
								<p class='strong no-margin price'>
									<?php if ($item->desconto && 1==2) { ?>
										por: 
									<?php } ?>
									R$ <?php echo number_format($item->valor, 2, ',', '.'); ?>

									&nbsp;&nbsp;&nbsp;<span>
										<a href="shop.php?product=<?php echo $item->id ?>" class="de-button small">
											Comprar
										</a>
									</span>									
								</p>
							</div>
							
							
                        </div><!-- END of TITLE & EXCERPT -->
                        
           			</div> <!-- END of BLOG ITEM-6 -->


					<?php } ?>

                    



             	</div><!-- END of BLOG -->
                
       		</div> <!-- END of CONTAINER -->
            
        </section><!-- END of CONTENT SECTION -->



<?php

require_once "footer.php";

?>
