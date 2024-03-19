<?php
require_once("config.php"); 
    
function alert($msg) {
        echo "<script type='text/javascript'>
            alert('$msg');
            </script>";
}



if(isset($_POST['btnChange'])){
  
 $newPass = $_POST['txtRePass'];
 $userID = $_SESSION['userID'];
//  $Query = mysqli_query($dbc,"UPDATE `std_acct` SET `password`='$varNewpass' WHERE `Student_ID`='$varID'");  
// $Query = "UPDATE `adminuser` SET `password`='".$newPass."' WHERE `id`='".$userID."'";
// //echo "$Query";
// $result = mysqli_query($dbc,$Query); 

$queryUpdate = "UPDATE `adminuser` SET `password`='".$newPass."' WHERE `IDnumber`='".$userID."'";
$result1 = mysqli_query($dbc,$queryUpdate);


    if($result1){
        alert("Update Succesfully");
       // header("Location: Login-PUP.php");
        header("location:  Login-PUP.php?Change=Success");
    }else{
        alert("Update Failed");
        header("location:  Login-PUP.php?Change=Failed");
    }

}

?>