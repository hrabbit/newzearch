<?php
    
    class Model_collectorthread extends Thread {
        
        private $nntpconnection;
        private $matched;
        private $callback;
        private $group;
        private $artcleList;
        
        
        function __construct($al, $nn, $grp, $ma) {
            
            $this->setNNTP($nn);
            $this->setArticleList($al);
            $this->setNNTPMatchedArticle($nma);
            $this->setGroup($grp);
            $this->setMatch($ma);
            
        }
        
        function setNNTP ($n) { $nntpconnection = $n; }
        function setArticleList ($a) { $articleList = $a; }
        function setNNTPMatchedArticle ($n) { $callback = $n; }
        function setGroup($g) { $group = $g; }
        function setMatch($m = ".*") { $matched = $m; }
        
        function run () {
            
            $i = 0;
            
            do {
                
                $nntp->setGroup($group);
                
                while ($i = array_shift($articleList)) {
                    
                    
                    $lines = $nntp->getHeader($i);
                    
                    foreach ($lines as $line) {
                        $kv = explode (": ",$line);
                        $headers[$kv[0]] = $kv[1];
                    }
                    
                    
                    if (preg_match($matched,$headers['Subject'])) {
                        $callback->processArticle($headers);
                    }
                    
                    
                }
                
            } while ($i);
            
    }
    
    
    }
    
    ?>
