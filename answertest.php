<?php

session_start();
include "conn.php";

$username = $_SESSION['username'];
mysqli_set_charset($conn, "utf8");

if(isset($_POST["sendMsg"])){
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $qtype = $_POST["qtype"];
    $id = $_POST['id'];
  
    $str =  $answer;

    $sql = "UPDATE oldmsg SET status=1 WHERE id=".$id;
    $query_insert = mysqli_query($conn, $sql);

    echo  $query_insert;
  
    //POST TO http://35.198.240.228:20000/api/wordset
    // $url = 'http://35.198.240.228:20000/api/wordset';
  
    // $dataToSend = array(
    //   'text' => $question,
    //   'type' => $qtype,
    //   'answer' => $str
    // );

  
    // $payload = json_encode($dataToSend);
  
    // $ch = curl_init( $url );
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $response = curl_exec($ch);
  
    // $data_response = json_decode($response, true);
    // $response_status = $data_response['Status'];
    // $response_message = $data_response['StatusMessage'];
    // $response_result = $data_response['Result'];
    // curl_close($ch);

    // $chn = curl_init('https://njmessengerbot.herokuapp.com/test/?id=1868064243272013&option='.$str);
    // // $test1 = ;
    // // curl_setopt($ch, CURLOPT_URL, $payload);
    // // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // $data = curl_exec($chn);
    // // curl_close($ch);
    // $data_response = json_decode($data, true);
    // //echo $data;
    // $response_status = $data_response['Status'];
    // $response_message = $data_response['StatusMessage'];
    // $response_result = $data_response['Result'];
    // curl_close($chn);
  //  header("Refresh:0");

// Get cURL resource
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

echo $urls;  

$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
  }
?>

<!DOCTYPE html>

<html>
<head>
  <title>Q/A Setting</title>
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}

body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}

table, td, th {
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

input[type=text], select {
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

.btn-remove{
  display:none;
  margin-right: 10px;
  margin-left: 5px;
}


</style>

<body class="w3-content" style="max-width:1200px; margin-top: 25px;">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide" ><a href="/WebProject/index.php" style="text-decoration: none; hover:none;"><b>NJ Network Devices</b></a></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="/WebProject/index.php" class="w3-bar-item w3-button"> Home </a>
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
      <?php
if ($_SESSION['status'] == 'admin') {?>
         <i class="fa fa-plus w3-margin-right w3-button" onclick="document.getElementById('addItem').style.display='block'"></i>
   <?php } else if ($_SESSION['status'] == 'user') {?>
            <i class="fa fa-shopping-cart w3-margin-right w3-button" onclick="document.getElementById('thecart').style.display='block'"><b style="color:red;"><?php echo "   " . $amountItems; ?></b></i>
        <?php }?>
       <i class="fa fa-search w3-button"  onclick="document.getElementById('search').style.display='block'"></i>

        <?php
if ($_SESSION['status'] == null) {?>
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
<div class="borderDiv" >
<?php
for ($x = 0; $x < sizeof($response_result) ; $x++) {?>
    
<form action="answertest.php" method="post">
        <div>
            <div class="row" style="margin-top: 20px">
              <div class="col-lg-2">
                <img src="icon\client.png" alt="Userpic" height="100" width="100" style="margin-left: 50px;">
              </div>

              <div class="col-lg-5" style="margin-top: 10px">
                <label style="display: inline; text-align: top;">Question:</label><br>
                <input type="text" id="question" name="question" value="<?php echo $response_result[$x]['message']; ?>" style="display: block;" required>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-8" align="right">
                <div id="questiongroup">
                  <label>Answer Type :</label> <br>

                <div id="answerparentdiv">
                  <div class="input-group" id="answerdiv1">
                  <input type="text" id="ans1" name="answer" style="margin-right: 50px;" placeholder="Enter the answer" style="display: block;" required>
                      <span class="input-group-btn">
                      <button class="btn btn-success mx-2 btn-add" type="button">+</button>
                      </span>
                  </div>
                </div>


                </div>

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
            <input type="text" value = "<?php echo strval($response_result[$x]['id']); ?>" name ="id">
              <input id="smtBtn" type="submit" name="sendMsg"  class="w3-button w3-border w3-round-large w3-green w3-hover-white" style="margin-right: 20px" value="Send">
              <button class="w3-button w3-border w3-round-large w3-red w3-hover-white" >Clear</button>
            </div>
        </div>
        </form>
        <?php
} 


?>
 </div>



<div class="w3-black w3-center w3-padding-24" style="margin-top: 100px"> ยินดีต้อนรับสู่ NJ Network Devices </div>

<!-- End page content -->
</div>


<?php if ($_SESSION['status'] == null) {?>
<!-- Login Modal -->
<div id="login" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('login').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide" >LOGIN</h2>
      <p style="align:center">Please login to continue.</p>
      <form method="POST" action="login.php">
        <p><input class="w3-input w3-border" type="text" placeholder="Enter Username" name="username"></p>
        <p><input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password"></p>
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
      <h2 class="w3-wide" >WANNA SEARCH SOMETHING?</h2>
      <form method="GET" action="search.php">
        <p><input class="w3-input w3-border" type="text" placeholder="Search" name="keyword"></p>
        <input type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('search').style.display='none'" value="Search">

      </form>

    </div>
  </div>
</div>

<?php if ($_SESSION['status'] == 'admin') {?>
<!-- AddItem Modal -->
<div id="addItem" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('addItem').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide" >Add New ITEM</h2>
      <p style="align:center">Please fill the item details.</p>
      <form method="POST" action="addItem.php" enctype="multipart/form-data">
        <p><input class="w3-input w3-border" type="text" placeholder="Enter Name" name="itemName"></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Price" name="price"></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Amount" name="amount"></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Enter Desciption (If any)" name="itemDes"></p>
        <p><input class="w3-input w3-border" type="file" placeholder="Enter Image path" name="imgage"></p>
        <input type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('addItem').style.display='none'" value="Add Item">

      </form>

    </div>
  </div>
</div>
<?php }?>

<!--
<script src="js/qaSetting.js"></script> -->

<script src="js/add_rm.js"></script>
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

function arrPrint() {
       var idname = "ans";
       var idno = 3;
       var myString = "";
       for(var i = 1; i <= idno; i++){
         var docName = idname + i;
         myString += document.getElementById(docName).value + ";";
       }
       console.log(myString);
}


</script>

</body>
</html>