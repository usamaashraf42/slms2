
<?php

	// $ivlen = openssl_cipher_iv_length($cipher="AES-128-ECB");
	// $iv = openssl_random_pseudo_bytes($ivlen);
	// $stringTobeEncoded ='';
	// $crypttext = openssl_encrypt($stringTobeEncoded, $cipher, 'GJ0WXA292VPTS7ZS',OPENSSL_RAW_DATA, $iv);
	// $hashRequest = base64_encode( $crypttext );


$hashRequest = '';
$hashKey = 'GJ0WXA292VPTS7ZS'; // generated from easypay account
$storeId="7637";
$amount="30.0" ;
$postBackURL="http://localhost:8000/easypaisa/token";
$orderRefNum="1101";
$autoRedirect=0 ;
$paymentMethod='CC_PAYMENT_METHOD';
$emailAddr='khizer.987@gmail.com';
$mobileNum="03458509233";

$paramMap = array();
$paramMap['amount']  = $amount;
$paramMap['autoRedirect']  = $autoRedirect;
$paramMap['emailAddr']  = $emailAddr;
$paramMap['mobileNum'] =$mobileNum;
$paramMap['orderRefNum']  = $orderRefNum;
$paramMap['paymentMethod']  = $paymentMethod;
$paramMap['postBackURL'] = $postBackURL;
$paramMap['storeId']  = $storeId;

////////////////////////////
// public function encryptPasswordOld($password, $salt)
// {
//     $key = md5($salt);
//     $result = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $password, MCRYPT_MODE_ECB);
//     return base64_encode($result);
// }


// public function encryptPasswordNew($password, $salt)
// {
//     $method = 'AES-256-ECB';
//     $ivSize = openssl_cipher_iv_length($method);
//     $iv = openssl_random_pseudo_bytes($ivSize);
//     $key = md5($salt);
//     $result = openssl_encrypt($password, $method, $key, OPENSSL_RAW_DATA, $iv);
//     return base64_encode($result);
// }

////////////////////


$mapString = '';
foreach ($paramMap as $key => $val) {
	$mapString .=  $key.'='.$val.'&';
}
$mapString  = substr($mapString , 0, -1);
$hashKey = 'GJ0WXA292VPTS7ZS';



$ivlen = openssl_cipher_iv_length($cipher="AES-128-ECB");
$iv = openssl_random_pseudo_bytes($ivlen);
$crypttext = openssl_encrypt($mapString, $cipher, $hashKey,OPENSSL_RAW_DATA, $iv);
$hashRequest = base64_encode( $crypttext );

?>



<form action=" https://easypaystg.easypaisa.com.pk/easypay/Index.jsf" method="POST" target="_blank">
	<!-- <form action="{{route('easypaisaStore')}}" method="POST" target="_blank"> -->



		<! -- Amount of Transaction from merchant’s website -->
		<input name="amount" value="10" />
		<! -- Store Id Provided by Easypay-->
		<input name="storeId" value="7637" hidden = "true"/>
		<! – Post back URL from merchant’s website -- >
		<input name="postBackURL" value=" http://localhost:8000/easypaisa" hidden = "true"/>
		<! – Order Reference Number from merchant’s website -- >
		<input name="orderRefNum" value="1101" hidden = "true"/>
		<! – Merchant Hash Value -- >

		<input type ="hidden" name=”merchantHashedReq” value="{{$hashRequest}}">
		<! –When merchant wants to redirect their customers to Easypay secure Checkout screen for Credit Card Transactions-- >
		<input type ="hidden" name=”paymentMethod” value=”CC_PAYMENT_METHOD”>
		<! – Expiry Date from merchant’s website (Optional) -- > 
		<!-- always pass a future date value for this parameter -->
		<!-- <input type ="hidden" name=”expiryDate” value=”20140606 201521”> ;  -->
		<! – If Merchant wants to redirect to Merchant website after payment completion (Optional) -- >
		<input type ="hidden" name=”autoRedirect” value=”0”>
		<! – If the merchant wants to pass the customer’s entered email address it would be pre populated on Easypay checkout screen.
		<input type ="hidden" name=”emailAddr” value=”test.abcd@abcd.com”>
		<! – If the merchant wants to pass the customer’s entered mobile number it would be pre populated on Easypay checkout screen
		<input type ="hidden" name=”mobileNum” value=03454013178>
		<! – If merchant wants to post specific Bank Identifier (Optional) -- >
		<input type ="hidden" name=”bankIdentifier” value=”UBL456”>
		<! – This is the button of the form which submits the form -- >
		<!-- <input type = “image” src=”checkout-button-with-logo.png border=”0” name= “pay”> -->
		<button type="submit" class="btn btn-primary">submit</button>
	</form>




	<?php 

	;
