<?php
  function getStereoStatus()
  {
    $mono = exec('dsptoolkit get-volume');
    $isMono = $mono == "Volume: 1.0000 / 100% / 1db";
    return $isMono;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if($_POST["stereo"] ==="true") {
        changetoStereo();
      } else {
        changetoMono();
      }
  }

	function changetoStereo()
	{
    echo exec('sudo makeStereo');
  }
  
  function changetoMono()
	  {
      echo exec('sudo makeMono');
    }

?>
