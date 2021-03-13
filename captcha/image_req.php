<?php

// Echo the image - timestamp appended to prevent caching
echo '<img src="captcha/images/image.php?' . time() . '" width="132" height="46" alt="Captcha image"><p style="color:#000;">Can not read the image? click <a href="#" id="refreshimg" title="Click to refresh image" style="color:red;">here</a> to refresh</p>';

?>
