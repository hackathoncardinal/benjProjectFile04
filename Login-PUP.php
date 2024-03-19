  <?php  
require_once("config.php"); 

                        $FullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(strpos($FullUrl,"Login=Failed")){
                            echo '<script type="text/javascript"> alert("Failed To Login"); </script>';
                        }elseif(strpos($FullUrl,"Change=Failed")){
                            echo '<script type="text/javascript"> alert("Old Password didnt Match"); </script>';
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



<head>
   
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

 <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
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
                <a href="index.php" class="nav-item nav-link ">Home</a>
                <a <?php echo $_SESSION['RequestForm']; ?> href="RequestForm-PUP.php" class="nav-item nav-link">Request Form</a>
                <a <?php echo $_SESSION['Login-PUP']; ?> href="Login-PUP.php" class="nav-item nav-link active">Login</a>                                
                <a <?php echo $_SESSION['contact']; ?> href="contact.html" class="nav-item nav-link">Contact</a>
                <a href="team.php" class="nav-item nav-link">Team</a> 
                
            </div>
        </div>
    </nav>
    <!-- Navbar End -->



<body style="padding-top: 0px;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w" method="post" action="AdminLogin.php">
                <span class="login100-form-title p-b-32">
                    Login
                </span>
                <span class="txt1 p-b-11">
                Username
                </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
                        <input class="input100" type="text" name="username">
                            <span class="focus-input100"></span>
                    </div>
                            <span class="txt1 p-b-11">
                                Password
                            </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                    <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                    </div>

<div class="radio-container">
  <input type="radio" id="male" name="userType" />
  <label for="male" class="radio-label">Student</label>
</div>

<div class="radio-container">
  <input type="radio" id="female" name="userType" />
  <label for="female" class="radio-label">Administrator</label>
</div>

                    <!--Login Button-->
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="button" name="buttonLogin1" type="submit" value="Login" >
                            Login
                        </button>
                    </div>
            </form>

</div>
</div>
</div>



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
</body>
</html>