<?php
require_once("config.php"); 
require_once("DeleteTempDoc.php"); 
$bb = strtotime('+6 hour'); //add 6hr in time
$InvoiceNumber = date("Ymhis",$bb);

//$temp_dir = sys_get_temp_dir();
//echo $temp_dir;
 
//echo $InvoiceNumber;
 //echo $_SESSION['PageStatus'];
$_SESSION['S_InvoiceNumber'] = $InvoiceNumber;

if($_SESSION['PageStatus'] === "Admin"){
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






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Listing</title>
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
    <a href="#" class="nav-link dropdown-toggle active " data-bs-toggle="dropdown"><?php echo $_SESSION['UserProfile']; ?></a>
<div class="dropdown-menu m-0">   
 <a <?php echo $_SESSION['ListingPage']; ?> href="ListingPage.php" class="dropdown-item active">My Listing</a>
 <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Registration.php" class="dropdown-item ">RFID Registation</a>
 <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Update.php" class="dropdown-item">RFID Update</a>
 <a <?php echo $_SESSION['Student']; ?> href="PUP-Student-Registration.php" class="dropdown-item ">Student Registation</a>
 <a <?php echo $_SESSION['Student']; ?> href="PUP-Student-Update.php" class="dropdown-item">Student Update</a>
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


<div hidden ><form method="POST" action="ListingPage-Sub.php" ><!---t-Sub.php-->

                        <input required type="text" name="txtSearch" id="txtSearch" style="width: 45%;" maxlength="22" placeholder="Please Enter Data">
                    
                        <button  name="btnSearch" id="btnSearch" type="submit" class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
</div></form>



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




<script>
     function CancalRequest() {
      var result1 = confirm("Do you want to Cancel Request?");
      
      if (result1) {
     //   alert("You clicked 'Yes'!");
      
        return true;
      
      } else {
       // alert("You clicked 'No'!");
        return false;
      }
    }


</script>



<script>
     function PrintRequest() {
      var result1 = confirm("Do you want to Print Request?");
      
      if (result1) {
     //   alert("You clicked 'Yes'!");
      
        return true;
      
      } else {
       // alert("You clicked 'No'!");
        return false;
      }
    }


</script>



    <!-- Carousel Start -->
    <div class="container-fluid p-0" style="width:95%">
<hr>
    
<?php

    $val_StdID = $_SESSION['S_StdID'];
    // Fetch data from the database
    $sql = "SELECT * FROM `itemlist` WHERE StdID = '$val_StdID' And (status='requested' Or status='pending')";
    $sqlPending = "SELECT * FROM `itemlist` WHERE StdID = '$val_StdID' And status = 'pending'";
    //$sql = "SELECT * FROM `itemlist` WHERE 1";
    
    $result1 = $dbc->query($sql);
    
    $xh = "hidden";

    if ($result1->num_rows > 0) {

        while($res = mysqli_fetch_array($result1))
            {
                $_SESSION['C_invoice'] = $res['invoice'];
                $_SESSION['C_status'] = $res['status'];
            }
    }else{
                $_SESSION['C_invoice'] = '---';
                $_SESSION['C_status'] = "----";
                echo $_SESSION['C_status'] ;
    }


    if($_SESSION['C_status'] === "pending"){
        //code here
         echo '<div><h2>Youre request has been approve</h2> invoice['.$_SESSION['C_invoice'].'] </div>';
         echo '<div><h6>Please Proceed to School Registar or Admin to Process the Documents</h6>  </div>';
         $result = $dbc->query($sqlPending);
    }elseif ($_SESSION['C_status'] === "requested") {
        // code...
        echo '<div><h2>For Approval Request Documents  invoice['.$_SESSION['C_invoice'].']</h2>  </div>';
        $result = $dbc->query($sql);
    }else{
        $result = $dbc->query("SELECT * FROM `itemlist` WHERE 0");
    }    

 
    if ($result->num_rows > 0) {
        echo "<table style='color: black;'>";
        echo "<tr><th $xh>ID</th><th $xh>invoice</th><th $xh>StdID</th><th $xh>Item Code</th><th>Item Name</th><th>Price</th><th $xh>status</th><th $xh>Action</th></tr>";
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
            echo "<td $xh> <button onclick='openModalDelete($tb_id, \"$tb_ItemName\")'>Remove</button> 
            
            </td>";

            echo "</tr>";

        }
        $_SESSION['SumPrice'] = $SumPrice;

        if($_SESSION['C_status'] == "pending"){
            $hidethis ="hidden";
            $hidethis1 ="";
        }else{
            $hidethis ="";
            $hidethis1 ="hidden";
        }


        echo "</table>";
         echo "<h2 style='text-align-last: center; background: #ffffff; width: 50%;margin-left: auto; ' >Total Price : "."$SumPrice"." Php</h2>";
        echo '<form method="POST" '.$hidethis.' onsubmit="return CancalRequest()"> <button  name="deleteData"  style="color: white; background-color: blue; background: crimson;border: revert;" class="btn btn-primary w-100 py-3"  type="submit"  >  Cancel  Request </button></form>';
        echo '<form method="POST" '.$hidethis1.' onsubmit="return PrintRequest()"> <button  name="deleteData"  style="color: white; background-color: blue; background: crimson;border: revert;" class="btn btn-primary w-100 py-3"  type="submit"  >  Print Invoice Number </button></form>';
    } else {
        //echo ". Please Select Item";
        echo '<button  style="color: white; background-color: blue; background: crimson;border: revert; color: yellow;" class="btn btn-primary w-100 py-3" type="button">  <a href="RequestForm-PUP.php">ADD   REQUEST  FORM  </a>    </button>';
    }

    // Close the database connection
   // $dbc->close();
    // // end Fetch data from the database -----------------------------





?>



<hr>
</div>


<div class="container-fluid p-0" style="width:45%">
    

 <?php

    $val_StdID = $_SESSION['S_StdID'];
    $sql2 = "SELECT * FROM `paid_request` WHERE RequestedBy = '$val_StdID' And status='paid'";
   
    //$sql = "SELECT * FROM `itemlist` WHERE 1";
    
    $result2 = $dbc->query($sql2);


    if ($result2->num_rows > 0) {
        echo "<h2>Transaction Paid</h2>";
        echo "<table style='color: black;'>";
        echo "<tr><th>Invoice_Number</th><th>TotalPrice</th><th>DatePaid</th><th>Action</th></tr>";
        while ($row = $result2->fetch_assoc()) {
            $tb_invoice = $row['Invoice_Number'];
            $tb_TotalPrice = $row['TotalPrice'];
            $tb_datepaid = $row['DateEncode'];


            echo "<tr>";
            echo "<td>$tb_invoice</td>";
            echo "<td>$tb_TotalPrice</td>";
            echo "<td>$tb_datepaid</td>";
            echo "<td><button onclick='SelectedData($tb_invoice)'>view</button></td>";
            //<button onclick='SelectedData($tb_invoice, \"$RequestedBy\")'>Select</button>
            echo "</tr>"; 

        }//end while
         echo "</table>";
    }else{

    }

    
 ?>   

</div>


    <!-- Carousel End -->

<?php
    
    if(isset($_POST['deleteData'])){
    //asdasssss---------
       // $dbc->open();
    $C_StdID = $_SESSION['S_StdID'];
    $C_invoice = $_SESSION['C_invoice'];

    $sql = "DELETE FROM `itemlist` WHERE StdID = '$C_StdID' And status = 'requested' ";
    $sql1 = "DELETE FROM `pending_request` WHERE RequestedBy = '$C_StdID' And status = 'requested'";

    //echo $sql;
    echo '<br>';
    //echo $sql1;

        if ($dbc->query($sql) === TRUE) {
          //  echo "Record Delete successfully.";

                      if ($dbc->query($sql1) === TRUE) {
                          //echo "Record Delete successfully.";
                     // header("location: ListingPage.php?ListingPage=DeleteSuccesFully1");

                      } else {
                      echo "Error Delete record: 1" . $dbc->error;
                      }
           

        } else {
            echo "Error Delete record: " . $dbc->error;
        }


        

}// end namedelete

?>



<script type="text/javascript">
       function SelectedData(tb_invoice){
        //var username = sessionStorage.getItem('username');   to fecth the value

        document.getElementById("txtSearch").value = tb_invoice;
      
        var button = document.getElementById('btnSearch');
        button.click();


    }
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