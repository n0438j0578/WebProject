<?php
//v3
// error_reporting(0);
// ini_set('display_errors', 0);

session_start();
include "../conn.php";

$username = $_SESSION['username'];
mysqli_set_charset($conn, "utf8");

$query_msg = mysqli_query($conn, 'SELECT * FROM oldmsg WHERE status = 0');


$submit_id = "";

// PRESS THE addQA BTN
if(isset($_POST["addQA"])){
// if(isset($_POST[$submit_id])){
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $qtype = $_POST["qtype"];
    $id = $_POST['id'];

    $str = "";
    $str =  $answer;

    $sql = "UPDATE oldmsg SET status=1 WHERE id=".$id;
    $query_insert = mysqli_query($conn, $sql);

    echo  $str;
    $curl = curl_init();
// Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://njmessengerbot.herokuapp.com/test/?id=1868064243272013&option='.urlencode($str),
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ]); 
// Send the request & save response to $resp
    $resp = curl_exec($curl);
// Close request to clear up some resources
    curl_close($curl);


    /* ---------------------------------- Old ------------------------------*/
    $str2 = "";

    echo $answer;

  foreach ($answer as $index => $value) {
    // $str = $str.$answer[$index].":;";
    $str2 = $str2.$answer[$index].":;";
  }

  echo $str2;

  //POST TO http://35.198.240.228:20000/api/wordset
   $url = 'http://35.198.240.228:20000/api/wordset';


  $dataToSend = array(
    'text' => $question,
    'type' => $qtype,
    'answer' => $str2
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

  header("Location: answer_nut.php"); /* Redirect browser */

}

/*-------------------------------------------------------------------------

// if(isset($_POST["sendMsg"])){
//     $question = $_POST["question"];
//     $answer = $_POST["answer"];
//     $qtype = $_POST["qtype"];
//     $id = $_POST['id'];
*/

    

?>

<!DOCTYPE html>

<html>

<head>
    <title>Reply Messages</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" ></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="../js/add_rm.js" type="text/javascript"></script>
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

    .borderDiv:hover{
        background: #ebebe0;
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
</style>

<body class="w3-content" style="max-width:1200px; margin-top: 25px;">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><a href="../index.php" style="text-decoration: none; hover:none;"><b>NJ Network Devices</b></a></h3>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a href="../index.php" class="w3-bar-item w3-button"> Home </a>
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
                <?php if ($_SESSION['status']=='admin' ) {?>
                <i class="fa fa-plus w3-margin-right w3-button" onclick="document.getElementById('addItem').style.display='block'"></i>
                <?php } else if ($_SESSION['status']=='user' ) {?>
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
        </header>

    <?php
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://35.198.240.228:20000/api/unrepiled');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $data_response = json_decode($data, true);
    //echo $data;
        $response_status = $data_response['Status'];
        $response_message = $data_response['StatusMessage'];
        $response_result = $data_response['Result'];
    ?>

            <!-----------------------------------------------Blocks begin-------------------------------------------------------------------------->
            
            <div class="col-lg-12>">
            <form action="answer_nut.php" method="post">

            <?php 
                $jquery_string = "";
                $jquery_string2 = "";
            //  $jquery_string3 = "";
        

                while($msg_array = mysqli_fetch_array($query_msg)){ 
                    
                    $temp = '$("body").on("click", "#mainDiv'.$msg_array['id'].'", 
                    function(e){
                        $("#wrapDiv'.$msg_array['id'].'").slideDown("slow");
                    })
                    ';
                    $jquery_string = $jquery_string.$temp;


                    $submit_btn = '$("#smtBtn'.$msg_array['id'].'").click(function(){
                            let question = document.getElementById("question").val();
                            alert(json);
                    })
                    ';
                    $jquery_string2 = $jquery_string2.$submit_btn;

                    $submit_id = "smtBtn".$msg_array['id'];


                    // $rmbtn = '$("body").on("click", ".btn-remove", function(e){
		
                    //     if($(this).closest("div").is(":last-child")){
                    //         $(this).closest("div").prev().find(".btn-add").show();
                    //     }
                        
                    //     let amountanswer = $("#answerparentdiv").children().length;
                
                    //     if(amountanswer-1 == 1){
                    //         $(this).closest("div").prev().find(".btn-remove").hide();
                    //     }
                
                    //     if(amountanswer > 1) {
                    //         $(this).closest("div").remove();
                    //     }
                
                    // })
                    // ';
                    // $jquery_string3 = $jquery_string3.$rmbtn;

                    

            ?>
            <!------------------------------------------------- Main Div ------------------------------------------------------------------------->            
                <div id="mainDiv<?php echo $msg_array['id']; ?>" class="borderDiv" align="center" data-down="collapse" data-target="#wrapDiv<?php echo $msg_array['id']; ?>" >
                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-2">
                            <img src="..\icon\client.png" alt="Userpic" height="100" width="100" style="margin-left: 50px;">
                        </div>

                        <div class="col-lg-9" style="margin-top: 10px" align="left">
                            <label style="display: inline; text-align: top;">Message:</label><br>
                            <input type="text" readonly="true" name="question" value="<?php echo $msg_array['message'] ?>" style="display: block;" />
                            
                            <!-- <p><?php echo $msg_array['message'] ?></p> -->
                        </div>

            <!------------------------------------------------- Wrap Div ------------------------------------------------------------------------->

                        <div id="wrapDiv<?php echo $msg_array['id']; ?>"  style="display: none;">
                        <div class="container">
        
                            

                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-8" align="right">
                                <div id="questiongroup">
                                    <label>Answer:</label> <br>

                            <div id="answerparentdiv" class="answerparentdiv">
                                <div class="input-group" id="answerdiv1">
                                    <input type="text" id="ans1" name="answer" placeholder="Enter the answer" style="display: block;" onchange="arrPrint()" required>
                                    <span class="input-group-btn">
											<button class="btn btn-danger btn-remove" type="button">-</button>
                                            <button class="btn btn-success mx-2 btn-add" type="button">+</button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $msg_array['id']; ?>">


                        <label>Question Type :</label> <br>
                        <select required name="qtype">
                            <option value="" disabled selected>Choose type of question</option>
                            <option value="greeting">Greeting</option>
                            <option value="order">Order</option>
                            <option value="problem">Problem</option>
                            <option value="search">Search</option>
                        </select>
                    </div>
                </div>

            <div align="center" style="margin-bottom: 20px; margin-top: 10px">
            <input id="smtBtn<?php echo $msg_array['id']; ?>" type="submit" name="addQA" onclick="arrPrint();" class="w3-button w3-border w3-round-large w3-green w3-hover-white" style="margin-right: 20px" value="Save">
              <!-- <input id="<?php echo $submit_id ?>" type="submit" name="<?php echo $submit_id ?>" onclick="arrPrint();" class="w3-button w3-border w3-round-large w3-green w3-hover-white" style="margin-right: 20px" value="Save">               -->
              <button class="w3-button w3-border w3-round-large w3-red w3-hover-white" >Clear</button>
            </div>
        
        </form>
                </div>


                        </div>

                        </div>
                    </div>
                <br>
                <br>
                 <!--------------------------------------------- End blocks ---------------------------------------------------------------------->
                 
            <?php } ?>
            
                </div>       
           

           


        </div>

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
        // document.getElementById("myBtn").click();
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        function arrPrint() {
            var idname = "ans";
            var idno = 3;
            var myString = "";
            for (var i = 1; i <= idno; i++) {
                var docName = idname + i;
                myString += document.getElementById(docName).value + ";";
            }
            console.log(myString);
        }
        
        <?php 
            echo $jquery_string;
            echo $jquery_string2; 
       
         
        ?>
         

    </script>

</body>

</html>