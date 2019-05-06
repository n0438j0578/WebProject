<?php 

    include("conn.php");

    $storename_query_string = "SELECT * FROM store_info";

    $query_result = mysqli_query($conn, $storename_query_string);

    $store_name_banner = "Default";

    if (!$query_result) {
        $store_name_banner = "Store Name";
        //echo $store_name;
        printf("Error: %s\n", mysqli_error($conn));
    }else{
        while($row = mysqli_fetch_array($query_result)) {
            $store_name_banner = $row['store_name'];
        }
        //echo $store_name;
    }
?>