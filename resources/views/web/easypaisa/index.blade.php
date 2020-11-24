<form action=" https://easypay.easypaisa.com.pk/easypay/Index.jsf " method="POST" target="_blank">
<! -- Store Id Provided by Easypay-->
<input name="storeId" value="11455" hidden = "true"/>
<! -- Amount of Transaction from merchant’s website -->
<input name="amount" value="10" hidden = "true"/>
<! – Post back URL from merchant’s website -- >
<input name="postBackURL" value="https://lyceumgroupofschools.com/easypaisa/payment/status" hidden = "true"/>
<! – Order Reference Number from merchant’s website -- >
<input name="orderRefNum" value="1111" hidden = "true"/>
<! – Expiry Date from merchant’s website (Optional) -- >
<input type ="hidden" name="expiryDate" value="{{ date('YmdHis', strtotime('+8 Days'))}}">
<! – Merchant Hash Value (Optional) -- >
<input type ="hidden" name="merchantHashedReq" value="8JZVPIU6MPD6H4GH">
<! – If Merchant wants to redirect to Merchant website after payment completion (Optional) -- >
<input type ="hidden" name="autoRedirect" value="1">
<! – If merchant wants to post specific Payment Method (Optional) -- >
<input type ="hidden" name="paymentMethod" value="MA_PAYMENT_METHOD">
<! – If merchant wants to post specific Payment Method (Optional) -- >
<input type ="hidden" name="emailAddr" value="test.abcd@abcd.com">
<! – If merchant wants to post specific Payment Method (Optional) -- >
<input type ="hidden" name="mobileNum" value="03325241789">
<! – If merchant wants to post specific Bank Identifier (Optional) -- >
<input type ="hidden" name="bankIdentifier" value="UBL456">
<! – This is the button of the form which submits the form -- >
<input type ="submit" src="checkout-button-with-logo.png border" name= "pay">
</form>

<!-- https://easypaystg.easypaisa.com.pk/easypay/Index.jsf -->