<?php

require_once '/vagrant/config-monisecelso.php';

function randHash($len=32)
{
	return substr(md5(openssl_random_pseudo_bytes(20)),-$len);
}

	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$product = trim((isset($_POST['product'])? $_POST['product'] : ''));

	if (!$product) {
		header("Location: gift.php");
		exit;
	}

	/* PRODUTO */
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

	$referenceCode = 'MONISE E CELSO ('.randHash(10).')';
	$signature = API_KEY.'~'.MERCHANT_ID."~".$referenceCode."~".$product->valor."~BRL";
	$signature = md5($signature);

	$phone = trim($_POST['phone']);
	$phone = preg_replace( '/[^0-9]/', '', $phone );

	/* PEDIDO */
	$data = array(
				"referenceCode" => $referenceCode,
				"description" => 'Compra do presente '.$product->nome,
				"buyerName" => trim($_POST['name']),
				"buyerPhone" => $phone,
				"buyerEmail" => trim($_POST['email']),
				"buyerMessage" => trim($_POST['message']),
				"gift" => $product->id,
				"amount" => $product->valor,
				"signature" => $signature,
	);
//var_dump($data);

	$data_string = json_encode($data);                    

	$service_url = API_END_POINT.'wedding/order/';
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
	//curl_setopt($curl, CURLOPT_USERPWD, API_USER . ":" . API_PASSWORD);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

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
		$order = array();
	}
//var_dump($order);exit;

?>

<style>
	h2 {
		text-align: center;
		margin: 100px 100px;
	}

	p {
		text-align: center;
	}
</style>

<h2>Voc&ecirc; vai ser direcionado para a plataforma de pagamento PayU...</h2>
<p>Se n&atilde;o for redirecionado, <a href='javascript: pagar()'>clique aqui</a></p>

<form method="post" id="pay" action="https://gateway.payulatam.com/ppp-web-gateway/">
  <input name="merchantId"    type="hidden"  value="702320"   >
  <input name="accountId"     type="hidden"  value="705371" >
  <input name="description"   type="hidden"  value="<?php echo $order->description?>"  >
  <input name="referenceCode" type="hidden"  value="<?php echo $order->referenceCode?>" >
  <input name="amount"        type="hidden"  value="<?php echo $order->amount?>"   >
  <input name="tax"           type="hidden"  value="0"  >
  <input name="taxReturnBase" type="hidden"  value="0" >
  <input name="currency"      type="hidden"  value="BRL" >
  <!--<input name="test"      type="hidden"  value="1" >-->
  <input name="signature"     type="hidden"  value="<?php echo $order->signature?>"  >
  <input name="buyerFullName" type="hidden"  value="<?php echo $order->buyerName?>" >
  <input name="buyerEmail"    type="hidden"  value="<?php echo $order->buyerEmail?>" >
  <input name="telephone"    type="hidden"  value="<?php echo $order->buyerPhone?>" >
  <input name="confirmationUrl" type="hidden"  value="http://www.monisecelso.com.br/wedding/order/callback" >
  <input name="responseUrl" type="hidden"  value="http://www.monisecelso.com.br/confirmation.php" >
</form>

<script type="text/javascript">
  document.getElementById('pay').submit();

  function pagar() {
	document.getElementById('pay').submit();
  }
</script>