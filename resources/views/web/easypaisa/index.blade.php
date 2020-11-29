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
	<input type ="hidden" name="expiryDate" id="token" value="{{ date('Ymd His', strtotime(now()))}}">
	<! – Merchant Hash Value (Optional) -- >
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
    <button type="submit" name="pay" class="btn btn-primary" id="submitPaymentMethod">Continue to Easypay Portal</button>

</form>

{{-- <div id="iframe-class"> --}}
<iframe id="easypay-iframe" name="easypay-iframe" src="about:blank" width="100%"
height="500px"></iframe>
{{-- </div> --}}

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

<script>
    var token;
    $(document).ready (function (){
	function loadIframe(iframeName) {
        // $.noConflict();
		var storeID = document.getElementById("storeId").value;
		var amount = document.getElementById("amount").value;
		var orderID = document.getElementById("orderId").value;
		// var email = document.getElementById("email").value;
		// var cellNo = document.getElementById("cellNo").value;
		// var token = document.getElementById("token").value;
		// var bankId = document.getElementById("bankId").value;
		// var postBackURL = document.getElementById("postBackURL").value;
        var email;
        var postBackURL;
        var cellNo;
        var bankId;
        var merchantPaymentMethod;
		// var merchantPaymentMethod =document.getElementById("merchantPaymentMethod").value;

        $.when(getHashedKey()).done(function(result){
            console.log(' encryptedHashRequest',result);
            var encryptedHashRequest=result;
            console.log(' encryptedHashRequest2',encryptedHashRequest);
            var url="https://easypaystg.easypaisa.com.pk/tpg/";

            // var signature = document.getElementById("signature").value;
            var signature;

            var params= { storeId: storeID, orderId: orderID, transactionAmount: amount,mobileAccountNo: cellNo,
                            emailAddress: email, transactionType: "InitialRequest", tokenExpiry: token,bankIdentificationNumber: bankId,merchantPaymentMethod:merchantPaymentMethod,
                            postBackURL:postBackURL,signature:signature,encryptedHashRequest:encryptedHashRequest
                        };

            // var params= { storeId: storeID, orderId: orderID, transactionAmount: amount,
            //                 transactionType: "InitialRequest", tokenExpiry: token,
            //                 encryptedHashRequest:encryptedHashRequest
            //             };



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
        token = document.getElementById("token").value;
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
                        return false;

                    }
            });

    }
});

	</script>
