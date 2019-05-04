<?php
$msgErr = $name = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $msgErr .= "Name is required</br>";
    $success = false;
  } else {
    if(!empty($_POST["name"])){
    	$name = test_input($_POST["name"]);
    }
  }
  // echo '<script>console.log(el nombre es'.$name.')</script>';

  $success = true;
  if($success){
  	$success = changeName($name);
  }

  $data = array("success"=>$success,"message"=>$msgErr,"name"=>$name);
  $json = json_encode($data);
  echo $json;
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  // echo '<script>console.log( '.$data.')</script>';
  return $data;
}

function changeName($name)
{
    exec('sudo rename-host '.$name, $out);
    $result = $out;
    $reslength = count($result);
    return true;
}
?>


