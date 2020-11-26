<?php

use App\Mail\ApplicationVerification;
use Illuminate\Support\Facades\Mail;

if (!function_exists('find_row_in_array_by_key')) {
  function find_row_in_array_by_key($data,$key,$val)
  {

    foreach ($data as $row) {

      if($row->{$key}==$val)

        return $row;
    }

    return false;

  }
}

if (!function_exists('get_month_name_by_no')) {
  function get_month_name_by_no($month)
  {
    $month_name = "";
    switch ($month) {
      case 1:
      $month_name = "Jan";
      break;
      case 2:
      $month_name = "Feb";
      break;
      case 3:
      $month_name = "Mar";
      break;
      case 4:
      $month_name = "Apr";
      break;
      case 5:
      $month_name = "May";
      break;
      case 6:
      $month_name = "Jun";
      break;
      case 7:
      $month_name = "Jul";
      break;
      case 8:
      $month_name = "Aug";
      break;
      case 9:
      $month_name = "Sep";
      break;
      case 10:
      $month_name = "Oct";
      break;
      case 11:
      $month_name = "Nov";
      break;
      case 12:
      $month_name = "Dec";
      break;

      default:
      $month_name = "Jan";
      break;
    }


    return $month_name;

  }

}

if (!function_exists('isActiveRoute')) {

  function isActiveRoute($route, $output = "active")
  {
    if (Route::currentRouteName() == $route) return $output;
  }

}

if (!function_exists('areActiveRoutes')) {

  function areActiveRoutes(Array $routes, $output = "active")
  {
    foreach ($routes as $route)
    {
      if (Route::currentRouteName() == $route) return $output;
    }

  }
}


if(!function_exists('phoneVerifictionCode')){
  function phoneVerifictionCode($phone){
    $phone=\App\Models\PhoneVerification::create([
      'phone'=>$phone,
      'code'=>mt_rand(1000, 9999)
    ]);
    $message="phone Verification code :$phone->code";
    $veriable= SendSms($phone,$message);
    return $veriable;
    if(isset($veriable)){
      return $veriable=0;
    }else{
     return  $veriable=1;
   }
 }
}
if(!function_exists('phoneVerifiction')){
  function phoneVerifiction($phone,$code){
   return   $phone=\App\Models\PhoneVerification::where('phone',$phone)->where('code',$code)->first();
 }
}
if(!function_exists('emailVerifictionCode')){
  function emailVerifictionCode($email){
    \App\Models\EmailVerification::where('email',$email)->delete();
    $emailCode=\App\Models\EmailVerification::create([
      'email'=>$email,
      'code'=>mt_rand(1000, 9999)
    ]);

    $emails = [$email];
    $url=route('againEmailCode',$email);
    try{
      Mail::to($email)->send(new ApplicationVerification($emailCode,$url));
    }catch(\Exception $e){

    }

            // Mail::send('emails.verification', ['data'=>$emailCode,'url'=>$url], function($message) use ($emails)
            // {

            //     $message->to($emails)->subject('Email Verification');
            // });
    return '1';
  }
}
if(!function_exists('emailVerifiction')){
  function emailVerifiction($email,$code){
   return   $email=\App\Models\EmailVerification::where('email',$email)->where('code',$code)->first();
 }
}

if(!function_exists('getMonthName')){
  function getMonthName($month){

    $dateObj= DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F');
    return $monthName;
  }
}
if(! function_exists('branchImplode')){
  function branchImplode($branches){
    $tempArray=array();
    foreach($branches as $branch){
      array_push($tempArray, $branch->branch->branch_name);
    }
    return implode(', ', $tempArray);
  }
}
if(! function_exists('implode_product')){
  function implode_product($products){
    $tempArray=array();
    foreach($products as $branch){
      array_push($tempArray, $branch->pro_name);
    }
    return implode(', ', $tempArray);
  }
}



if(! function_exists('schoolbranchImplode')){
  function schoolbranchImplode($branches){
    $tempArray=array();
    // dd($branches);
    foreach($branches as $branch){
      array_push($tempArray, $branch->branch_name);
    }
    return implode(', ', $tempArray);
  }
}


if(! function_exists('courseImplode')){
  function courseImplode($branches){

    $tempArray=array();
    foreach($branches as $branch){
      array_push($tempArray, $branch->course->course_name);
    }
    return implode(', ', $tempArray);
  }
}


if (!function_exists('SendSms')) {
  function SendSms($tokens, $message){

   $phoneArray=str_split($tokens);

   for ($i=0; $i<count($phoneArray); $i++) {
    if((int)$phoneArray[$i] ==3){
      break;
    }
    unset($phoneArray[$i]);
  }

  $str=implode('', $phoneArray);
  $vear= ('92'.''.$str);
  $message = trim(preg_replace('/\s\s+/', ' ', $message));
  $tokens=$vear;

  $type = "json";
  $id = "923224772704";
  $pass = "tahir786";
  $lang = "English";
  $mask = "A_LYCEUM";
    // Data for text message
  $to = $tokens;
  $message = urlencode($message);
    // Prepare data for POST request
  $data =
  "id=".$id."&pass=".$pass."&msg=".$message."&to=".$to."&lang=".$lang."&mask=A_LYCEUM&type=".$type;
  $ch = curl_init('http://www.sms4connect.com/api/sendsms.php/sendsms/url');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // return $ch;
    $result = curl_exec($ch); //This is the result from SMS4Connect

    curl_close($ch);
    return $result;
  }
}

if (!function_exists('jazzcash_deposit')) {
  function jazzcash_deposit($request){

     $MerchantID ="MC35662"; //Your Merchant from transaction Credentials
    $Password   ="hv920evz9v"; //Your Password from transaction Credentials
    $ReturnURL  ="http://lyceumgroupofschools.com/feedeposit-status"; //Your Return URL
    $HashKey    ="y14yb32g8s";//Your HashKey from transaction Credentials
    $PostURL = "https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform";
    //"http://testpayments.jazzcash.com.pk/PayAxisCustomerPortal/transactionmanagement/merchantform";
    date_default_timezone_set("Asia/karachi");
    $Amount = $request->pp_Amount; //Last two digits will be considered as Decimal
    $BillReference = $request->pp_BillReference;
    $Description = "Thank you for using Jazz Cash";
    $Language = "EN";
    $TxnCurrency = "PKR";
    $TxnDateTime = date('YmdHis') ;
    $TxnExpiryDateTime = date('YmdHis', strtotime('+8 Days'));
    $TxnRefNumber = $request->pp_TxnRefNo;
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


//
    // dd($request->all());
      $data = "pp_Version=".$Version."&pp_TxnType=".$TxnType."&pp_Language=".$Language."&pp_MerchantID=".$MerchantID."&pp_SubMerchantID=".$SubMerchantID."&pp_Password=".$Password."&pp_TxnRefNo=".$request->pp_TxnRefNo."&pp_Amount=".$request->pp_Amount."&pp_TxnCurrency=".$TxnCurrency."&pp_TxnDateTime=".$TxnDateTime."&pp_BillReference=".$request->pp_BillReference."&pp_Description=".$Description."&pp_DiscountedAmount=".$DiscountedAmount."&pp_DiscountBank=".$DiscountedBank."&pp_TxnExpiryDateTime=".$TxnExpiryDateTime."&pp_ReturnURL=".$ReturnURL."&pp_SecureHash=".$Securehash."&ppmpf_1=".$request->ppmpf_1."&ppmpf_2=".$request->ppmpf_2."&ppmpf_3=".$request->ppmpf_3."&ppmpf_4=".$request->ppmpf_4."&ppmpf_5=".$request->ppmpf_5;
// dd($data);

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL,"https://sandbox.jazzcash.com.pk/CustomerPortal/transactionmanagement/merchantform");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,
        $data);

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $server_output = curl_exec($ch);

      curl_close ($ch);

// Further processing ...
      if ($server_output == "OK") {
        return $server_output;
      } else {
        return $server_output;
      }
    }
  }

  if (!function_exists('accountCreate')) {
    function accountCreate($name,$project_id=null,$emp_id=null,$vendor_id=null,$customer_id=null,$cat_ids=null,$opening_balance=0,$c_balance=0,$shed_id=null,$type=null,$cat_id=null){
      $cat=\App\Models\AccountCategory::where('cat_name',$cat_id)->first();

      $data=array('name'=>$name,'project_id'=>$project_id,'emp_id'=>$emp_id,'vendor_id'=>$vendor_id,'customer_id'=>$customer_id,'cat_id'=>$cat_id,'opening_balance'=>$opening_balance,'c_balance'=>$c_balance+$opening_balance,'shed_id'=>$shed_id,'type'=>$type,'cat_id'=>isset($cat->id)?$cat->id:null);
      $account=\App\Models\Account::create($data);
      if($account)
        return $account;
      else
        return false;
    }
  }
  if (!function_exists('accountCreate')) {
    function accountUpdate($acc_id,$balance,$type,$accFrom_id){
      $Fromaccount=\App\Models\Account::find($accFrom_id);
      if($Fromaccount){
        $current=$Fromaccount->c_balance;
        $data['c_balance']= $current - $balance;
        \App\Models\Account::where('id',$accFrom_id)->update($data);
      }
      $account=\App\Models\Account::find($acc_id);
      if($account){
        $current=$account->c_balance;
        $record['c_balance']=$current + $balance;

        \App\Models\Account::where('id',$acc_id)->update($record);
      }
      return true;

    }
  }
  if(!function_exists('account_update')){
    function account_update($id,$amount){
      $acc= \App\Models\Account::with('LedgerBalance')->find($id);
      $balance=$acc->LedgerBalance->balance;
      $amnt['c_balance']=$balance + $amount;
    // dd($id);
      $master_acc=$acc->update($amnt);
      return $master_acc;
    }
  }
  if(!function_exists('account_minus')){
    function account_minus($id,$amount){
      $acc= \App\Models\Account::with('LedgerBalance')->find($id);
      $balance=$acc->LedgerBalance->balance;
      $amnt['c_balance']=$balance - $amount;
      $master_acc=$acc->update($amnt);


      return $master_acc;
    }
  }


  if(!function_exists('roleImplode')){
    function roleImplode($role){

      $tempArray=array();
      foreach($role as $roles){
        array_push($tempArray, $roles->name);
      }

      return implode(', ', $tempArray);

    }
  }


  function implodeUser($users){
    $tempUser=[];
    foreach ($users as  $value) {
          # code...
      $tempUser[]=$value->user->name.' '.$value->user->fname;
    }

    return implode(',', $tempUser);
  }


  function send_default_email($recipient, $subject, $message, $file_path = '', $file_name = '')
  {
      // return ($message);exit();
    $mail_data['personalizations'] = array(
      0 => array(
        'to' => array(
          0 => array(
            'email' => $recipient
          )
        )
      )
    );
    $mail_data['from'] = array(
      'name' => "American Lyceum",
      'email' => 'admin@americanlyceum.com'
    );
    $mail_data['subject'] = $subject;
    $mail_data['content'] = array(
      0 => array(
        'type' => 'text/html',
        'value' => $message)
    );

    if ($file_path != '') {
      $file = file_get_contents($file_path);
      $fileencoded = base64_encode($file);

      $mail_data['attachments'] = array(
        0 => array(
          'content' => $fileencoded,
          'filename' => $file_name
        )
      );
    }
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($mail_data),
      CURLOPT_HTTPHEADER => array(
        "authorization: Bearer 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",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: 4777b2d8-61b0-ed32-76ef-1c3be81dd4f7"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return json_encode(array('status' => 0, 'message' => "cURL Error #:" . $err));
    } else {
      return json_encode(array('status' => 1, 'message' => $response));
    }
  }


  function ImplodeBranchName($departBranch){
    $temarry=array();
    foreach ($departBranch as $branches) {
      if(isset($branches->branch->branch_name)){
        array_push($temarry,$branches->branch->branch_name);
      }
    }

    return implode(',', $temarry);
  }



  function marksGrade($grad){
    if ($grad < 33){
     return  'F';
   }

   else if ($grad >= 33 && $grad <=49.99){

    return  'D';
  }
  else if ($grad  >= 50 && $grad <=54.99)
  {
    return  'C -';
  }
// else if ($grad  >= 50 && $grad <=54.99)
// {
//  return  'C-';
// }
  else if ($grad  >= 55 && $grad <=59.99)
  {
   return  'C';
 }
 else if ($grad >= 60 && $grad <=64.99 )
 {
  return  'C+';
}
else if ($grad  >= 65 && $grad <=69.99)
{
  return  'B-';
}
else if ($grad  >= 70 && $grad <=74.99)
{
 return  'B';
}
else if ($grad  >= 75 && $grad <=79.99)
{
 return  'B+';
}
else if ($grad  >= 80 && $grad <=84.99)
{
 return  'A-';
}
else if ($grad  >= 85 && $grad <=89.99)
{
 return  'A';
}
else if ($grad >= 90)
{
 return  'A+';
}
return $grad;
}
function MarksColor($grad){
  if ($grad < 50){
   return  'ffd53b;';
 }






else if ($grad  >= 50 && $grad <=54.9)
{
 return  '7ba6e6';
}


else if ($grad  >= 55 && $grad <=59.9)
{
 return  '365f9a';
}


else if ($grad  >= 60 && $grad <=64.9)
{
 return  '01285c';
}


else if ($grad  >= 65 && $grad <=69.9)
{
 return  'f79696';
}


else if ($grad  >= 70 && $grad <=74.9)
{
 return  'f34f4f';
}

else if ($grad  >= 75 && $grad <=79.9)
{
 return  'fa0909';
}


else if ($grad  >= 80 && $grad <=84.9)
{
 return  '87ee97';
}

else if ($grad  >= 85 && $grad <=89.9)
{
 return  '09f82d';
}

else if ($grad  >= 90 && $grad <=100)
{
 return  '055631';
}


return 'fff';
}


function colorCode($grad,$sub_id=null){

  if($sub_id==11){
    return '004a80';
  }
  if($sub_id==14){
    return 'c68348';
  }
  if($sub_id==40){
    return '35ac46';
  }
  if($sub_id==41){
    return 'cea857';
  }
  if($sub_id==31){
    return 'dece1e';
  }
  if($sub_id==42){
    return '8833df';
  }
  if($sub_id==6){
    return '33c9df';
  }
  if($sub_id==9){
    return 'cea876';
  }
  if($sub_id==7){
    return '6bf8ab';
  }
  if($sub_id==38){
    return '6bf8ab';
  }
  if($sub_id==39){
    return '6bf8ab';
  }


  if ($grad == 1){
   return  '004a80';
 }

 else if ($grad == 2){

  return  'c68348';
}
else if ($grad == 3)
{
  return  '35ac46';
}
else if ($grad ==4)
{
 return  '8833df';
}
else if ($grad ==5)
{
 return  '33c9df';
}
else if ($grad==6 )
{
  return  'cea876';
}
else if ($grad ==7)
{
  return  '6bf8ab';
}
else if ($grad ==8)
{
 return  'CD5C5C';
}
else if ($grad ==9)
{
 return  '48D1CC';
}
else if ($grad ==10)
{
 return  'FFE4E1';
}
else if ($grad ==11)
{
 return  'F0E68C';
}
else if ($grad == 12)
{
 return  'B22222';
}
return $grad;
}


?>



