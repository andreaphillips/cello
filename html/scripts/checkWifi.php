<?php
	function checkWiFi()
	{
      $result = exec('iwgetid -r');
			echo '<script>console.log("'.$result.'")</script>';
			return $result;
    }
?>
