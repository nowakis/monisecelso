<?php
require_once '/vagrant/config-monisecelso.php';
require_once 'header.php';
?>

<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$product = trim((isset($_GET['product'])? $_GET['product'] : ''));

	if (!$product) {
		header("Location: gift.php");
		exit;
	}

	$service_url = API_END_POINT.'wedding/gift/'.$product;
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt($curl, CURLOPT_USERPWD, API_USER . ":" . API_PASSWORD);
	$curl_response = curl_exec($curl);
	
	if ($curl_response === false) {
		$info = curl_getinfo($curl);
		curl_close($curl);
		die('error occured during curl exec. Additioanl info: ' . var_export($info));
	} else {
		curl_close($curl);
		$product = json_decode($curl_response);
	}

	if (isset($product->response->status) && $product->response->status == 'ERROR') {
		$product = array();
	}
?>

<!--CONTENT SECTION-->
<section id="content">

		<!-- CONTAINER -->
		<div class="container">

			<!-- HEADING TITLE -->
			<div class="row">
				<div class="col-md-offset-3 col-md-6 text-center">
			
					<div class="page-title">
						<h1>CONFIRMAÇÃO DO PRESENTE</h1>
												
						<div class="heart-divider">
							<span class="grey-line"></span>
							<i class="de-icon-heart pink-heart"></i>
							<i class="de-icon-heart grey-heart"></i>
							<span class="grey-line"></span>
						</div>
					</div>
				
				</div>
			</div><!-- END of HEADING TITLE -->
			
			<form action="payment.php" method="post" id="shopform">
				<input type="hidden" name="product" value="<?php echo $product->id ?>">

			<div class="row">
				<div class="col-md-offset-1 col-md-5">
					<h2 style="margin-top:1px;"><?php echo $product->nome ?></h2>
					<p><?php echo $product->descricao ?></p>
					
					<!--
					<p class='no-margin'>
						<?php if ($product->desconto) { ?>
							de: R$ <?php echo number_format($product->valor + $product->desconto, 2, ',', '.') ?>
						<?php } ?>
					</p>
					-->
					<p class='strong no-margin price'>
						<!--<?php if ($product->desconto) { ?>
							por: 
						<?php } ?>-->
						R$ <?php echo number_format($product->valor, 2, ',', '.'); ?>
					</p>					

					<!--PHOTO-ITEM-->
                    <div class="photo-item animation fadeIn">
						<img src="<?php echo $product->imagem ?>" class="hover-animation image-zoom-in">
                     	<!--PHOTO OVERLAY-->
                        <div class="layer wh100 hover-animation fade-in">
                  		</div><!--END of PHOTO OVERLAY-->
					</div><!--END of PHOTO-ITEM-->

				</div>
				<div class="col-md-5">
					<h3 style="margin-top:1px;">Dados para Pagamento</h3>
				<div class="rsvp-wrapper">

					<!--TEXT SECTION-->
					<div class="row">
						<div id="message" class="message" >
							<!-- Show Message -->
						</div>
					</div>
								
					<div class="form-group">
						<label for="name">*SEU NOME</label>
						<input type="text" class="form-control ajax-input" id="name" name="name" placeholder="" data-required="Nome obrigatório">
					</div>                        
					<div class="form-group">
						<label for="email">*EMAIL</label>
						<input type="email" class="form-control ajax-input" id="email" name="email" placeholder="" data-required="Email obrigatório" >
					</div>   
					<div class="form-group">
						<label for="phone">*TELEFONE</label>
						<input type="text" class="form-control ajax-input" id="phone" name="phone" placeholder="" data-required="Telefone obrigatório">
					</div>			
					<div class="form-group">
						<label for="message">DEIXE SUA MENSAGEM PARA OS NOIVOS</label>
						<textarea id="message" name="message" class="form-control ajax-input" rows="7"></textarea>
					</div>   

					<div class="form-group">
						VALOR DA COMPRA: <strong>R$ <?php echo number_format($product->valor, 2, ',', '.'); ?></strong>
					</div>	 
					
					<div class="form-group">
						<input type="submit" id="submitButton"  name="submitButton" class="button medium reverse" value="PAGAR">
					</div> 
				</div>
				</div>
			</div><!--END of TEXT SECTION-->
			
			
			</form>
		</div><!-- END of CONTAINER -->    
			

</section> <!-- END content -->
			
<?php
require_once 'footer.php';
?>