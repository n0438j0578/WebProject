<?php
  //error_reporting(0);
  //ini_set('display_errors', 0);
  session_start();
  include("conn.php");
  include("store_info.php");

  if(isset($_POST["delBtn"])){

    $id = $_REQUEST['id'];
    $sqldelete = 'DELETE FROM `collections` WHERE ID = "'.$id.'";';
    if($query = mysqli_query($conn, $sqldelete)){
        echo "<script type='text/javascript'>alert('Delete Success!');</script>";
        header("Location: seeQA.php");
	}else{
		echo '<script> alert("Delete Failed!); </script>';
	}
      
    // $store_name = $_POST['storeName'];
    // $filename = $_FILES['storeImage']['name'];
    
    // if ($_FILES['storeImage']['name'] != "" ) {
    //     if(!move_uploaded_file($_FILES["storeImage"]["tmp_name"], "./bank/bank_pic.jpg"))
    //     die( "Upload error with code ".$_FILES["storeImage"]["error"]);
    // }else {die("You did not specify an input file or file excedd form");}

    // $bank_path = "./bank/".$filename."";
    // $update_query_string = "UPDATE store_info SET store_name='".$store_name."', bank_path= '".$bank_path."'";
    // $update_insert = mysqli_query($conn, $update_query_string);
    // if (!$update_insert) {
    //     printf("Error: %s\n", mysqli_error($conn));
    //     exit();
    // }else{
    //     echo '<script type="text/javascript">alert("Success!");</script>';
    //     //header("Location: store_setting.php");
    //     //exit();
    // }
  }

  $query_qa_string = "SELECT * FROM collections WHERE types='problem' OR types='greeting'";
  $qa_arr = mysqli_query($conn, $query_qa_string);

?>

<!DOCTYPE html>

<html>

<head>
    <title>Store Setting</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<style>
    .w3-sidebar a {
        font-family: "Roboto", sans-serif
    }
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .w3-wide {
        font-family: "Montserrat", sans-serif;
    }
    table,
    td,
    th {
        border: 1px solid #ddd;
        text-align: left;
    }
    /* table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}

#area, #area2 {
  width: 350px;
  height: 70px;
  padding: 10px;
  border: 1px solid #aaaaaa;
} */
    
    .borderDiv {
        border-radius: 25px;
        border-style: dotted;
        border-color: grey;
    }
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    ul.ui-autocomplete {
        list-style: none;
    }
    .btn-remove {
        display: none;
        margin-right: 10px;
        margin-left: 5px;
    }

    a:hover {
        text-decoration: none;
    }
</style>

<body class="w3-content" style="max-width:1200px; margin-top: 25px;">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><a href="/WebProject/index.php" style="text-decoration: none; hover:none;"><b><?php echo $store_name_banner ?></b></a></h3>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a href="/WebProject/index.php" class="w3-bar-item w3-button"> Home </a>
            <br>
            <?php if ($_SESSION[ 'status']=='admin' ) {?>
            <a href="qa_setting.php" class="w3-bar-item w3-button">Q/A Setting</a>
            <br>
            <a href="reply_msg.php" class="w3-bar-item w3-button">Reply Messages</a>
            <br>
            <?php } ?>
        </div>


    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
        <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>

        <!-- Top header -->
        <header class="w3-container w3-xlarge">
            <p class="w3-right">
                <?php if ($_SESSION[ 'status']=='admin' ) {?>
                <i class="fa fa-plus w3-margin-right w3-button" onclick="document.getElementById('addItem').style.display='block'"></i>
                <?php } else if ($_SESSION[ 'status']=='user' ) {?>
                <i class="fa fa-shopping-cart w3-margin-right w3-button" onclick="document.getElementById('thecart').style.display='block'"><b style="color:red;"><?php echo "   " . $amountItems; ?></b></i>
                <?php }?>
                <i class="fa fa-search w3-button" onclick="document.getElementById('search').style.display='block'"></i>

                <?php if ($_SESSION['status']==null) {?>
                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('login').style.display='block'">Login</a>
                <?php } else {?>
                <a class="w3-bar-item w3-button w3-padding" style="color: grey;">Hello! <?php echo $_SESSION['username']; ?> </a>
                <a class="w3-bar-item w3-button w3-padding" href="logout.php"> Logout </a>
                <?php }?>
            </p>
            <br>
            <br>
            <br>
            <br>
        </header>


        <?php while($qa = mysqli_fetch_array($qa_arr)){?>
    <div class="col-lg-12>">
        <div class="borderDiv">
        
            <form action="seeQA.php" method="post">
                <div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-2">
                            <img src="icon\client.png" alt="Userpic" height="100" width="100" style="margin-left: 50px;">
                        </div>

                        <div class="col-lg-9" style="margin-top: 10px" align="left">
                            <label style="display: inline; text-align: top;">Question:</label>
                            <br>
                            <input type="text" id="question" name="question" placeholder="Enter the question" style="display: block;" value='<?php echo $qa['message']; ?>' required>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-9" align="right">
                        <div id="questiongroup">
                                    <label>Answer:</label> <br>
                                <?php 
                                
                                $arr = explode(":;",$qa['answer']);
                                $ans_len = count($arr)-1;

                                for($i = 0; $i < $ans_len; $i++){
                            
                                ?>

                            <div id="answerparentdiv" class="answerparentdiv">
                            <input type="text" id="delBtn" name="delBtn" placeholder="Enter the answer" style="display: inline;" onchange="arrPrint()" value='<?php echo $arr[$i]; ?>' required>
                                <!-- <div class="input-group" id="answerdiv1">
                                    
                                </div> -->
                            </div>
                                <?php }?>
                        </div>

                        </div>
                    </div>
          
                    <div align="center" style="margin-bottom: 20px; margin-top: 10px">
                        <input id="smtBtn" type="submit" name="addQA" onclick="arrPrint();" class="w3-button w3-border w3-round-large w3-red w3-hover-white" style="margin-right: 20px" value="Delete">
                        <!-- <button class="w3-button w3-border w3-round-large w3-red w3-hover-white">Clear</button> -->
                    </div>

                    <input type="hidden" name="id" value="<?php echo $qa['id']; ?>">
                </div>
            </form>
        </div>

        
                
            </form>
        </div>
        <br>

        <?php } ?>
    </div>

        <div class="w3-black w3-center w3-padding-24" style="margin-top: 100px"> ยินดีต้อนรับสู่ร้าน <?php echo $store_name_banner ?> </div>
        

        <!-- End page content -->
    </div>


    <?php if ($_SESSION[ 'status']==null) {?>
    <!-- Login Modal -->
    <div id="login" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
            <div class="w3-container w3-white w3-center">
                <i onclick="document.getElementById('login').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
                <h2 class="w3-wide">LOGIN</h2>
                <p style="align:center">Please login to continue.</p>
                <form method="POST" action="login.php">
                    <p>
                        <input class="w3-input w3-border" type="text" placeholder="Enter Username" name="username">
                    </p>
                    <p>
                        <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password">
                    </p>
                    <input type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('login').style.display='none'" value="Login">

                </form>

            </div>
        </div>
    </div>
    <?php }?>

    <!-- Search Modal -->
    <div id="search" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
            <div class="w3-container w3-white w3-center">
                <i onclick="document.getElementById('search').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
                <h2 class="w3-wide">WANNA SEARCH SOMETHING?</h2>
                <form method="GET" action="search.php">
                    <p>
                        <input class="w3-input w3-border" type="text" placeholder="Search" name="keyword">
                    </p>
                    <input type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('search').style.display='none'" value="Search">

                </form>

            </div>
        </div>
    </div>

    <?php if ($_SESSION[ 'status']=='admin' ) {?>
    <!-- AddItem Modal -->
    <div id="addItem" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
            <div class="w3-container w3-white w3-center">
                <i onclick="document.getElementById('addItem').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
                <h2 class="w3-wide">Add New ITEM</h2>
                <p style="align:center">Please fill the item details.</p>
                <form method="POST" action="addItem.php" enctype="multipart/form-data">
                    <p>
                        <input class="w3-input w3-border" type="text" placeholder="Enter Name" name="itemName">
                    </p>
                    <p>
                        <input class="w3-input w3-border" type="text" placeholder="Price" name="price">
                    </p>
                    <p>
                        <input class="w3-input w3-border" type="text" placeholder="Amount" name="amount">
                    </p>
                    <p>
                        <input class="w3-input w3-border" type="text" placeholder="Enter Desciption (If any)" name="itemDes">
                    </p>
                    <p>
                        <input class="w3-input w3-border" type="file" placeholder="Enter Image path" name="imgage">
                    </p>
                    <input type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('addItem').style.display='none'" value="Add Item">

                </form>

            </div>
        </div>
    </div>
    <?php }?>

    <!--
<script src="js/qaSetting.js"></script> -->

    <script type="text/javascript">
        // Accordion
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // Click on the "Jeans" link on page load to open the accordion for demo purposes
        document.getElementById("myBtn").click();
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

    </script>

</body>

</html>