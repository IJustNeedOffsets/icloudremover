<?php
if(isset($_GET['Source']) && isset($_GET['Serial']) && !ctype_digit($_GET['Serial']) && strlen($_GET['Serial']) === 12 || strlen($_GET['Serial']) === 11) {
	if (strpos($_GET['Source'], 'test') !==false) {}
	else { echo  "Server is down."; exit; }

	$SN = strtoupper($_GET['Serial']);
	if(!exec("grep ".$SN." ./var/www/files/whitelisted.log")) {
		$write = file_get_contents(''.$SN);
		if(!empty($write) && strpos($write, 'Order already') === false) {
			if(strpos($write, ',') !== false){
				$tmp = explode(',', $write);
				foreach($tmp as $k => $v) {
					if ($k == 0) { $write = 'Model:'; }
					elseif(!empty($v)) { $write .= " ".$v; }
				}

			}
		}
		file_put_contents('./var/www/files/whitelisted.log', "\n".$SN." - $write", FILE_APPEND);
		echo "Serial Number: ".$SN."<br />\n".$write."<br />\nDevice Registered";
	} else {
		echo "Serial Number: ".str_replace(" - ", "<br />\n", exec("cat ./var/www/files/whitelisted.log | grep '$SN'")). "<br />\nDevice Registered";
	}
} else {
	echo "Server is down or invalid Serial";

}
