  <?php  
require_once("config.php"); 
require_once("DeleteTempDoc.php");
$_SESSION['PageStatus'] = "";
                       
                        $FullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(strpos($FullUrl,"Login=Failed")){
                            echo '<script type="text/javascript"> alert("Failed To Login"); </script>';
                        }elseif(strpos($FullUrl,"Login=Logout")){
                            $_SESSION['PageStatus']= "";
                            echo '<script type="text/javascript"> alert("Successfully Logout"); 
                            window.location = "index.php";
                            </script>';
                           // header("Location: index.php");
                        }                        



if(isset($_POST['btnRFID'])){
    $varRFID = $_POST['txtRFID'];
    $queryS = "SELECT * FROM `studentuser` WHERE RFID = '$varRFID'";
    $result = mysqli_query($dbc,$queryS);
    $numRows =mysqli_num_rows($result);
    echo $numRows;
    if($numRows == 1){ 
        while($res = mysqli_fetch_array($result)){
            $_SESSION['LL_RFID'] = $res['RFID']; 
            $_SESSION['LL_StdID'] = $res['StdID'];   
            $_SESSION['LL_username'] = $res['username'];
            $_SESSION['LL_password'] = $res['password'];
            $_SESSION['LL_userType'] = $res['UserType'];
            $_SESSION['LL_Fname'] = $res['Fname'];
            $_SESSION['LL_Mname'] = $res['Mname'];
            $_SESSION['LL_Lname'] = $res['Lname'];
            $_SESSION['LL_EmailAdd'] = $res['EmailAdd'];
            $_SESSION['LL_Gender'] = $res['Gender'];
            $_SESSION['LL_Contact'] = $res['Contact'];
    }
}else{
            $_SESSION['LL_RFID'] = "";
            $_SESSION['LL_StdID'] = "";
            $_SESSION['LL_username'] = "";
            $_SESSION['LL_password'] = "";
            $_SESSION['LL_userType'] = "";
            $_SESSION['LL_Fname'] = "";
            $_SESSION['LL_Mname'] = "";
            $_SESSION['LL_Lname'] = "";
            $_SESSION['LL_EmailAdd'] = "";
            $_SESSION['LL_Gender'] = "";
            $_SESSION['LL_Contact'] = "";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Login</title>  

    <link href="Lumino/css/bootstrap.min.css" rel="stylesheet">
    <link href="Lumino/css/font-awesome.min.css" rel="stylesheet">
    <link href="Lumino/css/datepicker3.css" rel="stylesheet">
    <link href="Lumino/css/styles.css" rel="stylesheet">
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>


<link rel="stylesheet" type="text/css" href="Login%20Form_files/util.css">
<link rel="stylesheet" type="text/css" href="Login%20Form_files/main.css">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<style type="text/css">
    
    .radio-container {
  display: inline-block;
  margin-bottom: 10px;
}

.radio-label {
  font-size: 16px;
  cursor: pointer;
  padding-left: 25px;
  position: relative;
}

.radio-label:before {
  content: "";
  display: inline-block;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  border: 2px solid #aaa;
  position: absolute;
  left: 0;
  top: 2px;
}

.radio-container input[type="radio"] {
  opacity: 0;
  position: absolute;
  cursor: pointer;
}

.radio-container input[type="radio"]:checked + .radio-label:before {
  background-color: #2196F3;
  border-color: #2196F3;
}



</style>

 

<h1  class="m-0 text-uppercase text-primary" style="font-size: 187%;
    position: fixed;
    color: #800000 !important;
    font-weight: bolder;
    text-align-last: center;">
                <img src="img/pup-logo.png" style="width: 10%; " alt="image">
                    Polytechnic University of the Philippines
</h1>

<form  method="POST"  style="position: absolute;" onsubmit="AutoFillData()">
        <input autocomplete="off" style="opacity: 0%;" type="text"  id="RFID" name="txtRFID" placeholder="Focus here to scan " required>
        
         <button hidden  style="background: crimson;border: revert;"  name="btnRFID" id="btnRFID" type="submit">Submit</button>
</form>








<body onclick="FFocus()" style="padding-top: 0px;">

<div class="limiter">

    <div class="container-login100" style="background-color: #e4f0ef;">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <div style="text-align: center;">

                <h3>
                <img src="img/TNT-logo.png" style="width: 20%; " alt="image">
      
                 Tap N Track
      </h3> 

      <hr>
<div  style=""> <input  type="checkbox"  id="checkboxdata" name="checkboxdata" placeholder="Focus here to scan "> Enable this To login via RFID card</div>
            </div>
            <form id="LGform" class="login100-form validate-form flex-sb flex-w " method="post" onsubmit="return checkRadioButton()" action="AdminLogin.php">
        
                <span class="login100-form-title p-b-20">
              
                    Login

                </span>

                <span class="txt1 p-b-11">
                Username
                </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
                        <input class="input100" type="text" name="username" id="idusername">
                            <span class="focus-input100"></span>
                    </div>
                            <span class="txt1 p-b-11">
                                Password
                            </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                    <input class="input100" type="password" name="password" id="idpassword">
                        <span class="focus-input100"></span>
                    </div>

<div style="justify-content: space-between;" class="radio-container"><input  type="radio" id="Student" value="Student" name="userType" />
                <label for="Student" class="radio-label">Student</label></div>
            <div style="justify-content: space-between;" class="radio-container">

                <input  type="radio" id="Administrator" value="Admin" name="userType" />
                <label for="Administrator" class="radio-label">Administrator</label>

            </div>
<div><a>Forgot Password</a></div>
                    <!--Login Button-->
                    <div style="    place-content: center;" class="container-login100-form-btn">
                        <button class="login100-form-btn" id="buttonLogin1" name="buttonLogin1" type="submit" value="Login" >
                            Login
                        </button>
                    </div>
            </form>

</div>
</div>
</div>


<script>
 
    function checkRadioButton(){

        var bool = false;

      var radioButtons = document.getElementsByName("userType");

       for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
      //    console.log("The radio button with value " + radioButtons[i].value + " is checked.");
           bool = true;
        }
      }

if (bool == false) { alert("Please Select User Type"); }

return bool;
    }

 </script>


<script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script>

<iframe src="Footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>


<script type="text/javascript" async="" src="Login%20Form_files/analytics.js"></script><script type="text/javascript" async="" src="Login%20Form_files/analytics.txt"></script><script src="Login%20Form_files/jquery-3.txt"></script>

<script src="Login%20Form_files/animsition.txt"></script>

<script src="Login%20Form_files/popper.txt"></script>
<script src="Login%20Form_files/bootstrap.txt"></script>

<script src="Login%20Form_files/select2.txt"></script>

<script src="Login%20Form_files/moment.txt"></script>
<script src="Login%20Form_files/daterangepicker.txt"></script>

<script src="Login%20Form_files/countdowntime.txt"></script>

<script src="Login%20Form_files/main.txt"></script>

<script async="" src="Login%20Form_files/js.txt"></script>
<script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script>

        <hr class="hr1">    

  


    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>



<script type="text/javascript">
 
var warning = 0;
function FFocus(){

   // document.getElementById("RFID").focus();

    if(document.getElementById("checkboxdata").checked == true){
    document.getElementById("RFID").focus();
    document.getElementById("Administrator").checked = false;
    document.getElementById("Student").checked = false;
    
    if(warning == 0){
         alert("Please tap your RFID card to fetch data"); 
        warning = 1;
    }else{
      

    }
  
   // document.getElementById("checkboxdata").checked == false;
    }else{

    }
   
}



</script>


<script type="text/javascript">
 
function AutoFillData(){
   // document.getElementById("RFID").focus();

//alert("im click");



// var button = document.getElementById('btnSearch');
//         button.click();
}

</script>


<?php

    if(isset($_POST['btnRFID'])){
            $varLL_username = $_SESSION['LL_username'];
            $varLL_password = $_SESSION['LL_password'];
            $varLL_userType = $_SESSION['LL_userType'];

       if($varLL_userType == "Administrator"){
        echo '<script>document.getElementById("Administrator").checked = true;</script>';
        echo "Admin";
        echo '<script>document.getElementById("idusername").value = "'.$varLL_username.'";</script>';
        echo '<script>document.getElementById("idpassword").value = "'.$varLL_password.'";
        var button = document.getElementById("buttonLogin1");
        button.click();
        </script>';

        }else if ($varLL_userType == "Student") {
            echo '<script>document.getElementById("Student").checked = true;</script>';
            echo "Student";
        echo '<script>document.getElementById("idusername").value = "'.$varLL_username.'";</script>';
        echo '<script>document.getElementById("idpassword").value = "'.$varLL_password.'";
        var button = document.getElementById("buttonLogin1");
        button.click();
        </script>';

        } else {
            // code...
        }
        



    }

?>



</body>
</html>