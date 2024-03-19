<?php

require_once("config.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PUP-Request</title>
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
                        <a <?php echo $_SESSION['AdminDashboard']; ?> href="ItemPrice.php" class="dropdown-item">Item Price</a> 
                        <a <?php echo $_SESSION['ListingPage']; ?> href="ListingPage.php" class="dropdown-item">My Listing</a> 
                        <a <?php echo $_SESSION['AdminDashboard']; ?> href="Admin-Dashboard.php" class="dropdown-item">Print Report</a>                    
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Registration.php" class="dropdown-item">RFID & Student <br> Registation</a>
                        <a <?php echo $_SESSION['RFID']; ?> href="PUP-RFID-Update.php" class="dropdown-item">RFID & Student <br> Update</a>
                        <a <?php echo $_SESSION['PUP-ChangePassword']; ?>  href="PUP-ChangePassword.php" class="dropdown-item active">Change Password</a>
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
    <h2 class="mb-4">Change Password</h2>
    <!-- Search Form End -->
    </div>
                    </div> <!-- End-->
<div class="col-xl-12 col-lg-12 col-md-6">      <!-- starart-->
                        <div class="blog-item">
    <!-- DIV Form Start -->          

<form method="POST" action="PUP-ChangePasswordFN.php"  enctype="multipart/form-data"  onsubmit="return CheckData()">
                <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="OldPass" name="txtOldPAss" placeholder=""required>
                                <label for="form-floating-3">Please Enter Your Old Password</label>
                            </div>
                </div>

                <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="NewPass" name="txtNewPass" placeholder=""required>
                                <label for="form-floating-3">Please Enter Your New Password</label>
                            </div>
                </div>
                
              

                            <div class="form-floating">
                                <input type="password" class="form-control" id="RePass" name="txtRePass" placeholder=""required>
                                <label for="form-floating-3">Please Re-Enter Your New Password</label>
                            </div>
                             <button  type="submit" class= "btn btn-default" style="color: white;background: orange;" name="btnChange"> 
                                                    Change  </button>
                        <div class="col-12">
                </div>
                                              
    </form>

 



    <!-- DIV Form End -->
                        </div>
                    </div> <!-- End-->




                    
                </div> <!-- End row g-5-->
            </div>
            <!-- Blog list End -->

    <!-- Sidebar Start -->
            <div hidden class="col-lg-4">
                

                <!-- Category Start -->
                <div class="mb-5">
                
                    <h2 class="mb-4">Change Password</h2>
                   <!-- code Start -->

                   <h4 class="mb-4"> </h4>

                  
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


<script type="text/javascript">
    function CheckData() {

        var OldPass = document.getElementById("OldPass").value
        var NewPass = document.getElementById("NewPass").value
        var RePass = document.getElementById("RePass").value

        if (OldPass === "<?php echo $_SESSION['pass']; ?>") {


            if(NewPass === RePass){

                    if(confirm("Change Password?\n")){w
                         return true;
                         }else{
                         return false;
            }

            }else{
                alert("New Password and Re Type Password Did not match");
                return false;
            }



             
        }else{
            alert("Invalid Old Password");
            return false;
        }
       


       

    }
</script>


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