<?php
	function scanWiFi()
	{
		$array = array();
		exec('sudo iwlist wlan0 scan | grep ESSID 2>error.log', $out, $status);
		$result = $out;
		$reslength = count($result);
		echo '<script>console.log('.$reslength.')</script>';
		if($status===0){
			for($x = 0; $x < $reslength; $x++){
				$re="/ESSID:\"([a-zA-Z0-9_@-]+)\"/";
				$str=trim($result[$x]); 
				if(preg_match_all($re, $str, $matches)){
					//echo $matches[1][0];
					echo '<script>console.log("'.$matches[1][0].'")</script>';
					array_push($array, $matches[1][0]);
				}
			}
		}
		return $array;
	}
?>
