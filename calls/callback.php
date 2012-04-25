<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say>Let me find that customer for you!</Say>
    <Dial><?php echo $_REQUEST['number']?></Dial>
</Response>
