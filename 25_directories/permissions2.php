<?php
chown('/tmp/myfile.txt','sklar');           // specify user by name
chgrp('/home/sklar/schedule.txt','soccer'); // specify group by name

chown('/tmp/myfile.txt',5001);              // specify user by uid
chgrp('/home/sklar/schedule.txt',102);      // specify group by gid
