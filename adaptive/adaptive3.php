<?php
$payKey = $_REQUEST['payKey'];
 $headers[] = "X-PAYPAL-SECURITY-USERID: wpittman_api1.paypal.com";
 $headers[] = "X-PAYPAL-SECURITY-PASSWORD: C7CM265TPAMF2LM7";
 $headers[] = "X-PAYPAL-SECURITY-SIGNATURE: AFcWxV21C7fd0v3bYYYRCpSSRl31AART2vD.JQ4wJAUVJrAyxLH3IrN3";
 $headers[] = "X-PAYPAL-REQUEST-DATA-FORMAT: NV";
 $headers[] = "X-PAYPAL-RESPONSE-DATA-FORMAT: NV";
 $headers[] = "X-PAYPAL-APPLICATION-ID: APP-80W284485P519543T";
 $headers[] = "X-PAYPAL-SANDBOX-EMAIL-ADDRESS: wpittman@paypal.com";

$url = "https://svcs.sandbox.paypal.com/AdaptivePayments/Pay";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_VERBOSE, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 90);
curl_setopt($ch, CURLOPT_POST, 1);

$request = "requestEnvelope.errorLanguage=en_US&payKey=$payKey&fundingPlanId=12345&actionType=CREATE&senderEmail=wpittman@paypal.com&cancelUrl=https://rest-wpittman.c9users.io/adaptive/cancel.php
&currencyCode=USD&receiverList.receiver(0).email=wpittmanBusiness1@paypal.com&receiverList.receiver(0).amount=100.00
&returnUrl=https://rest-wpittman.c9users.io/adaptive/redirect.php";

curl_setopt($ch, CURLOPT_POSTFIELDS, $request);

$response = curl_exec($ch);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9 " lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <link rel = "stylesheet" href = "../css/bootstrap.min.css" />
  <link rel = "stylesheet" href = "../style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <script>
  $(function(){
    $('#header').load('../nav.html');
  });
  </script>
  <div id = "header"></div>
<div class = "container">
  <?php
        $res = explode("&", $response);
        foreach($res as $index) {
            echo $index . "<br>";
        }
        ?>
</div>


  <script src = "../script.js"></script>
  </body>
  </html>