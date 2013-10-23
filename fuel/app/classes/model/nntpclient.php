<?php

    require_once 'Net/NNTP/Client.php';

    class Model_nntpclient extends Net_NNTP_Client
    {
        
        
	public function connect (string $host, mixed $encryption, int $port, string $user=null, string $pass=null)
        {
            
            if (!$ssl) { $ssl = false; }
            
            if (parent::connect($host,$ssl,$port)) {
            
                if($user) {
                    if($this->authenticate($user,$pass)) {
                        return true;
                    }
                }
            }
            return false;
        }
    
        
    }

?>
