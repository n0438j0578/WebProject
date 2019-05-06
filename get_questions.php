<?php
    include('conn.php');
    header('Content-Type: application/json; charset=utf-8');
    mysqli_set_charset($conn,"utf8");

    $cmd = $_POST['cmd'];

    $q_question = "SELECT message FROM collections WHERE 1";

    if($cmd === "get_question"){
        $query = mysqli_query($conn, $q_question);
        $row = array();
        while($r = mysqli_fetch_assoc($query)) {
            $rows[] = $r['message'];
        }

        $result = json_encode($rows);

        echo $result;
    }
?>