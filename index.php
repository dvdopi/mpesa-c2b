
<?php

// autoload.php @generated by Composer
require_once './vendor/autoload.php';
use SmoDav\Mpesa\Native\Mpesa;

if(isset($_POST['subscribe']))
{
  try{
    $paybill = ($_POST["paybill"]);
     $passkey = ($_POST["passkey"]);
     $phonenumber = ($_POST["phonenumber"]);
     $refid = ($_POST["refid"]);
     $amount = ($_POST["amount"]);
      $mpesa = new Mpesa;

          $repsonse = $mpesa->setPayBill($paybill, $passkey)
                      ->request($amount)
                      ->from($phonenumber)
                      ->usingReferenceId($refid)
                      ->transact();

      echo 'Success!Please verify the transaction on your phone to complete the transaction!';
    } catch(Exception $error){
      //your custom message
      echo 'Caught exception: ',  $error->getMessage(), "\n";
    }


}
?>
<html>
<head>
  <title>
    Mpesa Api Implimentation
  </title>
</head>
<body>
<h2>Mpesa API implimentation</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   Paybill: <input type="text" name="paybill" value="174379">
   <br><br>
   Passkey: <input type="text" name="passkey" value="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919">
   <br><br>
   Phone Number: <input type="text" name="phonenumber" value="254728488516">
   <br><br>
   Reference Id: <input type="text" name="refid"value="1" >
   <br><br>
   Amount: <input type="text" name="amount" value="10">
   <br><br>
   <input type="submit" name="subscribe" value="Subscribe"><br>
   <img src="./images/mpesa.jpeg"></img>
</form>
</body>
</html>
