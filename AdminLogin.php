<?php
function alert($msg) {
    	echo "<script type='text/javascript'>
			alert('$msg');
			</script>";
}

require_once("config.php");
$_SESSION['PageStatus'] = "";


if(isset($_POST['buttonLogin1'])){
	$login = $_POST['username'];
	$password = $_POST['password'];
	$userType = $_POST['userType'];
	$varID = "";
	//$_SESSION['PageStatus'] = $userType;

	if ($userType == "Admin") {
		//start  statement

		$queryAdmin = "SELECT * From adminuser where (username='$login' And password='$password' And UserType='$userType')";
		$result = mysqli_query($dbc,$queryAdmin);
		$numRows =mysqli_num_rows($result);
		if($numRows == 1){ // start -----------------
		$_SESSION['username'] = $login;
		$_SESSION['pass'] = $password;
		$_SESSION['PageStatus'] = $userType;




	echo "<script>";
    // PHP code to generate dynamic JavaScript

      // Get data from PHP variables

      // Generate JavaScript code to store data in local storage
      echo "localStorage.setItem('userType', '$userType');";
      echo "sessionStorage.setItem('SDaDATA', '$userType');";
 	echo "</script>";


		while($res = mysqli_fetch_array($result)){
			$_SESSION['userID'] = $res['IDnumber'];
			$_SESSION['userType'] = $res['UserType'];
			$_SESSION['S_username'] = $res['username'];
		}

		//alert("Success Login!! $varID");
		//echo "Succes Login!!";	
		header("Location: index1.php");
	}else{
		alert("Failed Login!! [$userType]");
		header("Location: index.php?Login=Failed");
		

echo "<script>alert('Failed Login!!!');</script>";
		echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
		exit();

	} // end -------------

		
	}//end statement


if ($userType == "Student") {
		//start  statement

		$queryStudent = "SELECT * From studentuser where (username='$login' And password='$password' And UserType='$userType')";
		$result = mysqli_query($dbc,$queryStudent);
		$numRows =mysqli_num_rows($result);
		if($numRows == 1){ // start -----------------
		$_SESSION['username'] = $login;
		$_SESSION['pass'] = $password;
		$_SESSION['PageStatus'] = $userType;

		/*
		RFID
		StdID
		username
		password
		UserType
		Fname
		Mname
		Lname
		EmailAdd
		Gender
		Contact
		//DateRegister		
		*/

		while($res = mysqli_fetch_array($result)){
			$_SESSION['S_RFID'] = $res['RFID'];	
			$_SESSION['S_StdID'] = $res['StdID'];	
			$_SESSION['S_username'] = $res['username'];
		  $_SESSION['S_password'] = $res['password'];
			$_SESSION['S_userType'] = $res['UserType'];
			$_SESSION['S_Fname'] = $res['Fname'];
			$_SESSION['S_Mname'] = $res['Mname'];
			$_SESSION['S_Lname'] = $res['Lname'];
			$_SESSION['S_EmailAdd'] = $res['EmailAdd'];
			$_SESSION['S_Gender'] = $res['Gender'];
			$_SESSION['S_Contact'] = $res['Contact'];
		}

		//alert("Success Login!! $varID");
		//echo "Succes Login!!";	
		header("Location: index1.php");
	}else{
		
		header("Location: index.php?Login=Failed");
		alert("Failed Login!! [$userType]");

echo "<script>alert('Failed Login!!!');</script>";
		echo '<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
			</button>';
		exit();

	} // end -------------

		
	}//end statement
	
}



?>
