<?php
namespace Fuel\Tasks;

    
    require_once 'Net/NNTP/Client.php';
    #require_once 'collectorThread.php';
    #require_once 'writeRSS.php';

    
class Collector
{
    
    public function run()
    {

        // get settings from DB
    
        $query = DB::select('hostname','port','ssl','username','password','name','current_article')->from('NNTPGroup');
        $query->join('NNTPServer');
        $query->on('NNTPGroup.NNTPServer_id', '=', 'NNTPServer.id');
        $query->where('NNTPGroup.active', '=', '1');
        $query->and_where('NNTPGroup.active', '=', '1');
        $query->execute()->as_array();
        
        foreach ($query as $group)
        {
            // get newest article for group
        
            // new articles array
        
            var_dump($group);
            
            #            print "$group\n";
        
            // for every thread
        
            // connect to news server
            // start collector thread.
        
            // wait for threads to finish
        
        }

    }
?>