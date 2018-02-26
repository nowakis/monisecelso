<?php
require_once 'header.php';
?>

       	<!-- MAIN SLIDER -->
    	<section id="main-slider" class="fixed-height"  >      	
            
            <!-- MAIN SLIDER TITLE OUTTER WRAPPER -->
        	<div class="slide-title-outter-wrapper">
            	
            	<!-- MAIN SLIDER TITLE INNER WRAPPER -->
				<div class="slide-title-inner-wrapper">
                            	
					<!-- TITLE 1  -->
					<div class="slide-title align-bottom">
                                	
						<div class="container">
                        	<div class="row">
                        		<div class="col-md-offset-2 col-md-8">                                     
                                     
                                    <div class="page-title">
                                		<h1>CONFIRME SUA PRESENÇA</h1>
                               		
                                        <div class="heart-divider">
                                    		<span class="white-line"></span>
                                        	<i class="de-icon-heart pink-heart"></i>
                                        	<i class="de-icon-heart white-heart"></i>
                                        	<span class="white-line"></span>
                                   		</div>
                                    	
                                        <p>Estamos muitos felizes e contamos com a sua presença no nosso grande dia.</p>
										<p>Confirme até o dia 03 de abril de 2018</p>
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
                	<div data-stellar-ratio="0.5" class="slide-image" style="background-image:url(images/wedding/parallax-1.jpg); background-position:top;">
                    </div>
                    
                    <div class="slide-overlay" style="opacity:0.2"> </div> 
    		</div>	<!-- END of MAIN SLIDER IMAGES -->
            
		</section><!-- ENF of MAIN SLIDER -->
        
        
        
        <!--CONTENT SECTION-->
        <section id="content">
        
        	<!-- ICON -->
        	<div class="icon-title">
           		<div class="de-icon circle light large-size aligncenter">
					<i class="de-icon-mail-2"></i>
 				</div>
			</div>
        
        	<!-- CONTAINER -->
			<div class="container">
                <form method="post" action="rsvp-server.php" id="rsvpform">
                <!--TEXT SECTION-->
                <div class="row">
                	<div id="message" class="col-md-offset-2 col-md-8 message">
                    	<!-- Show Message -->
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-offset-2 col-md-8">
                    	
                        <div class="form-group">
    						<label for="name">*NOME COMPLETO</label>
                            <div class="input-group">
                            	<div class="input-group-addon"><i class="de-icon-heart-empty"></i></div>
    							<input type="text" id="name" class="form-control ajax-input" placeholder="" data-required="Nome obrigatório" data-output-label="Nome">
                          	</div>
 						</div>

                        <div class="form-group">
                            <label>*VOCÊ IRÁ PARTICIPAR?</label>
                           	<div id="attended" class="ajax-input ajax-radio" data-required="Você irá participar?" data-output-label="input-radio-inline-custom - 2">
                            	<div data-toggle="buttons">
  									<label class="btn btn-primary custom-option-icon">
    									<input type="radio" name="participar" id="vai" value="1"> Sim
  									</label>
                               		<label class="btn btn-primary custom-option-icon">
    									<input type="radio" name="participar" id="nao"  value="0"> Não poderei participar
  									</label>
                                </div>
							</div> 
                       	</div>

                        <div class="form-group">
    						<label for="phone">*TELEFONE</label>
                            <div class="input-group">
                            	<div class="input-group-addon"><i class="de-icon-heart-empty"></i></div>
    							<input type="tel"  id="phone"  class="form-control ajax-input" placeholder="" data-required="Telefone obrigatório" data-output-label="Telefone">
                          	</div>
 						</div>                                                
                        <div class="form-group">
    						<label for="email">*EMAIL</label>
                            <div class="input-group">
                            	<div class="input-group-addon"><i class="de-icon-mail"></i></div>
    							<input type="email" id="email"  class="form-control ajax-input" placeholder="" data-required="Email obrigatório" data-output-label="Output Email">
                          	</div>
 						</div>                    

		                <div class="form-group">
    						<label for="guest">NOME DOS ACOMPANHANTES</label>
    						<textarea id="guest" class="form-control ajax-input" rows="4" data-output-label="Output Message"></textarea>
 						</div> 
						               
                        <div class="form-group">
    						<label for="message">DEIXE SUA MENSAGEM (opcional)</label>
    						<textarea id="message" class="form-control ajax-input" rows="4" data-output-label="Output Message"></textarea>
 						</div>       
                        
                        <div class="form-group submit-wrapper">
    						<input type="submit" id="submitButton"  name="submitButton" class="button medium reverse" value="ENVIAR" style="width:100%;">
 						</div>
                              
                    </div>
                   
				</div><!--END of TEXT SECTION-->
                
              
                </form>
           	</div><!-- END of CONTAINER -->    
                        
        </section> <!--END of CONTENT SECTION-->        

<?php
require_once 'footer.php';
?>
    
