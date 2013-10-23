<?php

require_once 'Net/NNTP/Client.php';

class Model_Nntpconnection extends Net_NNTP_Client
{

public function connect (string $host, mixed $encryption, int $port, string $user=null, string $pass=null)
{

	$super->connect($host,$encryption,$port);
	if ($user) {
		$super->authenticate($user,$pass);
	}

}

}
