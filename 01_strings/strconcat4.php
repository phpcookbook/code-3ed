<?php
print <<< END
Right now, the time is 
END
. strftime('%c') . <<< END
 but tomorrow it will be 
END
. strftime('%c',time() + 86400);
