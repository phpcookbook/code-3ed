<?php
$semaphore_id = 100;
$segment_id   = 200;
// get a handle to the semaphore associated with the shared memory
// segment we want
$sem = sem_get($semaphore_id,1,0600);
// ensure exclusive access to the semaphore
sem_acquire($sem) or die("Can't acquire semaphore");
// get a handle to our shared memory segment
$shm = shm_attach($segment_id,16384,0600);
// Each value stored in the segment is identified by an integer
// ID
$var_id = 3476;
// retrieve a value from the shared memory segment
if (shm_has_var($shm, $var_id)) {
    $population = shm_get_var($shm,$var_id);
}
// Or initialize it if it hasn't been set yet
else {
    $population = 0;
}
// manipulate the value
$population += ($births + $immigrants - $deaths - $emigrants);
// store the value back in the shared memory segment
shm_put_var($shm,$var_id,$population);
// release the handle to the shared memory segment
shm_detach($shm);
// release the semaphore so other processes can acquire it
sem_release($sem);
