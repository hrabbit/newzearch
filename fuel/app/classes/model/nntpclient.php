<?php

    require_once 'Net/NNTP/Client.php';

    class Module_nntpclient extends Net_NNTP_Client
    {
        
        
        public function connect ($host,$ssl,$port,$user,$pass)
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