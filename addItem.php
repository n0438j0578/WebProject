<?php

    include("conn.php");
    $name = $_POST['itemName'];
    $price = $_POST['price'];
    $des = $_POST['itemDes'];
    $filename = $_FILES['imgage']['name'];
    $amount = $_POST['amount'];

    if ($_FILES['imgage']['name'] != "" ) {
        if(!move_uploaded_file($_FILES["imgage"]["tmp_name"], "./img/".$_FILES["imgage"]["name"]))
        die( "Upload error with code ".$_FILES["imgage"]["error"]);
    }else die("You did not specify an input file or file excedd form");

    $insert_query_string = "INSERT INTO `product`(`name`, `price`, `des`, `img`, `amount`) VALUES ('".$name."', ".$price.", '".$des."', './img/".$filename."', ".$amount.");";
    $query_insert = mysqli_query($conn, $insert_query_string);
    if (!$query_insert) {
        printf("Error: %s\n", mysqli_error($conn));
        //exit();
    }else{
        header("Location: index.php"); /* Redirect browser */
        //exit();
    }

    $url = 'http://35.198.240.228:20000/api/addproduct';

    $dataToSend = array(
      'name' => $name,
      'des' => $des,
    );
  

    $payload = json_encode($dataToSend);

    $ch = curl_init( $url );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    $data_response = json_decode($response, true);
    $response_status = $data_response['Status'];
    $response_message = $data_response['StatusMessage'];
    $response_result = $data_response['Result'];
  

?>
