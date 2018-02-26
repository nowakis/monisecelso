<?php
require_once '/vagrant/config-monisecelso.php';
require_once 'header.php';
?>

<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$referenceCode = trim((isset($_GET['referenceCode'])? $_GET['referenceCode'] : ''));

	if (!$referenceCode) {
		header("Location: index.php");
		exit;
	}

/*?merchantId=643695&merchant_name=Fabio+Nowaki&
merchant_address=Rua+Avanhdandava+40+AP+1010+Bela+Vista
&telephone=14981354478
&merchant_url=http%3A%2F%2Fwww.nowakis.com%2F
&transactionState=7
&lapTransactionState=PENDING
&message=PENDING
&referenceCode=LIVIA+E+FABIO%3A8bc5e9d04bb4c29553e9
&reference_pol=941012234
&transactionId=c85e10f2-c35c-4890-8661-3ab5e1ff3e2b
&description=Compra+do+presente+Grill+Mondial+Redondo+Smart+Grill+G-04
&trazabilityCode=&cus=&orderLanguage=pt&extra1=&extra2=
&extra3=&polTransactionState=14&signature=d16a8274b048d9114dd15aecb851613f
&polResponseCode=25&lapResponseCode=PENDING_TRANSACTION_CONFIRMATION&risk=
&polPaymentMethod=160&lapPaymentMethod=BOLETO_BANCARIO&polPaymentMethodType=8
&lapPaymentMethodType=REFERENCED&installmentsNumber=1&TX_VALUE=109.90&TX_TAX=.00
&currency=BRL&lng=pt&pseCycle=&buyerEmail=fabio.nowaki%40gmail.com&pseBank=
&pseReference1=&pseReference2=&pseReference3=&authorizationCode=
*/


/*


?merchantId=643695&
merchant_name=Fabio+Nowaki&
merchant_address=Rua+Avanhdandava+40+AP+1010+Bela+Vista
&telephone=14981354478
&merchant_url=http%3A%2F%2Fwww.nowakis.com%2F&transactionState=7
&lapTransactionState=PENDING
&message=PENDING
&referenceCode=LIVIA+E+FABIO+%2877ded10cbe%29
&reference_pol=941996092
&transactionId=6c2c068d-0a5b-4953-9765-04e16d9f17fb
&description=Compra+do+presente+Liquidificador+Arno+Clic%27Lav+Top
&trazabilityCode=
&cus=
&orderLanguage=pt
&extra1=
&extra2=
&extra3=
&polTransactionState=14
&signature=d4bcb4eaef82e0802960a8be31d56e0d
&polResponseCode=25
&lapResponseCode=PENDING_TRANSACTION_CONFIRMATION
&risk=
&polPaymentMethod=160
&lapPaymentMethod=BOLETO_BANCARIO
&polPaymentMethodType=8
&lapPaymentMethodType=REFERENCED
&installmentsNumber=1
&TX_VALUE=149.90&TX_TAX=.00
&currency=BRL&lng=pt
&pseCycle=
&buyerEmail=fabio.nowaki%40gmail.com
&pseBank=&pseReference1=
&pseReference2=
&pseReference3=
&authorizationCode=
*/

	$service_url = API_END_POINT."wedding/order/search?referenceCode=".urlencode($referenceCode);
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
		$order = json_decode($curl_response);
	}

	if (isset($order->response->status) && $order->response->status == 'ERROR') {
		$order = header('Location: /');
	}

	function OrderStatus($status) {
		switch ($status) {
			case 'APPROVED' : return 'Aprovado';
			case 'DECLINED' : return 'Rejeitado';
			case 'PENDING' : return 'Pendente';
			case 'EXPIRED' : return 'Expirado';
			case 'ERROR' : return 'erro';
		}
	}
?>

<!--CONTENT SECTION-->
<section id="content">
		
		<!-- CONTAINER -->
		<div class="container">

			<!-- HEADING TITLE -->
			<div class="row">
				<div class="text-center">
			
					<div class="page-title" style='margin-top:60px'>
						<h1>OBRIGADO PELO CARINHO</h1>
												
						<div class="heart-divider">
							<span class="grey-line"></span>
							<i class="de-icon-heart pink-heart"></i>
							<i class="de-icon-heart grey-heart"></i>
							<span class="grey-line"></span>
						</div>
					</div>
				
				</div>
			</div><!-- END of HEADING TITLE -->


			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<?php if ($order->status == 'DECLINED' || $order->status == 'EXPIRED' || $order->status == 'ERROR') { ?>
						<h2 style="margin-top:1px;">OOOPS... algo aconteceu com seu pagamento.</h2>
						<p>O pagamento do seu pedido foi <strong><?php echo OrderStatus($order->status)?></strong></p>
						<?php if ($order->responseMessagePol) { ?>
						<p>Descrição do erro: <strong><?php echo $order->responseMessagePol?></strong></p>
						<?php } ?>
						<p>Por favor, tente efetuar a compra novamente.</p>
					<?php } ?>		
					<?php if ($order->status == 'PENDING') { ?>
						<h2 style="margin-top:1px;">Seu pedido de pagamento foi recebido</h2>
						<p>O status do pagamento do seu pedido é <strong><?php echo OrderStatus($order->status)?></strong></p>
						<p>Caso foi pago com boleto, é necessário aguardar até 3 dias úteis para a confirmação do pagamento.</p>
					<?php } ?>
					<?php if ($order->status == 'APPROVED') { ?>
						<h2 style="margin-top:1px;">O pagamento do seu presente foi <strong class='green'>aprovado</strong>!</h2>
						<p>Obrigado pelo carinho. Recebemos o seu presente :)</p>
					<?php } ?>
				</div>
			
			</div><!--END of TEXT SECTION-->
			

		</div><!-- END of CONTAINER -->    
			

</section> <!-- END content -->

<?php 
if ($order->status == 'PENDING') {
?>
	<script>
		var time = new Date().getTime();

		function refresh() {
			if(new Date().getTime() - time >= 10000) 
				window.location.reload(true);
			else 
				setTimeout(refresh, 10000);
		}

		setTimeout(refresh, 10000);
	</script>
<?php } ?>

<?php
require_once 'footer.php';
?>