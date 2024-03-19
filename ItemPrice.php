<?php
require_once("config.php"); 
$resultItemList = $dbc->query("SELECT * FROM `itemprice` WHERE 1");



if (isset($_POST['delete'])) {// startt delete------------------------------
        $update_id = $_POST['update_id'];
        $new_data = $_POST['new_data'];
        $sql = "UPDATE `itemprice` SET `Price` = '$new_data' WHERE `id` = '$update_id' ";
        //echo $sql;
        if ($dbc->query($sql) === TRUE) {
          //  echo "Record Delete successfully.";
            echo '<script>location.href = location.href;</script>';
        } else {
            echo "Error Update: " . $dbc->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Document Price</title>
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
                       <a <?php echo $_SESSION['AdminDashboard']; ?> href="PMS.php" class="dropdown-item ">P M S</a> 
                       <a <?php echo $_SESSION['AdminDashboard']; ?> href="ItemPrice.php" class="dropdown-item active">Item Price</a> 
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
    <div style="    text-align: -webkit-center;" class="container-fluid p-0">
<br>
    <?php echo "<h2>Document Price List</h2>";?>
     <br>
 



<div style="width: 80%;">
    
    <?php  

    if ($resultItemList->num_rows > 0) {
        echo "<table style='color: black;'>";
        $SumPrice = 0;
        echo "<tr><th>Item Name</th><th>Price</th><th>Action</th></tr>";
        while ($row = $resultItemList->fetch_assoc()) {
                $tb_id = $row['id'];
                $tb_ItemCode = $row['ItemCode'];
                $tb_ItemName = $row['ItemName'];
                $tb_Price = $row['Price'];
                

        echo "<tr>";
            echo "<td>$tb_ItemName</td>";
            echo "<td>$tb_Price</td>";
             echo "<td><button class='button-link' onclick='openModalDelete($tb_id, \"$tb_Price\", \"$tb_ItemName\")'>Edit</button>";
        echo "</tr>";
        $SumPrice = $tb_Price + $SumPrice ;
        }//end while
        echo "</table>";
     

    }else{

    }

    ?>
<br>
</div>

     <br>
    </div>
    <!-- Carousel End -->




<div style="width: 100%; text-align-last: center;color: black;font-size: x-large;font-weight: bold; ">
   
    <br>
<div  id="deleteModal" class="modal2">
        <!-- Modal content -->
        <div class="modal-content2">
               <br>   <br>   <br>   <br>
            <span style="font-size: xxx-large;" class="close2">&times;</span>
    <form action="" method="POST">
        <br>
                <input hidden  type="text" id="update_id2" name="update_id" value="">
               
<p hidden id="data3D"  style="background: maroon;color: white;text-decoration-line: underline;text-transform: uppercase;margin-bottom: 0px;padding-bottom: 22px;padding-top: 22px;"></p>

<br><br>
                 <label style="color: white;" for="new_data">Enter New Value:</label><br>
                <input  class="form w-50"  type="text" id="new_data2" name="new_data" value=""><br>
                <input style="color: yellow; background-color: blue; background: crimson;border: revert;" class="btn btn-primary w-50 py-3" type="submit" name="delete" value=" U P D A T E ">
    </form>
        </div>
</div>

</div>


<script>
        // Get the modal element delete
        var modal2 = document.getElementById("deleteModal");

        // Get the close button element
        var closeBtn2 = document.getElementsByClassName("close2")[0];

        // Function to open the modal and populate the form fields
       function openModalDelete(id2, data2, data3) {
          //  alert(id2 +"["+ data2 + "]");
            modal2.style.display = "block";
            document.getElementById("update_id2").value =  id2;
            document.getElementById("new_data2").value = data2;
        const exampleDiv = document.getElementById('data3D');
        exampleDiv.innerHTML = data3;
        
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