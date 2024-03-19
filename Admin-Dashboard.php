<?php
require_once("config.php"); 
require_once("DeleteTempDoc.php"); 
$bb = strtotime('+6 hour'); //add 6hr in time
$InvoiceNumber = date("Yms",$bb);
        $queryData12 = "SELECT * FROM `pending_request` WHERE 0";
        $result = $dbc->query($queryData12);
        $_SESSION['SeletedFilter'] =  "";
$_SESSION['Seletedtxt'] =  "";
/*$_SESSION['TempCombo']="-";
$_SESSION['SeletedFilter'] =  "-";
$_SESSION['Seletedtxt'] =  "-";*/
//echo $InvoiceNumber;
 //echo $_SESSION['PageStatus'];
$_SESSION['S_InvoiceNumber'] = $InvoiceNumber;

if($_SESSION['PageStatus'] === "Admin"){
    $_SESSION['AdminDashboard'] = "";
    $_SESSION['RequestForm'] = "hidden";
    $_SESSION['ListingPage'] = "hidden";
    $_SESSION['contact'] = "";  
    $_SESSION['Profile-more'] = "";
    $_SESSION['RFID'] = "";
    $_SESSION['Student'] = "";
    $_SESSION['UserProfile'] = "Admin";     
    $_SESSION['PUP-ChangePassword'] = "";
    $_SESSION['PUP-PrintReports'] = "";
}

if($_SESSION['PageStatus'] === "Student"){
    $_SESSION['AdminDashboard'] = "hidden";
    $_SESSION['RequestForm'] = "";
    $_SESSION['ListingPage'] = "";
    $_SESSION['contact'] = "hidden";
    $_SESSION['Profile-more'] = ""; 
    $_SESSION['RFID'] = "hidden";
    $_SESSION['Student'] = "hidden";
    $_SESSION['UserProfile'] = "Student";
    $_SESSION['PUP-ChangePassword'] = "hidden";
    $_SESSION['PUP-PrintReports'] = "hidden";
}


if(isset($_POST['btnSubmitdata'])){



    $varSearchType = $_POST['txtSearchType'];
    $TypeInArray = ['ForApprovalRequest', 'PendingRequest', 'AllPaidTransaction'];
    //echo $varSearchType;

    if($varSearchType == $TypeInArray[0]){      // Start code --- ForApprovalRequest ---
        $_SESSION['TempCombo'] = $TypeInArray[0];

        $queryData = "SELECT * FROM `pending_request` WHERE status ='requested'";
        $result = $dbc->query($queryData);
                                           // End Code  --- ForApprovalRequest ---        
    }elseif ($varSearchType == $TypeInArray[1]){// Start code --- PendingRequest ---
        $_SESSION['TempCombo'] = $TypeInArray[1];
        //pending
        $queryData = "SELECT * FROM `pending_request` WHERE status ='pending'";
        $result = $dbc->query($queryData);
                                                // End Code  --- PendingRequest ---        
    }elseif ($varSearchType == $TypeInArray[2]){// Start code --- AllPaidTransaction ---
        $_SESSION['TempCombo'] = $TypeInArray[2];
        $queryData = "SELECT * FROM `paid_request` WHERE status ='paid'";
        $result = $dbc->query($queryData);
                                                // End Code  --- AllPaidTransaction ---        
    }else{ 
$_SESSION['SeletedFilter'] =  "";
$_SESSION['Seletedtxt'] =  "";
    }


//echo $queryData;
}else{//end txtSearchType
        
}
    



if(isset($_POST['TB_btnSearch'])){

 $Searchtxt =  $_POST['TB_Search'];
 $SearchType =  $_POST['TB_SearchType'];
$_SESSION['SeletedFilter'] =   $SearchType;
$_SESSION['Seletedtxt'] =  $Searchtxt;
    if($_SESSION['TempCombo'] == "ForApprovalRequest"){
       // echo $_SESSION['TempCombo']."0";
    $queryFetchData = "SELECT * FROM `pending_request` WHERE status ='requested' And $SearchType LIKE '%$Searchtxt%'";
    }elseif ($_SESSION['TempCombo'] == "PendingRequest") {
      // echo $_SESSION['TempCombo']."1";
    $queryFetchData = "SELECT * FROM `pending_request` WHERE status ='pending' And $SearchType LIKE '%$Searchtxt%'";
    }elseif ($_SESSION['TempCombo'] == "AllPaidTransaction") {
      // echo $_SESSION['TempCombo']."2";
    $queryFetchData = "SELECT * FROM `paid_request` WHERE status ='paid' And $SearchType LIKE '%$Searchtxt%'";
    }else{

    }

    $result = $dbc->query($queryFetchData);
    //echo "------------>".$queryFetchData;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Print Report - Payment Management System</title>
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
</head>

<style>
    .printable {
      background-color: #fff;
      padding: 20px;
      margin: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;

    }

    .print-button {
      text-align: center;
      margin-top: 20px;
    }

    .print-button button {
      padding: 10px 20px;
      font-size: 16px;
    }
  </style>
<script>
    function printDiv($txtClassname) {
      var printContents = document.getElementById($txtClassname).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>

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
</style>



    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index1.php" class="navbar-brand p-0">
            <h1 class="m-0 text-uppercase text-primary" style=" font-size: 120%;  ">
                <img src="img/pup-logo.png" style="width: 15%; " alt="image">
                    Polytechnic University of the Philippines
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 me-n3">
                <a href="index1.php" class="nav-item nav-link ">Home</a>

                <a <?php echo $_SESSION['RequestForm']; ?> href="RequestForm-PUP.php" class="nav-item nav-link">Request Form</a>                                            
                <a <?php echo $_SESSION['contact']; ?> href="contact.php" class="nav-item nav-link">Contact</a>
                <a href="team.php" class="nav-item nav-link">Team</a> 
                <div <?php echo $_SESSION['Profile-more']; ?> class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><?php echo $_SESSION['UserProfile']; ?></a>
                    <div class="dropdown-menu m-0">   
                       <a <?php echo $_SESSION['AdminDashboard']; ?> href="PMS.php" class="dropdown-item">P M S</a> 
                       <a <?php echo $_SESSION['AdminDashboard']; ?> href="ItemPrice.php" class="dropdown-item ">Item Price</a> 
                        <a <?php echo $_SESSION['ListingPage']; ?> href="ListingPage.php" class="dropdown-item">My Listing</a> 
                        <a <?php echo $_SESSION['AdminDashboard']; ?> href="Admin-Dashboard.php" class="dropdown-item active">Print Report</a>                    
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Registration.php" class="dropdown-item">RFID & Student <br> Registation</a>
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Update.php" class="dropdown-item">RFID & Student <br> Update</a>
                        <a <?php echo $_SESSION['PUP-ChangePassword']; ?>  href="PUP-ChangePassword.php" class="dropdown-item ">Change Password</a>
                        <a <?php echo $_SESSION['PUP-PrintReports']; ?> href="PUP-PrintReports.php" class="dropdown-item">Print Reports</a>                                    
                        <a href="index.php?Login=Logout" onclick="return Logout();"  class="dropdown-item">[ <?php echo $_SESSION['S_username']; ?> ] Logout</a>
                    </div>
                </div>
                <a href="#" class="nav-item nav-link" style="opacity: 0;"> ---- </a> 
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<?php
/*

Home                    -index1.php
Request Form            -RequestForm-PUP.php
Login
Contact                 -contact.php
Team                    -team.php
RFID Registation        -PUP-RFID-Registration.php
RFID Update             -PUP-RFID-Update.php
Student Registation     -PUP-Student-Registration.php
Student Update          -PUP-Student-Update.php
Change Password         -PUP-ChangePassword.php
Print Reports           -PUP-PrintReports.php
Logout                  -index.php?Login=Logout

*/
?>

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


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <br>
        <form method="POST">
            <div class="col-6" style="margin-inline: auto; width: 20%;">
                            <div class="form">                        
                                <select class="form-control"  name="txtSearchType" id="SearchType"required>
                                        <option value="">Please Choose Filter</option>
                                        <option value="ForApprovalRequest">For Approval Request</option>
                                        <option value="PendingRequest">Pending Request</option>
                                        <option value="AllPaidTransaction">All Paid Transaction</option>
                                </select>                                   
                            </div>
                            <div style="text-align: center;"><button style="color: yellow; background-color: blue; background: crimson;border: revert; width: 60%; " name="btnSubmitdata" class="btn btn-primary w-60 py-2" type="submit"  > S u b m i t </button></div>
                            
            </div>
        </form>
<?php
if(isset($_POST['btnSubmitdata'])){
echo '<form method="POST">
    <br>
     <div style="    text-align-last: center;">
        <input required type="text" name="TB_Search" id="TB_Search" style="width: 45%;" maxlength="22" placeholder="Please Enter Data">
          <button  name="TB_btnSearch" id="TB_btnSearch" type="submit" class="btn-primary px-2"><i class="bi-search"></i></button>  
                <div>                        
                                <select   name="TB_SearchType" id="TB_SearchType"required>
                                        <option value="">Please Choose Filter</option>
                                        <option value="Invoice_Number">Invoice Number</option>
                                        <option value="StdID">Student ID</option>
                                        <option value="Fname">First name</option>
                                        <option value="Mname">Middle name</option>
                                        <option value="Lname">last name</option>
                                        <option value="Semester">Semester</option>
                                        <option value="RequestedBy">RequestedBy</option>
                                        <option value="ORNumber">ORNumber</option>
                                </select>                                   
                            </div>         
                        
     </div>
 </form>';
}else{
     
    $data6 = mysqli_num_rows($result);
    echo $data6;
    if ($result->num_rows > 0){
         echo '<form method="POST">
    <br>
     <div style="    text-align-last: center;">
        <input required type="text" name="TB_Search" id="TB_Search" style="width: 45%;" maxlength="22" placeholder="Please Enter Data">
        <button  name="TB_btnSearch" id="TB_btnSearch" type="submit" class="btn-primary px-4"><i class="bi-search"></i></button>  
                <div>                        
                                <select   name="TB_SearchType" id="TB_SearchType"required>
                                        <option value="">Please Choose Filter</option>
                                        <option value="Invoice_Number">Invoice Number</option>
                                        <option value="StdID">Student ID</option>
                                        <option value="Fname">First name</option>
                                        <option value="Mname">Middle name</option>
                                        <option value="Lname">last name</option>
                                        <option value="Semester">Semester</option>
                                        <option value="RequestedBy">RequestedBy</option>
                                        <option value="ORNumber">ORNumber</option>
                                </select>                                   
                            </div>         
                          
     </div>
 </form>';
    }else{
       
    }
}
?>



<div id="TBdata">

 <?php
 echo "<br>";
 echo "<h5>".$_SESSION['TempCombo']."     ".$_SESSION['SeletedFilter']."    ".$_SESSION['Seletedtxt']." </h5>";
        //$queryDefault = "SELECT * FROM `pending_request` WHERE status='requested'";
        if ($result->num_rows > 0) {
        echo "<table style='color: black;'>";
        echo "<tr><th>Invoice Number</th><th>Firstname</th><th>Requested By</th><th>Date Of Request</th><th>OR Number</th><th>Price</th><th>Status</th></tr>";
        $SumPrice = 0;
        while ($row = $result->fetch_assoc()) {                       
             
                $tb_invoice = $row['Invoice_Number'];
                $tb_Fname = $row['Fname'];
                $RequestedBy = $row['RequestedBy']; 
                $DateOfRequest = $row['DateOfRequest'];  
                $ORNumber = $row['ORNumber'];             
                $tb_Price = $row['TotalPrice'];
                $tb_status = $row['Status'];

                $DateOfRequest = strtotime($DateOfRequest);
                $DateOfRequest = date('Y-m-d',$DateOfRequest);

          //  echo  '---', $id2 ,'---';

            echo "<tr>";
            echo "<td >$tb_invoice</td>";
            echo "<td >$tb_Fname</td>";
            echo "<td >$RequestedBy</td>";
            echo "<td >$DateOfRequest</td>"; 
            echo "<td>$ORNumber</td>";      
            echo "<td>$tb_Price</td>";
            echo "<td>$tb_status</td>";
          
          

            echo "</tr>";

        }
 
        echo "</table>";
        /* echo "<h2 style='text-align-last: center; background: aqua; width: 50%;margin-left: auto; ' >Total Price : Php</h2>";
        echo '<form method="POST" onsubmit="return CancalRequest()"> <button name="deleteData"  style="color: yellow; background-color: blue; background: crimson;border: revert;" class="btn btn-primary w-100 py-3"  type="submit"> ---- Cancel --- Request ----</button></form>';*/
    } else {
        //echo ". Please Select Item"; 
    }
    
    // // end Fetch data from the database -----------------------------

    ?>






<br>
    </div>

    <!-- Carousel End -->
<div style="text-align: -webkit-center;" class="print-button">
    <button onclick="printDiv('TBdata')">Print</button>
  </div>
</div>

   <!-- Footer start -->
    <div class="container-fluid bg-dark text-secondary text-center border-top py-4 px-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="m-0">&copy; <a class="text-secondary border-bottom" href="#">Payment Management System</a>. All Rights Reserved. 2023</p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


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