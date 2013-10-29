<?php
    namespace Fuel\Tasks;
    
    # require_once '\Module_nntpclient.php';
    # require_once 'collectorThread.php';
    # require_once 'writeRSS.php';
    
    
    class Collector
    {
        
        public function run()
        {
            
            // get settings from DB
            
            
            foreach (\Module_nntpgroup::getAllActive() as $group_setting)
            {
                # var_dump($group_setting);
                
                // get newest article for group
                
                $nntp = new \Module_nntpclient();
                
                $host = $group_setting['hostname'];
                $port = $group_setting['port'];
                $ssl = $group_setting['ssl'];
                
                $user = $group_setting['username'];
                $pass = $group_setting['password'];
                
                $groupname = $group_setting['name'];
                
                $threads = 8; // Where can I read this from
                
                // ssl ?
                # http://pear.php.net/manual/en/package.networking.net-nntp.client.connect.php
                if ($nntp->connect($host,$ssl,$port,$user,$pass)) {
                    
                    $group = $nntp->selectGroup($groupname);
                    
                    $last = $group['last'];
                    $first = $group_setting['current_article'];
                    
                    $nntp->quit();
                    // new articles array
                    
                    
                    $tmp = tempnam('/tmp', 'newzearch_article');
                    $article_key = ftok($tmp, 'a');
                    
                    $shm_id = shm_attach ($article_key);
                    if ($shm_id === false) {
                        die('Unable to create the shared memory segment');
                    }
                    
                    $tmp = tempnam('/tmp', 'newzearch_article_sem');
                    $sem_key = ftok($tmp, 'a');
                    $sem_id = sem_get( $sem_key);
                    
                    if ($shm_id === false) {
                        shm_detach($shm_id);
                        die('Unable to create the shared memory segment');
                    }
                    
                    if (!shm_put_var($shm_id, 1, $first))
                    {
                        echo "Failed to put var 1 in shared memory $shm_id.\n";
                    }
                    
                    
                    
                    #  $articles = range($first,$last);
                    
                    # print "$group\n";
                                        
                    $callback = new \Model_nntparticle();

                    // where is thread number setting stored
                    foreach (range(1,$threads) as $thread_number)
                    {
                            $pid = pcntl_fork();
                            if ($pid == -1) {
                               // die('could not fork');
                            } else if ($pid) {
                                // we are the parent
                            } else {
                                $nntp = new \Module_nntpclient();
                                
                                // connect to news server
                                if ($nntp->connect($host,$ssl,$port,$user,$pass)) {

                                    $collect = new \Model_collectorthread($sem_id,$shm_id,$last,$nntp,$groupname,$callback,'.*\.nzb.*');
                                    $collect->run();
                                }
                            }
                            
                    }
                    // wait for threads to finish
                    pcntl_wait($status); //Protect against Zombie children
                    sem_remove($sem_id);
                    shm_detach($shm_id);
                    
                    
                }
            }
            
        }