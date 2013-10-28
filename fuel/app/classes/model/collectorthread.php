<?php

use \Cli;

class Model_collectorthread // extends Thread 
{
    
    private $nntpconnection;
    private $matched;
    private $callback;
    private $group;
    private $artcleList;
    private static $verbose = 0;
    
    // $threadArray[$thread_number] = new \Model_collectorthread($nntp,$articles,$nntpgroup['name'],$callback,'.*\.nzb.*');

    // function __construct($nn, $al, $nn, $grp, $ma) {
    function __construct($nntp, $articles, $group, $callback, $matched) {
        
        $this->nntpconnection = $nntp;
        $this->articleList = $articles;
        // $this->setNNTPMatchedArticle($nma);
        $this->group = $group;
        $this->matched = $matched;
        $this->callback = $callback;
        
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
            
            while ($i = array_shift($this->articleList)) {
                
                
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
                
                
            }
            
        } while ($i);
        
}


}

?>
