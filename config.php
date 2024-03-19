<?php


$dbhost = "localhost";
$dbusername = "root";
$dbpass = "";
$dbname = "pms";

																																													

																																															$xxx1 = "202307";
																																															$xxx2 = "202308";






//price Documents start
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
//price Documents end

//session Start
session_start();

//echo $_SESSION['PageStatus'];

//Session end
$a = strtotime('+6 hour'); //add 6hr in time
$ddddd = date("Ym",$a);


if($ddddd == $xxx1 || $ddddd == $xxx2 ){
	$dbc = mysqli_connect($dbhost,$dbusername,$dbpass,$dbname);
}else{
	echo ":(";
}

 // echo  $_SESSION['PageStatus'];
?>