<?php

    $MerchantID ="MC35662"; //Your Merchant from transaction Credentials
    $Password   ="hv920evz9v"; //Your Password from transaction Credentials
    $ReturnURL  ="http://lyceumgroupofschools.com/feedeposit"; //Your Return URL 
    $HashKey    ="y14yb32g8s";//Your HashKey from transaction Credentials
    $PostURL = "https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform";
    //"http://testpayments.jazzcash.com.pk/PayAxisCustomerPortal/transactionmanagement/merchantform"; 
    date_default_timezone_set("Asia/karachi");
    $Amount = 1*100; //Last two digits will be considered as Decimal
    $BillReference = "11111";
    $Description = "Thank you for using Jazz Cash";
    $Language = "EN";
    $TxnCurrency = "PKR";
    $TxnDateTime = date('YmdHis') ;
    $TxnExpiryDateTime = date('YmdHis', strtotime('+8 Days'));
    $TxnRefNumber = "T".date('YmdHis');
    $TxnType = "";
    $Version = '1.1';
    $SubMerchantID = "";
    $DiscountedAmount = "";
    $DiscountedBank = "";
    $ppmpf_1="";
    $ppmpf_2="";
    $ppmpf_3="";
    $ppmpf_4="";
    $ppmpf_5="";

    $HashArray=[$Amount,$BillReference,$Description,$DiscountedAmount,$DiscountedBank,$Language,$MerchantID,$Password,$ReturnURL,$TxnCurrency,$TxnDateTime,$TxnExpiryDateTime,$TxnRefNumber,$TxnType,$Version,$ppmpf_1,$ppmpf_2,$ppmpf_3,$ppmpf_4,$ppmpf_5];

    $SortedArray=$HashKey;
    for ($i = 0; $i < count($HashArray); $i++) { 
    if($HashArray[$i] != 'undefined' AND $HashArray[$i]!= null AND $HashArray[$i]!="" )
    {
    
    $SortedArray .="&".$HashArray[$i];
    } }
    $Securehash = hash_hmac('sha256', $SortedArray, $HashKey);  
?>

<form method="post" action="<?php echo $PostURL; ?>"/>  

    <input type="hidden" name="pp_Version" value="<?php echo $Version; ?>" />
    <input type="hidden" name="pp_TxnType" value="<?php echo $TxnType; ?>" />
    <input type="hidden" name="pp_Language" value="<?php echo $Language; ?>" />
    <input type="hidden" name="pp_MerchantID" value="<?php echo $MerchantID; ?>" />
    <input type="hidden" name="pp_SubMerchantID" value="<?php echo $SubMerchantID; ?>" />
    <input type="hidden" name="pp_Password" value="<?php echo $Password; ?>" />
    <input type="hidden" name="pp_TxnRefNo" value="<?php echo $TxnRefNumber; ?>"/>
    <input type="hidden" name="pp_Amount" value="<?php echo $Amount; ?>" />
    <input type="hidden" name="pp_TxnCurrency" value="<?php echo $TxnCurrency; ?>"/>
    <input type="hidden" name="pp_TxnDateTime" value="<?php echo $TxnDateTime; ?>" />
    <input type="hidden" name="pp_BillReference" value="<?php echo $BillReference ?>" />
    <input type="hidden" name="pp_Description" value="<?php echo $Description; ?>" />
	<input type="hidden" id="pp_DiscountedAmount" name="pp_DiscountedAmount" value="<?php echo $DiscountedAmount ?>">
	<input type="hidden" id="pp_DiscountBank" name="pp_DiscountBank" value="<?php echo $DiscountedBank ?>">
    <input type="hidden" name="pp_TxnExpiryDateTime" value="<?php echo  $TxnExpiryDateTime; ?>" />
    <input type="hidden" name="pp_ReturnURL" value="<?php echo $ReturnURL; ?>" />
    <input type="hidden" name="pp_SecureHash" value="<?php echo $Securehash; ?>" />
    <input type="hidden" name="ppmpf_1" value="<?php echo $ppmpf_1; ?>" />
    <input type="hidden" name="ppmpf_2" value="<?php echo $ppmpf_2; ?>" />
    <input type="hidden" name="ppmpf_3" value="<?php echo $ppmpf_3; ?>" />
    <input type="hidden" name="ppmpf_4" value="<?php echo $ppmpf_4; ?>" />
    <input type="hidden" name="ppmpf_5" value="<?php echo $ppmpf_5; ?>" />
    <input type="submit" name="Jazz Cash" value="Jazz Cash"/>
</form>

