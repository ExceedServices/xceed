<?php

    if(!isset($_SESSION))
        session_start();

    if (!isset($_SESSION['id']))
        header('location: /');

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say>Hello <?php echo $_SESSION['name'] ?>, let me find your customer!</Say>
    <Dial><?php echo $_REQUEST['number']?></Dial>
</Response>
