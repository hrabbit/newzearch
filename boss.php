<?php

$start = 0;
$end = 500;

$tmp = tempnam('/tmp', 'newzearch_article');
$article_key = ftok($tmp, 'a');

$shm_id = shm_attach ($article_key);
if ($shm_id === false) {
    die('Unable to create the shared memory segment');
}

$counter = $start;

if (!shm_put_var($shm_id, 1, $counter))
{
    echo "Failed to put var 1 in shared memory $shm_id.\n";
}



$tmp = tempnam('/tmp', 'newzearch_article_sem');
$sem_key = ftok($tmp, 'a');
$sem_id = sem_get( $sem_key);


$count = 0;

while ($count < 8) {

$pid = pcntl_fork();
if ($pid == -1) {
     die('could not fork');
} else if ($pid) {
    // we are the parent
	$count ++;
} else {

	sem_acquire($sem_id);
	$counter = shm_get_var($shm_id,1);
	sem_release($sem_id);

	while ($counter < $end) {

		sem_acquire($sem_id);
		$counter = shm_get_var($shm_id,1);
		$counter++;
		shm_put_var($shm_id,1,$counter);
		sem_release($sem_id);
		if ($counter < $end) {
			print "proc: $count -> $counter\n";
		}


	}
	exit;

}

$ddcount ++;
}
pcntl_wait($status); //Protect against Zombie children
sem_remove($sem_id);
shm_detach($shm_id);
