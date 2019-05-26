<?php
    session_start();
    include("conn.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pass_sha512 = hash("sha512", $password);
    //echo $pass_sha512;

    $login_query_string = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$pass_sha512."';";
    $query_login = mysqli_query($conn, $login_query_string);
    if (!$query_login) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $row = mysqli_fetch_array($query_login);
    if($row){
        $_SESSION['id'] = $row['id'];
	    $_SESSION['name'] = $row['name'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = $row['status'];
        session_write_close();
        header("Location: index.php");
    }else{
	    echo '<script> alert("Something went wrong! Please Login again."); window.location.replace("/WebProject/index.php"); </script>';
    }
?>