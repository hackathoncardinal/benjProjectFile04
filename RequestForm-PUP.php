<?php 
require_once("config.php"); 
                $varRFID =   "";
                $varStdID =  "";
                $varFname =  "";
                $varMname =  "";
                $varLname = "";
                $varEmailAdd = "";
                $varGender = "";
                $varContact = "";
function alert($msg) {
        echo "<script type='text/javascript'>
            alert('$msg');
            </script>";
}


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pms";
    $conn = new mysqli($servername, $username, $password, $dbname);


   // Handle add operation
if (isset($_POST['add'])) {// startt addd------------------------------

        $new_data = $_POST['new_data'];
       // echo $new_data;
        //  INSERT INTO `your_table_name`(`id`, `column_name`) VALUES ('[value-1]','[value-2]')
     //   $sql = "UPDATE your_table_name SET column_name = '$new_data' WHERE id = $update_id";
      //  $sql = "INSERT INTO `your_table_name`(`column_name`) VALUES ('$new_data')";
       $sql = $new_data;
        if ($conn->query($sql) === TRUE) {
          //  echo "Record Added successfully.";
        } else {
            echo "Error Add record: " . $conn->error;
        } 
    } // end addd------------------------------

if (isset($_POST['delete'])) {// startt delete------------------------------
        $update_id = $_POST['update_id'];
        $new_data = $_POST['new_data'];

     
        $sql = "DELETE FROM `itemlist` WHERE id = '$update_id' ";
        //echo $sql;
        if ($conn->query($sql) === TRUE) {
          //  echo "Record Delete successfully.";
        } else {
            echo "Error Add recodeleted: " . $conn->error;
        }
    } // end delete------------------------------



// Check if the "mobile" word exists in User-Agent 
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
  
// Check if the "tablet" word exists in User-Agent 
$isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet")); 
 
// Platform check  
$isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows")); 
$isAndroid = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android")); 
$isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone")); 
$isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad")); 
$isIOS = $isIPhone || $isIPad; 
$vardevice="";
//echo $_SERVER["HTTP_USER_AGENT"];

if($isMob){ 
    if($isTab){ 
       // echo 'Using Tablet Device...'; 

    }else{ 
      //  echo 'Using Mobile Device...'; 
    } 
}else{ 
    //echo 'Using Desktop...'; 
} 
 
if($isIOS){ 
    //echo 'iOS'; 
    $vardevice = "iOS";
}elseif($isAndroid){ 
   //  echo 'ANDROID'; 
    $vardevice = "ANDROID";
}elseif($isWin){ 
  //   echo 'WINDOWS'; 
    $vardevice = "WINDOWS";
}

$query = "INSERT INTO `visit_log`(`client`, `device`) VALUES ('".$_SERVER["HTTP_USER_AGENT"]."','$vardevice')";
//echo "\n $query";

$result = mysqli_query($dbc,$query);
if($result){
 //   echo "save";
}else{
   // echo "not save";
}


if(isset($_POST['btnRFID'])){

      
$vartxtRFID = $_POST['txtRFID'];

$CheckRFID = mysqli_query($dbc,"SELECT * FROM `studentuser` WHERE RFID ='$vartxtRFID'"); 
$numRows =mysqli_num_rows($CheckRFID);
 if($numRows == 1){

    while($res = mysqli_fetch_array($CheckRFID)){
          //  $_SESSION['userID'] = $res['IDnumber'];
                
                $varRFID = $res['RFID'];
                $varStdID = $res['StdID'];
                $varFname = $res['Fname'];
                $varMname = $res['Mname'];
                $varLname = $res['Lname'];
                $varEmailAdd = $res['EmailAdd'];
                $varGender = $res['Gender'];
                $varContact = $res['Contact'];
               

           
         }

 }else{
                $varRFID =   "";
                $varStdID =  "";
                $varFname =  "";
                $varMname =  "";
                $varLname = "";
                $varEmailAdd = "";
                $varGender = "";
                $varContact = "";
                alert("data not found");
 }

}else{
 //  echo "not detected"; 
}



                        $FullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(strpos($FullUrl,"RequestForm=YouHavePendingRequest")){
                            echo '<script type="text/javascript"> alert("You Already have a Pending Request"); </script>';
                        }elseif(strpos($FullUrl,"RequestForm=YouHavePendingRequestInProgress")){
                            $_SESSION['PageStatus']= "";
                            echo '<script type="text/javascript"> alert("You Already have a Ongoing  Request"); </script>';
                        } 




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PUP - Request Form</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

<style>
    /* Remove default button styles */
    .button-link {
      background: none;
      border: none;
      padding: 0;
      font-family: inherit;
      font-size: inherit;
      color: blue;
      text-decoration: underline;
      cursor: pointer;
    }
  </style>



<style>
        table {
            border-collapse: collapse;
            width: 100%;
                border: inset;
        }

        th, td {
            text-align: left;
            padding: 8px;

        }

        th {
            background-color: #800000;
            color: whitesmoke;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
/*            f2f2f2 a86d6d */
        }
        tr:nth-child(odd) {
            background-color: #darkgrey;
             color: black;
/*            f2f2f2 a86d6d */
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

         /* Modal styles */
        .modal2 {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal2-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

.close1 {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close1:hover,
        .close1:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

.close2 {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close2:hover,
        .close2:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>


</head>




<script>
    function addDash (element) {        
        
        let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.
        
        let finalVal = ele.match(/.{1,4}/g).join('-');
        document.getElementById(element.id).value = finalVal;
        
        
    }
</script>



<div>
  


      <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index1.php" class="navbar-brand p-0">
            <h1 class="m-0 text-uppercase text-primary" style=" font-size: 120%;  ">
                <img src="img/pup-logo.png" style="width: 12%; " alt="image">
                    Polytechnic University of the Philippines
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 me-n3">
                <a href="index1.php" class="nav-item nav-link">Home</a>
                <a <?php echo $_SESSION['RequestForm']; ?> href="RequestForm-PUP.php" class="nav-item nav-link active">Request Form</a>                                            
                <a <?php echo $_SESSION['contact']; ?> href="contact.php" class="nav-item nav-link">Contact</a>
                <a href="team.php" class="nav-item nav-link">Team</a> 
                <div <?php echo $_SESSION['Profile-more']; ?> class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown"><?php echo $_SESSION['UserProfile']; ?></a>
                    <div class="dropdown-menu m-0">  
                     <a <?php echo $_SESSION['ListingPage']; ?> href="ListingPage.php" class="dropdown-item">My Listing</a>                      
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Registration.php" class="dropdown-item ">RFID Registation</a>
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Update.php" class="dropdown-item">RFID Update</a>
                        <a <?php echo $_SESSION['Student']; ?> href="PUP-Student-Registration.php" class="dropdown-item ">Student Registation</a>
                        <a <?php echo $_SESSION['Student']; ?> href="PUP-Student-Update.php" class="dropdown-item">Student Update</a>
                        <a <?php echo $_SESSION['PUP-ChangePassword']; ?>  href="PUP-ChangePassword.php" class="dropdown-item ">Change Password</a>
                        <a <?php echo $_SESSION['PUP-PrintReports']; ?> href="PUP-PrintReports.php" class="dropdown-item">Print Reports</a>                                    
                        <a href="index.php?Login=Logout" onclick="return Logout();"  class="dropdown-item">[ <?php echo $_SESSION['UserProfile']; ?> ] Logout</a>
                    </div>
                </div>
                <a href="#" class="nav-item nav-link" style="opacity: 0;"> ---- </a> 
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


<script>
     function Logout() {
      var result = confirm("Do you want to Logout?");
      
      if (result) {
     //   alert("You clicked 'Yes'!");
        <?php $_SESSION['PageStatus']= "";  ?>
        return true;
      
      } else {
       // alert("You clicked 'No'!");
        return false;
      }
    }
</script>



    <!-- Page Header Start -->
<style type="text/css">
    .hidden{  
        opacity : 0%;
        width: 50;


} 
</style>


    <form method="POST"  style="position: absolute;">
        <input type="text" class="hidden" id="RFID" name="txtRFID" placeholder="Focus here to scan " required>
        <input type="checkbox"  id="checkboxdata" name="checkboxdata" placeholder="Focus here to scan "> enable this if you have RFID card to fetch existing data
         <button hidden  style="background: crimson;border: revert;"  name="btnRFID" id="btnRFID" type="submit">Submit</button>
    </form>
<script type="text/javascript">
 
var warning = 0;
function FFocus(){

   // document.getElementById("RFID").focus();

    if(document.getElementById("checkboxdata").checked == true){
    document.getElementById("RFID").focus();
   
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
    <!-- Page Header End -->
<body onclick="FFocus()">
   <form method="POST" action="RequestForm-PUP-FN.php" enctype="multipart/form-data" >
    <!-- About Start -->
    <div class="container-fluid bg-secondary p-0">
        <div class="row g-0">
         
            <div class="col-lg-6 py-6 px-5">
                <h1 class="display-5 mb-4">Request Form</h1>
                
                    <div class="row g-3">

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="STID" name="txtSTID" value="<?php echo "$varStdID"; ?>" placeholder="ID number"required>
                                <label for="form-floating-3">Please Enter Your Student Number</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="Fname" placeholder="First Name" value="<?php echo "$varFname"; ?>" name="txtFname" required> 
                                <label for="form-floating-1">First Name</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text"  class="form-control" id="Lname" name="txtLname" value="<?php echo "$varLname"; ?>" placeholder=""required>
                                <label for="form-floating-1">Last Name</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="Mname" value="<?php echo "$varMname"; ?>" name="txtMname" placeholder=""required>
                                <label for="form-floating-1">Middle Name</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="PYear_Section" name="txtPYear_Section"  placeholder="Program Year Section"required>
                                <label for="PYear_Section">Program Year and Section</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input required type="email" class="form-control" id="EmailAdd" name="txtEmailAdd" value="<?php echo "$varEmailAdd"; ?>" placeholder="name@domain.com">
                                <label for="EmailAdd">Email address</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input required type="text" class="form-control" id="AcademicYear" name="txtAcademicYear" placeholder="A/Y">
                                <label for="AcademicYear">Academic Year</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="tel" onkeyup="addDash(this)"  class="form-control" id="Contact" value="<?php echo "$varContact"; ?>" name="txtContact" placeholder="ID number" pattern="[0-9]{4}-[0-9]{4}-[0-9]{3}" maxlength="13"required>
                                <label for="Contact">Contact Number</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form" >                        
                                <label for="Semeter"  class="form-control" style="text-align: right;background-color: #ffffff;">Please Select Semeter:</label>
                                   
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form">                        
                                <select class="form-control"  name="txtSemeter" id="Semeter"required>
                                        <option value="">None</option>
                                        <option value="First">First</option>
                                        <option value="Second">Second</option>
                                        <option value="Summer">Summer</option>
                                </select>
                                   
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form" >                        
                                <label for="TypeOfPayment"  class="form-control" style="text-align: right;background-color: #ffffff;">Type Of Payment:</label>
                                   
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form">                        
                                <select class="form-control"  name="txtTypeOfPayment" id="TypeOfPayment"required>
                                        <option value="">None</option>
                                        <option style="background-color: darkred; color: white; font-style: oblique;" value="OnlineBanking" disabled>OnlineBanking (Unavailable)</option>
                                        <option style="background-color: darkred; color: white; font-style: oblique" value="E-wallet" disabled>E-wallet (Unavailable)</option>
                                        <option value="Over-the-counter">Over-the-counter</option>
                                </select>
                                   
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form" >                        
                                <label for="DayRequest"  class="form-control" style="text-align: right;background-color: #ffffff;">Please Input Date of Request:</label>
                                   
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form">                        
                               
                                    
                                <input required class="form-control" type="date" id="DayRequest" name="txtDayRequest" />    


                            </div>
                        </div>


                         <div class="col-6">
                            <div class="form" >                        
                                <label for="txtReason"  class="form-control" style="text-align: right;background-color: #ffffff;">Please Input Reason:</label>
                                   
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form">                        
                               
                                    
                                <input required class="form-control" type="text" id="txtReason" name="txtReason" />    


                            </div>
                        </div>

                    </div>
                
            </div>


            <div class="col-lg-6 py-6 px-5"> 

                <div class="h-100 d-flex flex-column justify-content-center  p-5" >
<div hidden>
                <p>
                    <input type="checkbox" id="Diploma" name="txtDocumentReq[]" value="Diploma">
                     &nbsp; Diploma  &nbsp; <?php echo "($P_Diploma Php)"; ?>
                </p>
               

                <p>
                    <input type="checkbox" id="TOR_NEG" name="txtDocumentReq[]" value="TOR_NEG">
                     &nbsp; Transcript of Record - Non-Engineering Graduate &nbsp; <?php echo "($P_TOR_NEG Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="TOR_EG" name="txtDocumentReq[]" value="TOR_EG">
                     &nbsp; Transcript of Record - Engineering Graduate  &nbsp; <?php echo "($P_TOR_EG Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="TOR_PNGAC" name="txtDocumentReq[]" value="TOR_PNGAC">
                     &nbsp; Transcript of Record - per Page Non-Graduate - All Courses  &nbsp; <?php echo "($P_TOR_PNGAC Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="Scanpic_NGAC" name="txtDocumentReq[]" value="Scanpic_NGAC">
                     &nbsp; Scanned Picture Non-Graduate - All Courses  &nbsp; <?php echo "($P_Scanpic_NGAC Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="COG" name="txtDocumentReq[]" value="COG">
                     &nbsp; Certificate of Graduation &nbsp; <?php echo "($P_COG Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="HonorableDismisal" name="txtDocumentReq[]" value="HonorableDismisal">
                     &nbsp; Honorable Dismissal &nbsp; <?php echo "($P_HonorableDismisal Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="C_UE" name="txtDocumentReq[]" value="C_UE">
                     &nbsp; Certificate of Units Earned &nbsp; <?php echo "($P_C_UE Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="C_NID" name="txtDocumentReq[]" value="C_NID">
                     &nbsp; Certificate of NO ID &nbsp; <?php echo "($P_C_NID Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="COF" name="txtDocumentReq[]" value="COF">
                     &nbsp; Copy of Grades &nbsp; <?php echo "($P_COF Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="C_GWA" name="txtDocumentReq[]" value="C_GWA">
                     &nbsp; Certificate of General Weighted Average &nbsp; <?php echo "($P_C_GWA Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="C_NSTPSN" name="txtDocumentReq[]" value="C_NSTPSN">
                     &nbsp; Certificate of NSTP Serial Number &nbsp; <?php echo "($P_C_NSTPSN Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="C_SD" name="txtDocumentReq[]" value="C_SD">
                     &nbsp; Certificate of Subject Description &nbsp; <?php echo "($P_C_SD Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="C_EorTF" name="txtDocumentReq[]" value="C_EorTF">
                     &nbsp; Certificate of Enrollment or Tuition Fee &nbsp; <?php echo "($P_C_EorTF Php)"; ?>
                </p>

                <p>
                    <input type="checkbox" id="C_Registration" name="txtDocumentReq[]" value="C_Registration">
                     &nbsp; Certificate of Registration &nbsp; <?php echo "($P_C_Registration Php)"; ?>
                </p>

                 <p>
                    <input type="checkbox" id="C_GM" name="txtDocumentReq[]" value="C_GM">
                     &nbsp; Certificate of Good Moral &nbsp; <?php echo "($P_C_GM Php)"; ?>
                </p>
</div>
                <?php
/*
            $P_Diploma = 200;
            $P_TOR_NEG = 350;
            $P_TOR_EG = 450;
            $P_TOR_PNGAC = 100;
            $P_Scanpic_NGAC = 50;
            $P_COG = 106;
            $P_HonorableDismisal = 150;
            $P_C_UE = 108;
            $P_C_NID = 150;
            $P_COF = 150;
            $P_C_GWA = 100;
            $P_C_NSTPSN = 100;
            $P_C_SD = 150;
            $P_C_EorTF = 150;
            $P_C_Registration = 150;
            $P_C_GM = 150;

P_Diploma
P_TOR_NEG
P_TOR_EG
P_TOR_PNGAC
P_Scanpic_NGAC
P_COG
P_HonorableDismisal
P_C_UE
P_C_NID
P_COF
P_C_GWA
P_C_NSTPSN
P_C_SD
P_C_EorTF
P_C_Registration
P_C_GM

INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_Diploma', 'Diploma', '200', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_TOR_NEG', 'Transcript of Record - Non-Engineering Graduate', '350', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_TOR_EG', 'Transcript of Record - Engineering Graduate', '450', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_TOR_PNGAC', 'Transcript of Record - per Page Non-Graduate - All Courses', '100', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_Scanpic_NGAC', 'Scanned Picture Non-Graduate - All Courses', '50', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_COG', 'Certificate of Graduation', '106', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_HonorableDismisal', 'Honorable Dismissal', '150', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_C_UE', 'Certificate of Units Earned', '108', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_C_NID', 'Certificate of NO ID', '150', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_COF', 'Copy of Grades', '150', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_C_GWA', 'Certificate of General Weighted Average', '100', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_C_NSTPSN', 'Certificate of NSTP Serial Number', '100', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_C_SD', 'Certificate of Subject Description', '150', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_C_EorTF', 'Certificate of Enrollment or Tuition Fee', '150', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_C_Registration', 'Certificate of Registration', '150', 'request', current_timestamp());
INSERT INTO `itemprice` (`id`, `ItemCode`, `ItemName`, `Price`, `status`, `DateCreated`) VALUES (NULL, 'P_C_GM', 'Certificate of Good Moral', '150', 'request', current_timestamp());



*/
                   // $val_Diploma = "INSERT INTO `your_table_name`(`column_name`) VALUES ('Diploma(200php)')";
        $val_InvoiceNumber = $_SESSION['S_InvoiceNumber'];  
        $val_StdID = $_SESSION['S_StdID'];   
            
$val_Diploma = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES 
('$val_InvoiceNumber','$val_StdID','Diploma','Diploma','$P_Diploma','request ')";
            //   alert($val_Diploma);
$val_TOR_NEG = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'TOR_NEG', 'Transcript of Record - Non-Engineering Graduate', '$P_TOR_NEG', 'request')";

$val_TOR_EG = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'TOR_EG', 'Transcript of Record - Engineering Graduate', '$P_TOR_EG', 'request')";

$val_TOR_PNGAC = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'TOR_PNGAC', 'Transcript of Record - per Page Non-Graduate - All Courses', '$P_TOR_PNGAC', 'request')";

$val_Scanpic_NGAC ="INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'Scanpic_NGAC', 'Scanned Picture Non-Graduate - All Courses', '$P_Scanpic_NGAC', 'request')";

$val_COG = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'COG', 'Certificate of Graduation', '$P_COG', 'request')";

$val_HonorableDismisal = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'HonorableDismisal', 'Honorable Dismissal', '$P_HonorableDismisal', 'request')";

$val_C_UE = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'C_UE', 'Certificate of Units Earned', '$P_C_UE', 'request')";

$val_C_NID = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'C_NID', 'Certificate of NO ID', '$P_C_NID', 'request')";

$val_COF = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'COF', 'Copy of Grades', '$P_COF', 'request')";

$val_C_GWA = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'C_GWA', 'Certificate of General Weighted Average', '$P_C_GWA', 'request')";

$val_C_NSTPSN = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'C_NSTPSN', 'Certificate of NSTP Serial Number', '$P_C_NSTPSN', 'request')";

$val_C_SD = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'C_SD', 'Certificate of Subject Description', '$P_C_SD', 'request')";

$val_C_EorTF = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'C_EorTF', 'Certificate of Enrollment or Tuition Fee', '$P_C_EorTF', 'request')";

$val_C_Registration = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'C_Registration', 'Certificate of Registration', '$P_C_Registration', 'request')";

$val_C_GM = "INSERT INTO `itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) VALUES
('$val_InvoiceNumber', '$val_StdID', 'C_GM', 'Certificate of Good Moral', '$P_C_GM', 'request')";


                ?>

                       
        <div class="col-12">
<?php
            
             // Fetch data from the database
    $sql = "SELECT * FROM `itemlist` WHERE invoice = '$val_InvoiceNumber' And StdID = '$val_StdID' And status = 'request'";
    $result = $conn->query($sql);
    $xh = "hidden";

    if ($result->num_rows > 0) {
        echo "<table style='color: black;'>";
        echo "<tr><th $xh>ItemName</th><th $xh>invoice</th><th $xh>StdID</th><th $xh>Item Code</th><th>Item Name</th><th>Price</th><th $xh>status</th><th>Action</th></tr>";
        $SumPrice = 0;
        while ($row = $result->fetch_assoc()) {
           
         
          

                $tb_id = $row['id'];
                $tb_invoice = $row['invoice'];
                $tb_StdID = $row['StdID'];
                $tb_ItemCode = $row['ItemCode'];
                $tb_ItemName = $row['ItemName'];
                $tb_Price = $row['Price'];
                $tb_status = $row['status'];

                $SumPrice = $tb_Price + $SumPrice ;

          //  echo  '---', $id2 ,'---';

            echo "<tr>";
            echo "<td $xh>$tb_id</td>";
            echo "<td $xh>$tb_invoice</td>";
            echo "<td $xh>$tb_StdID</td>";
            echo "<td $xh>$tb_ItemCode</td>";
            echo "<td>$tb_ItemName</td>";
            echo "<td>$tb_Price</td>";
            echo "<td $xh>$tb_status</td>";
            echo "<td> <button onclick='openModalDelete($tb_id, \"$tb_ItemName\")'>Remove</button> 
            <button hidden onclick='window.print();'>Print</button>
            </td>";

            echo "</tr>";

        }
        $_SESSION['SumPrice'] = $SumPrice;
        echo "</table>";
         echo "<h2 style='text-align-last: center; background: white;' >Total Price : "."$SumPrice"." Php</h2>";
        echo '<div style="text-align-last: center;"><button  style="    font-size: x-large;"  class="button-link" onclick="openModalAdd()" type="button"> SELECT     DOCUMENT     ITEM </button></div>';
    } else {
        //echo ". Please Select Item";
        echo '<div style="text-align-last: center; font-size: x-large;"><button  class="button-link" onclick="openModalAdd()" type="button"> SELECT     DOCUMENT     ITEM </button></div>';
    }

    // Close the database connection
    $conn->close();
    // // end Fetch data from the database -----------------------------

?>
        </div>

        <!-- <div class="col-12" >
                            <button  style="color: black; background-color: yellow; background: crimson;border: revert;" class="btn btn-primary w-100 py-3" onclick='openModalAdd()' type="button">S E L E C T     D O C U M E N T     I T E M </button>
            </div> -->

            <div class="col-12" >
                            <button  style="background: crimson;border: revert; font-size: x-large;" class="btn btn-primary w-100 py-3" name="btnSubmit" type="submit">Submit</button>
            </div>
                </div>

            </div>

        </div>
                      
            </div>

     </form>

    <!-- About End -->



    <!-- Footer Start --> 
    
    
    <div class="container-fluid bg-dark text-secondary text-center border-top py-4 px-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="m-0">&copy; <a class="text-secondary border-bottom" href="#">Payment Management System</a>. All Rights Reserved 2023</p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>



<div id="addModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close1">&times;</span>
            <form action="" method="POST">
                <input type="hidden" id="update_id" name="update_id" value="">
                <label for="new_data"></label>
                <!-- <input required type="text" id="new_data" name="new_data" value=""> -->

                <select class="form-control"  name="new_data" id="new_data"required>
<option value="">Please Select Item</option>
<option value="<?php echo $val_Diploma; ?>">Diploma (350 Php)</option>
<option value="<?php echo $val_TOR_NEG; ?>">Transcript of Record - Non-Engineering Graduate   (350 Php)</option>
<option value="<?php echo $val_TOR_EG; ?>">Transcript of Record - Engineering Graduate  (450 Php)</option>
<option value="<?php echo $val_TOR_PNGAC; ?>">Transcript of Record - per Page Non-Graduate - All Courses (100 Php)</option>
<option value="<?php echo $val_Scanpic_NGAC; ?>">Scanned Picture Non-Graduate - All Courses (50 Php)</option>
<option value="<?php echo $val_COG; ?>">Certificate of Graduation (106 Php)</option>
<option value="<?php echo $val_HonorableDismisal; ?>">Honorable Dismissal (150 Php)</option>
<option value="<?php echo $val_C_UE; ?>">Certificate of Units Earned (108 Php)</option>
<option value="<?php echo $val_C_NID; ?>">Certificate of NO ID (150 Php)</option>
<option value="<?php echo $val_COF; ?>">Copy of Grades   (150 Php)</option>
<option value="<?php echo $val_C_GWA; ?>">Certificate of General Weighted Average (100 Php)</option>
<option value="<?php echo $val_C_NSTPSN; ?>">Certificate of NSTP Serial Number (100 Php)</option>
<option value="<?php echo $val_C_SD; ?>">Certificate of Subject Description (150 Php)</option>
<option value="<?php echo $val_C_EorTF; ?>">Certificate of Enrollment or Tuition Fee (150 Php)</option>
<option value="<?php echo $val_C_Registration; ?>">Certificate of Registration (150 Php)</option>
<option value="<?php echo $val_C_GM; ?>">Certificate of Good Moral (150 Php)</option>

                </select>

                <input style="color: whitesmoke; background-color: blue; background: crimson;border: revert;" class="btn btn-primary w-100 py-3" type="submit" name="add" value=" A D D   I T E M ">
               
            </form>
        </div>
    </div>




<script>
        // Get the modal element adddddd
        var modal1 = document.getElementById("addModal");

        // Get the close button element
        var closeBtn1 = document.getElementsByClassName("close1")[0];

        // Function to open the modal and populate the form fields
        function openModalAdd() {
            modal1.style.display = "block";
     
        }

        // Function to close the modal
        closeBtn1.onclick = function() {
            modal1.style.display = "none";
        }

        // Function to close the modal when clicking outside of it
       /* window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }*/
</script>


<div id="deleteModal" class="modal2">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close2">&times;</span>
            <form action="" method="POST">
                <input hidden  type="text" id="update_id2" name="update_id" value="">
                <label for="new_data">Delete Data:</label><br>
                <input readonly class="form-control"  type="text" id="new_data2" name="new_data" value="">
                <input style="color: yellow; background-color: blue; background: crimson;border: revert;" class="btn btn-primary w-100 py-3" type="submit" name="delete" value=" D E L E T E ">
            </form>
        </div>
</div>

 <script>
        // Get the modal element delete
        var modal2 = document.getElementById("deleteModal");

        // Get the close button element
        var closeBtn2 = document.getElementsByClassName("close2")[0];

        // Function to open the modal and populate the form fields
       function openModalDelete(id2, data2) {
          //  alert(id2 +"["+ data2 + "]");
            modal2.style.display = "block";
            document.getElementById("update_id2").value =  id2;
            document.getElementById("new_data2").value = data2;
    
        }

        // Function to close the modal
        closeBtn2.onclick = function() {
            modal2.style.display = "none";
        }

        // Function to close the modal when clicking outside of it
       /* window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }*/
    </script>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>