<?php
function setWiFi($ssid, $psk){
	if(!empty($ssid)){

		$file = fopen("/tmp/wpa_supplicant.conf","w");
		echo fwrite($file,"ctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev
		update_config=1
		country=US
		network={
			ssid=\"$ssid\"
			psk=\"$psk\"
			key_mgmt=WPA-PSK
			}");
		fclose($file); echo "\n";
		echo exec('sudo rm /etc/wpa_supplicant/wpa_supplicant.conf'); echo "\n";
		echo exec('sudo mv /tmp/wpa_supplicant.conf /etc/wpa_supplicant/wpa_supplicant.conf');
		return true;
	}
	return false;
}
?>

