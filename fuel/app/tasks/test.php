#!/usr/bin/php

<?php

require_once 'Net/NNTP/Client.php';


	$nntp = new Net_NNTP_Client();

	if ($nntp->connect("news.netspace.net.au")) {
		print "connected\n";

		$group = $nntp->selectGroup("alt.binaries.teevee");
		
		$last = $group['last'];
		print "last: " . $group['last'] . "\n";
		
		$headers = $nntp->getHeader($last);

		foreach ($headers as $line) {
			$kv = explode (": ",$line);
			$head[$kv[0]] = $kv[1];
		}
	
		var_dump($head);

		$nntp->quit();
	}

?>
