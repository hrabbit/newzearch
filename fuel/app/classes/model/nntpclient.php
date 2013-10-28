<?php

    class Model_nntpclient extends Net_NNTP_Client
    {
        public function conn($host = string, $ssl = string, $port = int, $user = null, $pass = null)
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
