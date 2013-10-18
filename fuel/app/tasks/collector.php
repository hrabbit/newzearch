#!/usr/bin/php

<?php
    
    require_once 'Net/NNTP/Client.php';
    #require_once 'collectorThread.php';
    #require_once 'writeRSS.php';
    
    # if (! function_exists('pcntl_fork')) die('PCNTL functions not available on this PHP installation');
    
    $propFilename = "collector.json";
    
    $fis = file_get_contents ($propFilename);
    $prop = json_decode($fis);
    
    var_dump($prop['CurrentArticles']);
    
    #$prop['NewsServerPort'] = 119;
    #$prop['NewsServerHost'] = "news.netspace.net.au";
    #$prop['NewsServerUser'] = "";
    #$prop['NewsServerPass'] = "";

    #$prop['Threads'] = 8;
    #$prop['CurrentArticles'] = array('alt.binaries.teevee' => 426022395);
    
    #$fos = json_encode($prop);
    
    #file_put_contents ($propFilename,$fos);
    
    foreach ($prop['CurrentArticles'] as $group => $articles)
    {
    
        print "$group $articles\n";
        
    }

?>