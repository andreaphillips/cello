<?php include 'setWiFi.php';?>
<?php
// define variables and set to empty values
$msgErr = $ssid = $psk = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["ssid"]) && empty($_POST["ssid2"])) {
    $msgErr .= "SSID is required</br>";
    $success = false;
  } else {
    if(!empty($_POST["ssid"])){
    	$ssid = test_input($_POST["ssid"]);
    }
    else{
      $ssid = test_input($_POST["ssid2"]);
    }
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_@-]*$/",$ssid)) {
      $msgErr .= "Invalid SSID</br>";
      $success = false;
    }

  }
  $psk = test_input($_POST["password"]);
  echo '<script>console.log('.$psk.')</script>';
  echo '<script>console.log('.$ssid.')</script>';
  $success = true;
  if($success){
  	$success = setWiFi($ssid, $psk);
  }

  $data = array("success"=>$success,"message"=>$msgErr,"ssid"=>$ssid,"psk"=>$psk);
  $json = json_encode($data);
  echo $json;

  shell_exec("sudo reboot");
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
