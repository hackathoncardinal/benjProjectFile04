<?php
require_once("config.php"); 
require_once("DeleteTempDoc.php"); 
$bb = strtotime('+6 hour'); //add 6hr in time
$InvoiceNumber = date("Yms",$bb);


$queryDefault = "SELECT * FROM `pending_request` WHERE status='pending'";
$result = $dbc->query($queryDefault);


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


if(isset($_POST['btnSearch'])){ //seleted

 $Search_Invoice =  $_POST['txtSearch'];

$querySelected = "SELECT * FROM `pending_request` WHERE Invoice_Number='$Search_Invoice'";
$queryItemlist = "SELECT * FROM `itemlist` WHERE invoice='$Search_Invoice'";

$resultSelected = $dbc->query($querySelected);
$resultItemList = $dbc->query($queryItemlist);





echo $querySelected , "<br>";
echo $queryItemlist , "<br>";
}         


if(isset($_POST['btnSearch2'])){

 $Search_Invoice2 =  $_POST['txtSearch2'];

$queryDefault = "SELECT * FROM `pending_request` WHERE status='pending' And Invoice_Number Like '%$Search_Invoice2%'";
$result = $dbc->query($queryDefault);

}//end btnSearch2 







if (isset($_POST['txtApproved'])) { //pending
    // code...

    $Invoice = $_POST['txtModalInvoice'];
    $RequestedBy = $_POST['txtRequestedBy'];

//update itemlist ------------------

        $sql = "UPDATE `itemlist` SET `status`='pending' WHERE `invoice`='$Invoice' AND `StdID`='$RequestedBy'";
        if ($dbc->query($sql) === TRUE) {
          //  echo "Itemlist Record Update successfully.";
            
        } else {
            
           echo "Error Update record: " . $dbc->error;
           goto myLabel;

        }
//update itemlist ------------------ 

//update pending_request ------------------

        $sql1 = "UPDATE `pending_request` SET `status`='pending' WHERE `Invoice_Number`='$Invoice' AND `RequestedBy`='$RequestedBy'";
        if ($dbc->query($sql1) === TRUE) {
          //  echo "pending_request Record Update successfully.";
        header("location: PMS.php?Approval=Updated");

        } else {
            
            echo "Error Update record: " . $dbc->error;
           

        }        
//update pending_request ------------------ 
myLabel:


}// end approved



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Payment Management System</title>
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

<style>
    
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

        .close {
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

<?php
    
    $FullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(strpos($FullUrl,"Payment=Success")){
                            echo '<script type="text/javascript"> alert("Payment Success"); </script>';
                        }elseif(strpos($FullUrl,"RequestForm=YouHavePendingRequestInProgress")){
                            $_SESSION['PageStatus']= "";
                            echo '<script type="text/javascript"> alert("You Already have a Ongoing  Request"); </script>';
                        } 

?>


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
                       <a <?php echo $_SESSION['AdminDashboard']; ?> href="PMS.php" class="dropdown-item active">P M S</a> 
                        <a <?php echo $_SESSION['ListingPage']; ?> href="ListingPage.php" class="dropdown-item">My Listing</a> 
                        <a <?php echo $_SESSION['AdminDashboard']; ?> href="Admin-Dashboard.php" class="dropdown-item">Print Report</a>                    
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
       
<div class="col-12">
                      
<div style="text-align: center;">
    <button style="color: whitesmoke; background-color: blue; background:gray ; " class="btn  w-60 py-2" type="button" onclick="ForApproval()" > For Approval Request </button>
    <button style=" color: whitesmoke; background-color: blue; background:crimson ;      text-decoration: underline;" class="btn  w-60 py-2" type="button" onclick="ForPayment()" > For Payments </button>
</div>
                            
</div>


    
     <br>
 
<div hidden ><form method="POST" action="PMS-Payment-Sub.php" ><!---PMS-Payment-Sub.php-->

                        <input required type="text" name="txtSearch" id="txtSearch" style="width: 45%;" maxlength="22" placeholder="Please Enter Data">
                         <input required type="text" name="txtStdID" id="txtStdID" style="width: 45%;" maxlength="22" placeholder="Please Enter ID">
                        <button  name="btnSearch" id="btnSearch" type="submit" class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
</div></form>

   <hr> 



<div class="col-12" style="text-align: -webkit-center;">
  
<div style="width:95%; text-align-last: center;">


 

    <br>

<hr>
<div ><form method="POST" >

                        <input required type="text" name="txtSearch2" id="txtSearch2" style="width: 45%;" maxlength="22" placeholder="Please Enter Invoice number">
                        <button  name="btnSearch2" id="btnSearch2" type="submit" class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
</div></form>

    <?php
//$queryDefault = "SELECT * FROM `pending_request` WHERE status='requested'";
    $xh = "hidden";

        if ($result->num_rows > 0) {
        echo "<table style='color: black;'>";
        echo "<tr><th>invoice</th><th>RequestedBy</th><th>Date Of Request</th><th>Price</th><th>status</th><th>Action</th></tr>";
        $SumPrice = 0;
        while ($row = $result->fetch_assoc()) {                       
             
                $tb_invoice = $row['Invoice_Number'];
                $RequestedBy = $row['RequestedBy']; 
                $DateOfRequest = $row['DateOfRequest'];             
                $tb_Price = $row['TotalPrice'];
                $tb_status = $row['Status'];

                $dateReq = strtotime($DateOfRequest);
                $dateDisplay = date('D',$dateReq);
          

          //  echo  '---', $id2 ,'---';

            echo "<tr>";
       
            echo "<td >$tb_invoice</td>";
            echo "<td >$RequestedBy</td>";   
            echo "<td >$DateOfRequest [$dateDisplay]</td>";      
            echo "<td>$tb_Price</td>";
            echo "<td >$tb_status</td>";
            echo "<td > <button hidden onclick='OpenModal($tb_invoice, \"$RequestedBy\", \"$tb_Price\")'>Process</button>

                        <button onclick='SelectedData($tb_invoice, \"$RequestedBy\")'>Select</button>
                        
            
            </td>";

            echo "</tr>";

        }
 
        echo "</table>";
        /* echo "<h2 style='text-align-last: center; background: aqua; width: 50%;margin-left: auto; ' >Total Price : Php</h2>";
        echo '<form method="POST" onsubmit="return CancalRequest()"> <button name="deleteData"  style="color: yellow; background-color: blue; background: crimson;border: revert;" class="btn btn-primary w-100 py-3"  type="submit"> ---- Cancel --- Request ----</button></form>';*/
    } else {
        echo "No Data Found";
       
    }

    // Close the database connection
   // $dbc->close();
    // // end Fetch data from the database -----------------------------


    ?>
</div>
</div>

     <br>
    </div>
    <!-- Carousel End -->


<script>
    function ForApproval() {
      window.location.href = "PMS.php";
    }
     function ForPayment() {
      window.location.href = "PMS-Payment.php";
    }

    function SelectedData(tb_invoice, RequestedBy){
        //var username = sessionStorage.getItem('username');   to fecth the value

        sessionStorage.setItem('SS_invoice', tb_invoice);
        sessionStorage.setItem('SS_RequestedBy', RequestedBy);

        document.getElementById("txtSearch").value = tb_invoice;
        document.getElementById("txtStdID").value = RequestedBy;

        var button = document.getElementById('btnSearch');
        button.click();


    }

</script>








<div id="OpenModal" class="modal2">
        <!-- Modal content -->
        <div class="modal2-content">
            <span id="close2" class="close2">&times;</span>
            <form action="" method="POST">
                <input   readonly type="text" id="update_id2" name="txtModalInvoice" value="">
                <label for="new_data">Update Data:</label><br>
                <input readonly class="form-control"  type="text" id="new_data2" name="txtRequestedBy" value="">

                <input style="color: yellow; background-color: blue; background: crimson;border: revert;" class="btn btn-primary w-100 py-3" type="submit" name="txtApproved" value="- - - - -< Approved >- - - - -">
            </form>
        </div>
</div>


<div id="DeclineModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span id="close" class="close">&times;</span>
            <form action="" method="POST">
                <input  readonly type="text" id="update_id" name="txtModalInvoice2" value="">
                <label for="new_data">Decline Data:</label><br>
                <input readonly class="form-control"  type="text" id="new_data" name="txtRequestedBy2" value="">
                <input style="color: yellow; background-color: blue; background: crimson;border: revert;" class="btn btn-primary w-100 py-3" type="submit" name="txtDeclined" value="- - - - -< Decline >- - - - -">
            </form>
        </div>
</div>


<script>
        // Get the modal element delete
        var modal2 = document.getElementById("OpenModal");

        // Get the close button element
        var closeBtn2 = document.getElementById("close2");

        // Function to open the modal and populate the form fields
       function OpenModal(id2, data2) {
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






<script>

        // Get the modal element delete
        var modal = document.getElementById("DeclineModal");

        // Get the close button element
        var closeBtn = document.getElementById("close");

        // Function to open the modal and populate the form fields
       function DeclineModal(id2, data2) {
          //  alert(id2 +"["+ data2 + "]");
            modal.style.display = "block";
            document.getElementById("update_id").value =  id2;
            document.getElementById("new_data").value = data2;
    
        }

        // Function to close the modal
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        // Function to close the modal when clicking outside of it
       /* window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }*/
    </script>





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