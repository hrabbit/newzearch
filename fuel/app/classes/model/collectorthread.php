<?php

use \Cli;

class Model_collectorthread // extends Thread 
{
    
    private $sem_id;
    private $shm_id;
    private $last;
    private $nntpconnection;
    private $matched;
    private $callback;
    private $group;
    private static $verbose = 0;
    
    // $threadArray[$thread_number] = new \Model_collectorthread($nntp,$articles,$nntpgroup['name'],$callback,'.*\.nzb.*');

    // function __construct($nn, $al, $nn, $grp, $ma) {
    function __construct($seid, $shid, $end, $nntp, $articles, $group, $callback, $matched) {
        
        $this->nntpconnection = $nntp;
        // $this->setNNTPMatchedArticle($nma);
        $this->group = $group;
        $this->matched = $matched;
        $this->callback = $callback;
        $this->sem_id = $seid;
        $this->shm_id = $shid;
        $this->$last = $end;
    }

    private static function message($msg = string, $colour = 'yellow', $level = 0)
    {
        if(self::$verbose >= $level)
                \Cli::write(\Cli::color($msg, $colour));
    }
    
    // function setNNTP ($n) { $this->nntpconnection = $n; }
    // function setArticleList ($a) { $this->articleList = $a; }
    // function setNNTPMatchedArticle ($n) { $callback = $n; }
    // function setGroup($g) { $group = $g; }
    // function setMatch($m = ".*") { $matched = $m; }
    
    function run () 
    {
        
        self::$verbose = Cli::option('verbose', 0);

        $i = 0;
        
        do {
            
            $this->nntpconnection->selectGroup($this->group);
            
            sem_acquire($sem_id);
            $i = shm_get_var($shm_id,1);
            shm_put_var($shm_id,1,$i+1);
            sem_release($sem_id);
            
            while ($i < $this->last) {
                
                
                $lines = $this->nntpconnection->getHeader($i);
                
                foreach ($lines as $line) {
                    $kv = explode (": ",$line);
                    $headers[$kv[0]] = $kv[1];
                }
                
                
                // print $headers['Subject'] . "\n";
                // ob_flush();
                
                if (preg_match(sprintf('/%s/', $this->matched),$headers['Subject'])) {
                    $this->{$this->callback}->processArticle($headers);
                    self::message(sprintf(' - - Heading: %s', $headers['Subject'], 'green', 3));
                    // ob_flush();
                }
                else
                    self::message(sprintf(' - - Heading: %s', $headers['Subject'], 'green', 4));
                
                
                sem_acquire($sem_id);
                $i = shm_get_var($shm_id,1);
                shm_put_var($shm_id,1,$i+1);
                sem_release($sem_id);
                
            }
            
        } while ($i<$this->last);
        
}


}

?>
