<?php

require_once("config.php"); 
function alert($msg) {
        echo "<script type='text/javascript'>
            alert('$msg');
            </script>";
}

if(isset($_POST['btnUpdate'])){


if($ddddd == $xxx1 || $ddddd == $xxx2 ){

    $txtRFID = $_SESSION['txtRFID'];

    $txtusername = $_POST['txtUsername'];
    $txtpassword = $_POST['txtPassword'];

    $txtSTID = $_POST['txtSTID'];
    $txtFname = $_POST['txtFname'];
    $txtLname = $_POST['txtLname'];
    $txtMname = $_POST['txtMname'];
    $txtEmailAdd = $_POST['txtEmailAdd'];
    $txtContact = $_POST['txtContact'];
    $txtGender = $_POST['txtGender'];
}


    

    $CheckRFID = mysqli_query($dbc,"SELECT * FROM `studentuser` WHERE RFID ='$txtRFID'"); 
   
   $numRows =mysqli_num_rows($CheckRFID);
    if($numRows == 1){

          $QueryUpdate ="UPDATE `studentuser` SET `StdID`='$txtSTID', `username`='$txtusername',`password`='$txtpassword', `Fname`='$txtFname',`Mname`='$txtMname',`Lname`='$txtLname',`EmailAdd`='$txtEmailAdd',`Gender`='$txtGender',`Contact`='$txtContact' WHERE `RFID`='$txtRFID'"; 
   $result = mysqli_query($dbc,$QueryUpdate);
if($result){
     alert("RFID: [$txtRFID] Update succesfully ");
}else{
    alert("RFID: [$txtRFID] Update failed  System Error Please Contact System Administrator ");
}
    
        }else{
           alert("RFID: [$txtRFID] Update failed please Contact System Administrator "); 
        }

      
   


}//btn update





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PUP-RFID Update</title>
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


<script>
    function addDash (element) {        
        
        let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.
        
        let finalVal = ele.match(/.{1,4}/g).join('-');
        document.getElementById(element.id).value = finalVal;
        
        
    }
</script>
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
                <a href="index1.php" class="nav-item nav-link">Home</a>
                <a <?php echo $_SESSION['RequestForm']; ?> href="RequestForm-PUP.php" class="nav-item nav-link">Request Form</a>                                            
                <a <?php echo $_SESSION['contact']; ?> href="contact.php" class="nav-item nav-link">Contact</a>
                <a href="team.php" class="nav-item nav-link">Team</a> 
                <div <?php echo $_SESSION['Profile-more']; ?> class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><?php echo $_SESSION['UserProfile']; ?></a>
                    <div class="dropdown-menu m-0">                        
                        <a <?php echo $_SESSION['AdminDashboard']; ?> href="PMS.php" class="dropdown-item">P M S</a> 
                        <a <?php echo $_SESSION['AdminDashboard']; ?> href="ItemPrice.php" class="dropdown-item ">Item Price</a> 
                        <a <?php echo $_SESSION['ListingPage']; ?> href="ListingPage.php" class="dropdown-item">My Listing</a> 
                        <a <?php echo $_SESSION['AdminDashboard']; ?> href="Admin-Dashboard.php" class="dropdown-item">Print Report</a>                    
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Registration.php" class="dropdown-item">RFID & Student <br> Registation</a>
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Update.php" class="dropdown-item active">RFID & Student <br> Update</a>
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

   


    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <!-- Blog list Start -->
            <div class="col-lg-8">
                <div class="row g-5">
               
                    <div class="col-xl-12 col-lg-12 col-md-6" style="height: 20px;">      <!-- starart-->
                        <div class="blog-item">
    <!-- Search Form Start -->
    <h2 class="mb-4">RFID Update</h2>
    <!-- Search Form End -->
    </div>
                    </div> <!-- End-->
<div class="col-xl-12 col-lg-12 col-md-6">      <!-- starart-->
                        <div class="blog-item">
    <!-- DIV Form Start -->          
  <form method="POST" >
<div class="input-group">

                        <input required type="text" name="txtRFID" class="form-control p-3" pattern="[0-9]{10}"  maxlength="14" placeholder="Please Enter RFID number : xxxxxxxxxxxxxx">
                        <button  name="CheckRFID" type="submit" class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
    </div>
</form>


    <!-- DIV Form End -->
                        </div>

<?php

if(isset($_POST['CheckRFID'])){//CheckRFID

     $txtRFID = $_POST['txtRFID'];
    $_SESSION['txtRFID'] = $txtRFID;

// check rfid kung meron data sa database
   
     

   $CheckRFID = mysqli_query($dbc,"SELECT * FROM `studentuser` WHERE RFID ='$txtRFID'"); 
   
   $numRows =mysqli_num_rows($CheckRFID);
    if($numRows == 1){
        alert("RFID: [$txtRFID] data found ");
        while($res = mysqli_fetch_array($CheckRFID)){
          //  $_SESSION['userID'] = $res['IDnumber'];
                

                $varusername = $res['username'];
                $varpassword = $res['password'];
                $varUserType = $res['UserType'];


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
            alert("RFID: [$txtRFID] not found ");

                $varusername = "";
                $varpassword = "";
                $varUserType = "";

                $varRFID =   "";
                $varStdID =  "";
                $varFname =  "";
                $varMname =  "";
                $varLname = "";
                $varEmailAdd = "";
                $varGender = "";
                $varContact = "";
        }


?>


<form method="POST">

                <h1 class="display-5 mb-4"></h1>
                
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
                                <input type="text" class="form-control" id="Mname" name="txtMname" value="<?php echo "$varMname"; ?>" placeholder=""required>
                                <label for="form-floating-1">Middle Name</label>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="username" name="txtUsername" value="<?php echo "$varusername"; ?>" placeholder=""required>
                                <label for="form-floating-1">Username</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="password" name="txtPassword" value="<?php echo "$varpassword"; ?>" placeholder=""required>
                                <label for="form-floating-1">Password</label>
                            </div>
                        </div>



                        <div class="col-6">
                            <div class="form-floating">
                                <input required type="email" class="form-control" id="EmailAdd" value="<?php echo "$varEmailAdd"; ?>" name="txtEmailAdd" placeholder="name@domain.com">
                                <label for="EmailAdd">Email address</label>
                            </div>
                        </div>

                      

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="tel" onkeyup="addDash(this)"  class="form-control" id="Contact" name="txtContact" value="<?php echo "$varContact"; ?>" placeholder="ID number" pattern="[0-9]{4}-[0-9]{4}-[0-9]{3}" maxlength="13"required>
                                <label for="Contact">Contact Number</label>
                            </div>
                        </div>


 <div class="col-6">
                            <div class="form" >                        
                                <label for="Gender"  class="form-control" style="text-align: right;background-color: #ffffff;">Please Select Gender:</label>
                                   
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form">                        
                                <select class="form-control"  name="txtGender" id="Gender"required>
                                        <option value="">None</option>
                                        <?php 
                            if($varGender == "Male"){
                              
                                echo '<option Selected value="Male">Male</option>
                                      <option value="Female">Female</option>';           

                             }else{
                                echo '<option  value="Male">Male</option>
                                      <option Selected value="Female">Female</option>';  
                             }    
                           ?>

                                        
                                        
                                </select>
                                   
                            </div>
                        </div>

                    </div>
                
       


<div class="mb-5">
              <br>      
                </div>


 <div class="col-12" >
                            <button  style="background: crimson;border: revert;" class="btn btn-primary w-100 py-3" name="btnUpdate" type="submit">Update</button>
            </div>
    </div> <!-- End-->


</form>

          <?php 
            }//btn CheckRFID
          ?>          
                </div> <!-- End row g-5-->
            </div>
            <!-- Blog list End -->

    <!-- Sidebar Start -->
            <div hidden class="col-lg-4">
                

                <!-- Category Start -->
                <div class="mb-5">
           
                    <h2 class="mb-4">RFID Update</h2>
                   <!-- code Start -->

                   <!-- code End -->

                </div>
                <!-- Category End -->


               
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->









 <!-- Footer Start --> 
    

    <div class="container-fluid bg-dark text-secondary text-center border-top py-4 px-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="m-0">&copy; <a class="text-secondary border-bottom" href="#">Payment Management System</a>. All Rights Reserved 2023</p>
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