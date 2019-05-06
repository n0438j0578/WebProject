<?php
    include("conn.php");

    $id =1234;
    $items = strval($id);
    echo  $items;
    $sql = "UPDATE oldmsg SET status=1 WHERE id=".$items;
    $query_insert = mysqli_query($conn, $sql);

    echo  $query_insert;
    
?>