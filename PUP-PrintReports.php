<?php

require_once("config.php"); 

function alert($msg) {
        echo "<script type='text/javascript'>
            alert('$msg');
            </script>";
}


if(isset($_POST['btnPrintReports'])){
$d = strtotime('+6 hour'); //add 6hr in time
$Invoice_Number = date("YmdHis",$d);
$varRequest_date =  date("Y-m-d H:i:s",$d);
$sum =0;
$status = "process";

$StartDate = $_POST['Start_date'];
$EndDate = $_POST['End_date'];

$QuerySearch = mysqli_query($dbc,"SELECT * FROM `tb_process` WHERE (Status='$status') AND (DateOfProcess BETWEEN '$StartDate' and '$EndDate' )");

    if(mysqli_num_rows($QuerySearch) > 0){
 alert("Data Found Sending data to Printer");

        // print data to Printer
    

$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
$file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
$handle = fopen($file, 'w');
$condensed = Chr(27) . Chr(33) . Chr(4);
$bold1 = Chr(27) . Chr(69);
$bold0 = Chr(27) . Chr(70);
$initialized = chr(27).chr(64);
$condensed1 = chr(15);
$condensed0 = chr(18);
$Data  = $initialized;
$Data .= $condensed1;
$Data .= "================================\n";
$Data .= "     ".$bold1." Polytechnic University".$bold0."  \n";
$Data .= "     ".$bold1."   of the Philippines".$bold0."  \n";
$Data .= "     ".$bold1."    Parañaque Campus".$bold0."  \n";
$Data .= "================================\n";
$Data .= "Created At:".$varRequest_date."\n";
$Data .= "Sales\n";
$Data .= "_____________________________\n";
while($res = mysqli_fetch_array($QuerySearch)){
       $TN = $res['Transaction_Num'];
       $TP= $res['TotalPrice'];
        $Data .= "TN: $TN\n";
        $Data .= "\t$TP Php\n"; 
        $sum += $TP;
         $Data .= "--------------------------------\n"; 
        }
$Data .= "Total Sales : $sum Php.\n";
$Data .= "Thank you for using payment management system.\n";
$Data .= "--------------------------\n\n";
fwrite($handle, $Data);
fclose($handle);
copy($file, "//localhost/xprinter");  # location ng network Printer
unlink($file);
//end Print

    }else{
                            alert("Data Not Found");
                            $QuerySearch = mysqli_query($dbc,"SELECT * FROM `tb_process` WHERE 0");
                        }



}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PUP-Print Reports</title>
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

<div>



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
                        <a <?php echo $_SESSION['ListingPage']; ?> href="ListingPage.php" class="dropdown-item">My Listing</a> 
                        <a <?php echo $_SESSION['AdminDashboard']; ?> href="Admin-Dashboard.php" class="dropdown-item">Dashboard</a>                    
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Registration.php" class="dropdown-item">RFID & Student <br> Registation</a>
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Update.php" class="dropdown-item">RFID & Student <br> Update</a>
                        <a <?php echo $_SESSION['PUP-ChangePassword']; ?>  href="PUP-ChangePassword.php" class="dropdown-item ">Change Password</a>
                        <a <?php echo $_SESSION['PUP-PrintReports']; ?> href="PUP-PrintReports.php" class="dropdown-item active">Print Reports</a>                                    
                        <a href="index.php?Login=Logout" onclick="return Logout();"  class="dropdown-item">[ <?php echo $_SESSION['S_username']; ?> ] Logout</a>
                    </div>
                </div>
                <a href="#" class="nav-item nav-link" style="opacity: 0;"> ---- </a> 
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


   


    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <!-- Blog list Start -->
            <div class="col-lg-8">
                <div class="row g-5">
               
                    <div class="col-xl-12 col-lg-12 col-md-6" style="height: 20px;">      <!-- starart-->
                        <div class="blog-item">
    <!-- Search Form Start -->
  
    <!-- Search Form End -->
    </div>
                    </div> <!-- End-->
<div class="col-xl-12 col-lg-12 col-md-6">      <!-- starart-->
                        <div class="blog-item">
    <!-- DIV Form Start -->          
 

        <form method="POST" enctype="multipart/form-data" >  
<div style="text-align: -webkit-center;">
    <!-- <label >Please Enter Range</label> -->

<div class="col-6">
    <label >Please Enter Range</label>
                            <div class="form-floating">
                                <input type="date" class="form-control" id="Start_date" value="<?= date('Y-m-d') ?>" name="Start_date" placeholder="ID number"required>
                                <label for="form-floating-3">Please Enter Start Date</label>
                            </div>

</div>
<div class="col-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="End_date" value="<?= date('Y-m-d') ?>" name="End_date" placeholder="ID number"required>
                                <label for="form-floating-3">Please Enter End Date</label>
                            </div>
</div>
<!-- <label >Please Select command</label><br> -->
<button  type="submit" class= 
                                                    "btn btn-default" style="color: white;background: orange;" 
                                                    name="btnPrintReports"> 
                                                    Print Sales
</button>


           
    
            <button  type="button" class= 
            "btn btn-default" name="ppp" hidden onClick="window.print();"> 
            Print 
            </button>
            <button hidden  type="button" class= 
            "btn btn-default" name="ppp" onClick="btnExit()"> 
            Exit 
            </button>
    </div>
</form>


    <!-- DIV Form End -->
                        </div>
                    </div> <!-- End-->




                    
                </div> <!-- End row g-5-->
            </div>
            <!-- Blog list End -->

    <!-- Sidebar Start -->
            <div class="col-lg-4">
                

                <!-- Category Start -->
                <div class="mb-5">
                    <form method="POST" action="PUP-RequestFN.php"  onsubmit="return AmountCheck()">
                    <h2 class="mb-4">Print Reports</h2>
                   <!-- code Start -->

                   <h4 class="mb-4"></h4>

                
                   <!-- code End -->
</form>
                </div>
                <!-- Category End -->


               
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->





<script type="text/javascript">
    function AmountCheck() {
        // body...

        var  varTotalPrice = "<?php echo $res['TotalPrice']; ?>"
        var varTOP = "<?php echo $res['TypeOfPayment']; ?>"
        //echo 'Type of Payment: '.$res['TypeOfPayment'].'<br>';

        if(varTOP == "Gcash"){

            if(document.getElementById("GcashProcess").value <= varTotalPrice -1){
           
           alert("Please Enter a Valid Amount : ");
           return false;
            }else{
          
            //alert("PAss To GcashProcess");
            }

        }else{
            //else Start
              

            if(document.getElementById("OverTheCounterProcessProcess").value <= varTotalPrice -1){
           
           alert("Please Enter a Valid Amount : ");
           return false;
            }else{
          
            //alert("PAss To OverTheCounterProcessProcess");
            }



            // else End
        }

       



    }

    function ChangeValue(){
        var  varTotalPrice = "<?php echo $res['TotalPrice']; ?>"
        var dataValue = document.getElementById("GcashProcess").value;
       

    var numOne, numTwo, sum;
  numTwo = parseInt(varTotalPrice);
  numOne = parseInt(dataValue);
  sum = numOne - numTwo;
  //document.getElementById("ChangeAmount").value = sum;
  document.getElementById("ChangeAmount").innerHTML = "Change " + sum;
  //alert();
  // display the sum
console.log(`The sub of ${numOne} and ${numTwo} is ${sum}`);
    }

     function ChangeValue1(){
        var  varTotalPrice = "<?php echo $res['TotalPrice']; ?>"
        var dataValue = document.getElementById("OverTheCounterProcessProcess").value;
       

    var numOne, numTwo, sum;
  numTwo = parseInt(varTotalPrice);
  numOne = parseInt(dataValue);
  sum = numOne - numTwo;
  //document.getElementById("ChangeAmount").value = sum;
  document.getElementById("ChangeAmount").innerHTML = "Change " + sum;
  //alert();
  // display the sum
console.log(`The sub of ${numOne} and ${numTwo} is ${sum}`);
    }


</script>





 <!-- Footer Start --> 
    

    <div class="container-fluid bg-dark text-secondary text-center border-top py-4 px-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="m-0">&copy; <a class="text-secondary border-bottom" href="#">Payment Management System</a>. All Rights Reserved 20223</p>
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