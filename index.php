<?php
require_once('vendor/autoload.php');

// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys

echo "stripe set up";
\Stripe\Stripe::setApiKey('sk_test_51Hb9FbH2zo4vK60bB7lQmLoLgjoNfrUowdlzMvEtVUoIMgrJGoEp5bwm3TDslcYDrhm4paFyQUtV2V656Ounu7W500GcmFzXMS');


echo "payment intent";
$stripeResponse =  \Stripe\PaymentIntent::create([
  'amount' => 1000,
  'currency' => 'usd',
  'payment_method_types' => ['card'],
  'receipt_email' => 'jenny.rosen@example.com',
]);



echo "Starting the script";
$dailyTotal   = 4;
$randomGreeting = array(
  "Baller ALERT!!!! :soccer::soccer::soccer: \r\n",
  "They see me, they hatin :rage::rage::rage:",
  "This is what we do! :rocket::rocket::rocket:",
  "I love it when you call me BIG POPPA :champagne::champagne::champagne:",
  "We got's another :one:  Major :key: ALERT!",
  "They can't stop us :racing_car::police_car:",
  "Kobe! :basketball::wastebasket: :basketball::wastebasket: :basketball::wastebasket:",
  "Goooooooooooooooal!!!!! :soccer::goal_net:",
  "Why is it so easy??? :man-shrugging::man-shrugging::man-shrugging::man-shrugging::man-shrugging:",
  "We just getting started! :runner::runner::runner:"
);
$randomFunnyQuote = array(
  "\r\nGoodness gracious, y'all have ".$dailyTotal." for the day. :money_with_wings::money_with_wings::money_with_wings:",
  "\r\nYou just hit " . $dailyTotal . ",bro :beach_with_umbrella::beach_with_umbrella::beach_with_umbrella:",
  "\r\nGood job, we on " . $dailyTotal . "! :fire::fire::fire:",
  "\r\nHell yeah! We hit " . $dailyTotal . "! Keep 'em coming playa! :trophy::trophy::trophy:"
);

$quoteNumber = rand(0,9);

$greeting     = $randomGreeting[rand(0,9)];
$funnyQuote   = $randomFunnyQuote[rand(0,3)];
$saleEventURL = "\r\n\r\n http://test.com";



$postRequest = array(
    "channel" => "<<Channel ID goes here>>",
    "text" => ":comet::comet::comet::comet::comet::comet::comet::comet: \r\n\r\n " . $greeting . $funnyQuote . $saleEventURL
);

$headers =  array(
    'Content-type: application/json; charset=UTF-8',
    'Authorization: Bearer <<Token goes here>>'
);


$cURLConnection = curl_init('https://slack.com/api/chat.postMessage');
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, json_encode($postRequest));
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);



$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);

echo $apiResponse;


 ?>
