<?php
//v3
error_reporting(0);
ini_set('display_errors', 0);
session_start();
include "conn.php";

$username = $_SESSION['username'];
mysqli_set_charset($conn, "utf8");

// PRESS THE addQA BTN
if(isset($_POST["addQA"])){
  $question = $_POST["question"];
  $answer = $_POST["answer"];
  $qtype = $_POST["qtype"];

  $str = "";

  foreach ($answer as $index => $value) {
    // $str = $str.$answer[$index].":;";
    $str = $str.$answer[$index].":;";
  }

  //POST TO http://35.198.240.228:20000/api/wordset
  $url = 'http://35.198.240.228:20000/api/wordset';

  $dataToSend = array(
    'text' => $question,
    'type' => $qtype,
    'answer' => $str
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



  <div class="borderDiv" align="center">
  <?php
if ($response_status == "success") {?>
    <div class="w3-panel w3-green w3-display-container w3-round w3-card-4">
    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
      <h3>Success!</h3>
      <p><?php echo $response_message . ": " . $response_result; ?></p>
    </div>
<?php
} else if ($response_status == "failed") {?>
    <div class="w3-panel w3-red w3-display-container w3-round w3-card-4">
    <span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
      <h3>Failed!</h3>
      <p><?php echo $response_message . ": " . $response_result; ?></p>
    </div>
<?php }
?>
<script src="https://unpkg.com/vue@2.5.16/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<div class="row" style="margin-top: 20px" align="center">
<div class="hello">
    <div id = "computed_props" style="margin-left: 20px" class="col-lg-5">
       Msg : <input type = "text" v-model = "msg" /> <br/><br/>
       FacebookId : <input type = "text" v-model = "facebookid"/> <br/><br/>
       <button v-on:click="getfullname">Send</button>
       <h1>My name is {{msg}} {{facebookid}}</h1>
       {{info}}
        <h2>Essential Links</h2>
    </div>
    <div id="components-demo">
  <button-counter></button-counter>
</div>
 

</div>
</div>
<script>
Vue.component('button-counter', {
  data: function () {
    return {
      count: 0
    }
  },
  template: '<button v-on:click="count++">You clicked me {{ count }} times.</button>'
})
new Vue({ el: '#components-demo' })
    new Vue({
  el: "#computed_props",
  data: {
        msg :"",
        facebookid :"",
        info:""
  }, methods: {
    
    getfullname : function(){
            var  result = "https://njmessengerbot.herokuapp.com/test/?id="+this.facebookid+"&option="+this.msg
            var status = ""
            console.log(result)
             axios.get(result, { useCredentails: true })
             .then(response => (this.info = response));
            

        //https://njmessengerbot.herokuapp.com/test/?id=1868064243272013&option=นักเดินเล่นผู้หลงทาง
      }
  }
})
</script>
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