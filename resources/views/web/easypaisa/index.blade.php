<form action="javascript:;" method="POST" id="easyPaisaForm">
    @csrf
	<! -- Store Id Provided by Easypay-->
	<input name="storeId" id="storeId" value="11455" hidden = "true"/>
	<! -- Amount of Transaction from merchant’s website -->
	<input name="amount" id="amount" value="10.0" hidden = "true"/>
	<! – Post back URL from merchant’s website -- >
	<input name="postBackURL" id="postBackURL" value="https://lyceumgroupofschools.com/easypaisa/payment/status" hidden = "true"/>
	<! – Order Reference Number from merchant’s website -- >
	<input name="orderRefNum" id="orderId" value="1111" hidden = "true"/>
	<! – Expiry Date from merchant’s website (Optional) -- >
	<input type ="hidden" name="expiryDate" id="token" value="{{ date('Ymd His', strtotime('+8 Days'))}}">
	<! – Merchant Hash Value (Optional) -- >
	<!-- <input type ="hidden" name="merchantHashedReq" value="8JZVPIU6MPD6H4GH"> -->
	<! – If Merchant wants to redirect to Merchant website after payment completion (Optional) -- >
	<input type ="hidden" name="autoRedirect" value="1">
	<! – If merchant wants to post specific Payment Method (Optional) -- >
	<input type ="hidden" name="paymentMethod" id="merchantPaymentMethod" value="MA_PAYMENT_METHOD">

	<! – If merchant wants to post specific Payment Method (Optional) -- >
	 <input type ="hidden" name="emailAddr" id="email" value="test@abcd.com">
	<! – If merchant wants to post specific Payment Method (Optional) -- >
	<input type ="hidden" name="mobileNum" id="cellNo" value="03325241789">
	<! – If merchant wants to post specific Bank Identifier (Optional) -- >
     <input type ="hidden" name="bankIdentifier" id="bankId" value="">
    <input type="hidden" name="signature" id="signature" value="">
<input type="hidden" name="timeStamp" id="timeStamp" value="{{date("Y-m-d\TH:i:s", strtotime(now()))}}">

	<! – This is the button of the form which submits the form -- >
    {{-- <input type ="submit" id="submitPaymentMethod" src="checkout-button-with-logo.png border" name= "pay"> --}}
    <button type="submit" name="pay" class="btn btn-primary" id="submitPaymentMethod"
onClick="loadIframe();">Continue to Easypay Portal</button>

</form>

<iframe id="easypay-iframe" name="easypay-iframe" src="about:blank" width="100%"
height="500px"></iframe>


<!-- https://easypaystg.easypaisa.com.pk/easypay/Index.jsf -->
<script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

<script>
	function getValues() {

	}
	function loadIframe(iframeName) {
        $.noConflict();

		var storeID = document.getElementById("storeId").value;
		var amount = document.getElementById("amount").value;
		var orderID = document.getElementById("orderId").value;
		var email = document.getElementById("email").value;
		var cellNo = document.getElementById("cellNo").value;
		var token = document.getElementById("token").value;
		var bankId = document.getElementById("bankId").value;
		var postBackURL = document.getElementById("postBackURL").value;
		var merchantPaymentMethod =document.getElementById("merchantPaymentMethod").value;
        var encryptedHashRequest;
        $.when(getHashedKey()).done(function(result){
            console.log(' encryptedHashRequest',result);
            var encryptedHashRequest=result;
            console.log(' encryptedHashRequest2',encryptedHashRequest);
            var url="https://easypaystg.easypaisa.com.pk/tpg/";

            var signature = document.getElementById("signature").value;
            // var params = { storeId: storeID, orderId: orderID, transactionAmount: amount,
            // 	mobileAccountNo: cellNo, emailAddress: email, transactionType: "InitialRequest", tokenExpiry: token,
            // 	bankIdentificationNumber: bankId, encryptedHashRequest:
            // 	encryptedHashRequest,merchantPaymentMethod : merchantPaymentMethod,
            // 	postBackURL:postBackURL,signature:signature};
            var params = { storeId: storeID, orderId: orderID, transactionAmount: amount,mobileAccountNo: cellNo, emailAddress: email, transactionType: "InitialRequest", tokenExpiry: token,bankIdentificationNumber: bankId, encryptedHashRequest:encryptedHashRequest};

                console.log('params',params,'encryptedHashRequest',encryptedHashRequest);

                var $iframe = $('#' + iframeName);

                if ( $iframe.length ) {
                    if(params.storeId != "" && params.orderId !="") {
                        var str = jQuery.param( params);
                        console.log('url',url+'?'+str);
                        $iframe.attr('src',url+'?'+str);
                    }
                    return false;
                }

            return true;

        });
        console.log('false');


	}
	$( "#submitPaymentMethod" ).click(function() {
		$("#iframe-class").addClass("show-iframe");
		return loadIframe('easypay-iframe');
	});

    function getHashedKey(){
            var form = $('#easyPaisaForm')[0];
        var formData = new FormData(form);

        return  $.ajax({
                    url: "{{route('EncriptHashedKey')}}",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    success: function (response) {
                        console.log(' HashKey', response);

                        return response;

                    }, error: function (e) {
                        // console.log('signup-form error', e);
                        return false;

                    }
            });

    }

	</script>
