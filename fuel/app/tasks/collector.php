<?php
namespace Fuel\Tasks;

    
    require_once 'Net/NNTP/Client.php';
    require_once 'collectorThread.php';
    #require_once 'writeRSS.php';

    
class Collector
{
    
    public function run()
    {

        // get settings from DB
    
        
        foreach (\Module_nntpgroup::getAllActive() as $group_setting)
        {
            var_dump($group_setting);

            // get newest article for group
        
            $nntp = new Net_NNTP_Client();

            $host = $group_setting['hostname'];
            $port = $group_setting['port'];
            
            $user = $group_setting['username'];
            $pass = $group_setting['password'];
            
            $groupname = $group_setting['name'];
            
            // ssl ? 
            # http://pear.php.net/manual/en/package.networking.net-nntp.client.connect.php
            if ($nntp->connect($host,$port)) {
                
                if ($user) { $nntp->authenticate($user,$pass); }

                $group = $nntp->selectGroup($groupname);
                
                $last = $group['last'];
                $first = $group_setting['current_article'];
                
                $nntp->quit();
                // new articles array
        
                $articles = range($first,$last);
            
                # print "$group\n";
        
                // for every thread
            
                // where is thread number setting stored
            foreach (range(1,8) as $thread_number)
            {
                
            // connect to news server
                if ($nntp->connect($host,$port)) {

                    if ($user) { $nntp->authenticate($user,$pass); }

                    $callback = new writeRSS();
                    
            // start collector thread.
                    # http://php.net/manual/en/class.thread.php
                    $threadArray[$thread_number] = new collectorThread($nntp,$articles,$groupname,$callback,'.*\.nzb.*');
                    $threadArray[$thread_number]->run();
                }
            }
                // wait for threads to finish
                
                foreach ($threadArray as $thread)
                {
                    $thread->join();
                }
                
            }
        }

    }
?>
