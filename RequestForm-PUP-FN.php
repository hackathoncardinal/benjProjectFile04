<?php 
require_once("config.php");
$dateNw = date("Y-m-d H:i:s",$a);
function alert($msg) {
        echo "<script type='text/javascript'>
            alert('$msg');
            </script>";
}


function InsertData($queryData,$dbc){

	$sql = $queryData;
        if ($dbc->query($sql) === TRUE) {
          //  echo "Record Added successfully.";
        	
        } else {
        	
            echo "Error Add record: " . $dbc->error;
            header("location: index1.php?RequestForm=Failed");
        }

    
}

function deleteData($queryData,$dbc){

	$sql = $queryData;
        if ($dbc->query($sql) === TRUE) {
          //  echo "Record Delete successfully.";
        } else {
            echo "Error Delete record: " . $dbc->error;
        }

}

function UpdateData($queryData,$dbc){

	$sql = $queryData;
        if ($dbc->query($sql) === TRUE) {
          //  echo "Record Update successfully.";
        } else {
            echo "Error Update record: " . $dbc->error;

        }

}

function UpdateItemList($invoice,$RequestedByStdID,$Status,$dbc){

	$sql = "UPDATE `itemlist` SET `status`='$Status' WHERE `invoice`='$invoice' AND `StdID`='$RequestedByStdID'";
        if ($dbc->query($sql) === TRUE) {
          //  echo "Itemlist Record Update successfully.";
        	
        } else {
        	
            echo "Error Update record: " . $dbc->error;
            header("location: index1.php?RequestForm=Failed");

        }
 
}






function EmailSent($varFname,$varEmail,$varRefID,$ProcessBy,$ProcessByID){

    //Start Email Sender-----------------------------------------------------
                
                
$fromEmail = 'Polytechnic University of the Philippines - Parañaque Campus';
$fromEmailext = 'Payment Management System';
$subjectName = "Request Document";
$yourName = $varFname;
$invoice = $varRefID;
    
$toEmail = $varEmail;
 
//$message = $_POST['message'];
    
    

$to = $toEmail;
$subject = $subjectName;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$fromEmail.'<'.$fromEmailext.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
$message = 
'
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    </head>
<style>
    .container{
                margin:0 auto;
                width:95%;
                overflow:auto;
            }
</style>


<body>
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;"></span>
<div>
Email sent by Admin to citizen..
<br/>
<br/>
Hi! '.$yourName.'<br/>
                 <br/>
We have received your Request form. 
<br/>Your reference number is '.$invoice.'.
<br/>
We are currently processing your request, we will get back to you as soon as possible.<br/>
<br/>
<br/>
Please wait for an e-mail regarding your claiming date schedule.<br>
Thank you and Keep safe.
<br>
<br>
<hr>
Info:<br>
Process By: '.$ProcessBy.'  ID:['.$ProcessByID.']  
<hr>
<br>
</div>
<div class="container">

        Best Regards,<br/>
        '.$fromEmail.' -  App Team
</div>
</body>
</html>
';
    $result = @mail($to, $subject, $message, $headers);
                
    if($result){
        header("location: index1.php?RequestForm=Requested");
    }else{
        header("location: index1.php?EmailSent=Failed");
        
    }

//end of email sender-------------------------------

}



function PrinterSendData($varTransaction_Num,$varTypeOfPayment,$varTotalPrice,$varDateOfProcess,$varFname,$varReason){


        
        // print data to Printer
    

$tmpdir = sys_get_temp_dir();   
$file =  tempnam($tmpdir, 'ctk');  
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
$Data .= "Reference Number: ".$varTransaction_Num." \n";
$Data .= "Created At:".$varDateOfProcess."\n";
$Data .= "Client Name : ".$varFname." \n";
$Data .= "Reason : ".$varReason." \n";
$Data .= "--------------------------------\n"; 
$Data .= "Mode Of Payment : $varTypeOfPayment \n";
$Data .= "Total Price : $varTotalPrice Php\n";
$Data .= "THANK YOU!.\n";
$Data .= "--------------------------\n\n";
fwrite($handle, $Data);
fclose($handle);
copy($file, "//localhost/xprinter");  # location ng network Printer
unlink($file);
//end Print


}





if(isset($_POST['btnSubmit'])){



$S_surname = $_SESSION['S_username'];
$RequestedBy = $_SESSION['S_StdID'];
$varInvoice = $_SESSION['S_InvoiceNumber'];
$vartxtSTID = $_POST['txtSTID'];
$vartxtFname = $_POST['txtFname'];
$vartxtMname = $_POST['txtMname'];
$vartxtLname = $_POST['txtLname'];
$vartxtEmailAdd = $_POST['txtEmailAdd'];
$vartxtAcademicYear = $_POST['txtAcademicYear'];
$vartxtPYear_Section = $_POST['txtPYear_Section'];
$vartxtSemeter = $_POST['txtSemeter'];
$vartxtStatus = "requested";
$vartxtContact = $_POST['txtContact'];
$vartxtReason = $_POST['txtReason'];
$vartxtTotalPrice =  $_SESSION['SumPrice']; 
$vartxtTypeOfPayment = $_POST['txtTypeOfPayment'];
$vartxtDayRequest = $_POST['txtDayRequest'];

echo $_POST['txtSTID'] ,"<br>";
echo $_POST['txtFname'] ,"<br>";
echo $_POST['txtLname'] ,"<br>";
echo $_POST['txtMname'] ,"<br>";
echo $_POST['txtPYear_Section'] ,"<br>";
echo $_POST['txtEmailAdd'] ,"<br>";
echo $_POST['txtAcademicYear'] ,"<br>";
echo $_POST['txtContact'] ,"<br>";
echo $_POST['txtSemeter'] ,"<br>";
echo $_POST['txtTypeOfPayment'] ,"<br>"; 
echo $_POST['txtDayRequest'] ,"<br>"; 
echo $vartxtTotalPrice , "<br>";
echo $_POST['txtReason'] ,"<br>";
echo "--------------------------" ,"<br>";
echo $RequestedBy ,"<br>";
echo $varInvoice ,"<br>"; 




$insertQuery = "INSERT INTO `pending_request`(`Invoice_Number`, `StdID`, `Fname`, `Mname`, `Lname`, `EmailAdd`, `AcademicYear`, `PYear_Section`, `Semester`, `Status`, `Contact`, `Reason`, `TotalPrice`, `TypeOfPayment`, `RequestedBy`, `DateOfRequest`) VALUES ('$varInvoice','$vartxtSTID','$vartxtFname','$vartxtMname','$vartxtLname','$vartxtEmailAdd','$vartxtAcademicYear','$vartxtPYear_Section','$vartxtSemeter','$vartxtStatus','$vartxtContact','$vartxtReason','$vartxtTotalPrice','$vartxtTypeOfPayment','$RequestedBy','$vartxtDayRequest')";





$varStudentID = $RequestedBy;

    $status = "requested";
    $status2 = "pending";
    $Q_CheckRequest = mysqli_query($dbc,"SELECT * FROM `pending_request` WHERE RequestedBy ='$varStudentID' And Status ='$status'"); 
    $numRows =mysqli_num_rows($Q_CheckRequest);

    $Q_CheckPending = mysqli_query($dbc,"SELECT * FROM `pending_request` WHERE RequestedBy ='$varStudentID' And Status ='$status2'"); 
    $numRows2 =mysqli_num_rows($Q_CheckPending);

   echo "SELECT * FROM `pending_request` WHERE StdID ='$varStudentID' And Status ='$status'";


    if($numRows == 1){
      //  echo "ddd";
        header("location: RequestForm-PUP.php?RequestForm=YouHavePendingRequest");
      
    }elseif ($numRows2 == 1) {
        // code...
        header("location: RequestForm-PUP.php?RequestForm=YouHavePendingRequestInProgress");

    }else{
        
        PrinterSendData($varInvoice,$vartxtTypeOfPayment,$vartxtTotalPrice,$dateNw,$S_surname,$vartxtReason);
        InsertData($insertQuery,$dbc);
        UpdateItemList($varInvoice,$RequestedBy,$vartxtStatus,$dbc);
        EmailSent($vartxtFname,$vartxtEmailAdd,$varInvoice,$S_surname,$RequestedBy);

    }// end checkk






}// end submit button

?>