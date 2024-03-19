<?php
require_once("config.php"); 

echo date("Y-m-d H:i:s",$a);

$dateNw = date("Y-m-d H:i:s",$a);

if(isset($_POST['btnSearch'])){

 $Search_Invoice =  $_POST['txtSearch'];
 $Search_txtStdID =  $_POST['txtStdID'];

//echo '<br>'.$Search_Invoice.'<br>'.$Search_txtStdID.'';
$querySelected = "SELECT * FROM `pending_request` WHERE Invoice_Number='$Search_Invoice' And Status = 'pending'";
$queryItemlist = "SELECT * FROM `itemlist` WHERE invoice='$Search_Invoice'  And status = 'pending' ";

$_SESSION['tempData1'] = $querySelected;
$_SESSION['tempData2'] = $queryItemlist;

$resultSelected = $dbc->query($querySelected);
$resultItemList = $dbc->query($queryItemlist);

}else{
$resultSelected = $dbc->query($_SESSION['tempData1']);
$resultItemList = $dbc->query($_SESSION['tempData2']);
}



function EmailSentPayment($varFname,$varEmail,$varRefID,$TotalPrice,$dateNw){

    //Start Email Sender-----------------------------------------------------
                
                
$fromEmail = 'Polytechnic University of the Philippines - Parañaque Campus';
$fromEmailext = 'Payment Management System';
$subjectName = "PAYMENT NOTIFICATION";
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
Thank you for your payment, '.$yourName.'<br/>
                 <br/>

<br/>Transaction Amount Paid: '.$TotalPrice.'.
<br/>Transaction Date: '.$dateNw.'.
<br/>Transaction ID: '.$invoice.'.
<br/>
<br/>

Thank you and Keep safe.
<br>
<br>
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
    $result1 = @mail($to, $subject, $message, $headers);
                
    if($result1){
      //  header("location: index1.php?RequestForm=Requested");
    }else{
       // header("location: index1.php?EmailSent=Failed");
    }

//end of email sender-------------------------------

}


function PrinterSendData($varTransaction_Num,$varTypeOfPayment,$varTotalPrice,$varDateOfProcess,$varFname,$varReason){


        
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
$Data .= "Transaction Number: ".$varTransaction_Num." \n";
$Data .= "Created At:".$varDateOfProcess."\n";
$Data .= "Client Name : ".$varFname." \n";
$Data .= "Reason : ".$varReason." \n";
$Data .= "--------------------------------\n"; 
$Data .= "Mode Of Payment : $varTypeOfPayment \n";
$Data .= "Total Price : $varTotalPrice Php\n";
$Data .= "Payment Status : Paid.\n";
$Data .= "THANK YOU!.\n";
$Data .= "--------------------------\n\n";
fwrite($handle, $Data);
fclose($handle);
copy($file, "//localhost/xprinter");  # location ng network Printer
unlink($file);
//end Print


}



 if(isset($_POST['btnProcessTrans'])) {
	
	$varInvoice_Number = $_SESSION['Temp_Invoice_Number'];
	$varStdID = $_SESSION['Temp_StdID'];
	$varFname = $_SESSION['Temp_Fname'];
	$varMname = $_SESSION['Temp_Mname'];
	$varLname = $_SESSION['Temp_Lname'];
	$varEmailAdd = $_SESSION['Temp_EmailAdd'];
	$varAcademicYear = $_SESSION['Temp_AcademicYear'];
	$varPYear_Section = $_SESSION['Temp_PYear_Section'];
	$varSemester = $_SESSION['Temp_Semester'];
	$varStatus = "paid";
	$varContact = $_SESSION['Temp_Contact'];
	$varReason = $_SESSION['Temp_Reason'];
	$varTotalPrice = $_SESSION['Temp_TotalPrice'];
	$varTypeOfPayment = $_SESSION['Temp_TypeOfPayment'];
	$varRequestedBy = $_SESSION['Temp_RequestedBy'];
	$varDateOfRequest = $_SESSION['Temp_DateOfRequest'];
	$varORNumber = $_POST['txtOR'];

	$queryPaid = "INSERT INTO `paid_request`(`Invoice_Number`, `StdID`, `Fname`, `Mname`, `Lname`, `EmailAdd`, `AcademicYear`, `PYear_Section`, `Semester`, `Status`, `Contact`, `Reason`, `TotalPrice`, `TypeOfPayment`, `RequestedBy`, `ORNumber`, `DateOfRequest`)
		 VALUES
		  ('$varInvoice_Number','$varStdID','$varFname','$varMname','$varLname','$varEmailAdd','$varAcademicYear','$varPYear_Section','$varSemester','$varStatus','$varContact','$varReason','$varTotalPrice','$varTypeOfPayment','$varRequestedBy','$varORNumber','$varDateOfRequest')";
	/*
	$queryPaidItem = "INSERT INTO `paid_itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) 
										VALUES ('$varInvoice_Number','$varRequestedBy','$varData','$varData','$varData','$varStatus')";*/

	EmailSentPayment($varFname,$varEmailAdd,$varInvoice_Number,$varTotalPrice,$dateNw);

	PrinterSendData($varInvoice_Number,$varTypeOfPayment,$varTotalPrice,$dateNw,$varFname,$varReason);

	// Retrieve data from the source table
	$queryItemlist = "SELECT * FROM `itemlist` WHERE invoice='$varInvoice_Number'  And status = 'pending' ";
	$result = mysqli_query($dbc, $queryItemlist);
	// Check if data retrieval was successful
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
					$temp_invoice = $row['invoice'];
					$temp_StdID = $row['StdID'];
					$temp_ItemCode = $row['ItemCode'];
					$temp_ItemName = $row['ItemName'];
					$temp_Price = $row['Price'];
					$temp_status = "paid";

				$insertdata = "INSERT INTO `paid_itemlist`(`invoice`, `StdID`, `ItemCode`, `ItemName`, `Price`, `status`) 
									        VALUES ('$temp_invoice','$temp_StdID','$temp_ItemCode','$temp_ItemName','$temp_Price','$temp_status')";;
				echo "<br>";
				echo $insertdata;
				echo "<br>";

				if ($dbc->query($insertdata) === TRUE) {
        			  //  echo "Record Added successfully.";
						//
        			} else {
        			    echo "Error Payment record: " . $dbc->error;
        			    header("location: PMS-Payment.php?Payment=Error");
						//exit();
        			}

			}
		}


	}

	$queryDeleteItem = "DELETE FROM `itemlist` WHERE `invoice`='$varInvoice_Number' And `StdID`='$varRequestedBy' And `status`='pending'";
	$queryDeletePending = "DELETE FROM `pending_request` WHERE `Invoice_Number`='$varInvoice_Number' And `RequestedBy`='$varRequestedBy' And `Status`='pending'";





	if ($dbc->query($queryPaid) === TRUE And $dbc->query($queryDeleteItem) === TRUE And $dbc->query($queryDeletePending) === TRUE) {
          //  echo "Record Added successfully.";
			header("location: PMS-Payment.php?Payment=Success");
        } else {
            echo "Error Payment record: " . $dbc->error;

        }

}	


?>
<meta charset="utf-8">
    <title>PUP - Request Form</title>
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
<body style="    text-align: -webkit-center;">
	
	<div style="float: right;">
		<button type="button" class= "btn btn-default" name="backbtn" onclick="history.go(-1);"> 
						Go Back 
	</button>
	</div>
<br>

<hr>


<div style="width: 50%;     text-align: left;">
	
	<?php  

	if ($resultSelected->num_rows > 0) {
		while ($row = $resultSelected->fetch_assoc()) {
				//$tb_id = $row['id'];
$pd_Invoice_Number = $row['Invoice_Number'];
$pd_StdID = $row['StdID'];
$pd_Fname = $row['Fname'];
$pd_Mname = $row['Mname'];
$pd_Lname = $row['Lname'];
$pd_EmailAdd = $row['EmailAdd'];
$pd_AcademicYear = $row['AcademicYear'];
$pd_PYear_Section = $row['PYear_Section'];
$pd_Semester = $row['Semester'];
$pd_Status = $row['Status'];
$pd_Contact = $row['Contact'];
$pd_Reason = $row['Reason'];
$pd_TotalPrice = $row['TotalPrice'];
$pd_TypeOfPayment = $row['TypeOfPayment'];
$pd_RequestedBy = $row['RequestedBy'];
$pd_DateOfRequest = $row['DateOfRequest'];
//$pd_DateApproved = $row['DateApproved'];
//$pd_DateEncode = $row['DateEncode'];

	}//end while

$_SESSION['Temp_Invoice_Number'] = $pd_Invoice_Number;
$_SESSION['Temp_StdID'] = $pd_StdID;
$_SESSION['Temp_Fname'] = $pd_Fname;
$_SESSION['Temp_Mname'] = $pd_Mname;
$_SESSION['Temp_Lname'] = $pd_Lname;
$_SESSION['Temp_EmailAdd'] = $pd_EmailAdd;
$_SESSION['Temp_AcademicYear'] = $pd_AcademicYear;
$_SESSION['Temp_PYear_Section'] = $pd_PYear_Section;
$_SESSION['Temp_Semester'] = $pd_Semester;
$_SESSION['Temp_Status'] = $pd_Status;
$_SESSION['Temp_Contact'] = $pd_Contact;
$_SESSION['Temp_Reason'] = $pd_Reason;
$_SESSION['Temp_TotalPrice'] = $pd_TotalPrice;
$_SESSION['Temp_TypeOfPayment'] = $pd_TypeOfPayment;
$_SESSION['Temp_RequestedBy'] = $pd_RequestedBy;
$_SESSION['Temp_DateOfRequest'] = $pd_DateOfRequest;



//new data here
echo 	"<h2>
			Student Information
		</h2>";


echo 	"<p>
			Student ID: $pd_StdID
		</p>";	
echo 	"<p>
			Fullname: $pd_Fname $pd_Mname $pd_Lname	
		</p>";	
echo 	"<p>
			Email Address: $pd_EmailAdd	 
		</p>";
echo 	"<p>
			Contact number: $pd_Contact
		</p>";	
echo 	"<p>
			AcademicYear : $pd_AcademicYear
		</p>";
echo 	"<p>
			PYear_Section : $pd_PYear_Section
		</p>";	
echo 	"<p>
			Semester : $pd_Semester
		</p>";
echo 	"<p>
			Reason : $pd_Reason
		</p>";
echo 	"<p>
			Type Of Payment : $pd_TypeOfPayment
		</p>";
echo 	"<p>
			Date Of Request : $pd_DateOfRequest
		</p>";
	}else{
		
	}

	?>
<hr>
</div>









<div style="width: 50%;">
	
	<?php  

	if ($resultItemList->num_rows > 0) {
		echo "<table style='color: black;'>";
		$SumPrice = 0;
        echo "<tr><th>Item Name</th><th>Price</th></tr>";
		while ($row = $resultItemList->fetch_assoc()) {
				$tb_id = $row['id'];
               	$tb_invoice = $row['invoice'];
               	$tb_StdID = $row['StdID'];
               	$tb_ItemCode = $row['ItemCode'];
               	$tb_ItemName = $row['ItemName'];
               	$tb_Price = $row['Price'];
               	$tb_status = $row['status'];

        echo "<tr>";
            echo "<td>$tb_ItemName</td>";
            echo "<td>$tb_Price</td>";
        echo "</tr>";
        $SumPrice = $tb_Price + $SumPrice ;
		}//end while
		echo "</table>";
         echo "<h2 style='text-align-last: center; background: white; ' >Total Price : "."$SumPrice"." Php</h2>";

	}else{

	}

	?>

</div>

<form method="POST" onsubmit="return confirmdata()">
<div class="col-9" style="width: 50%;">

                            <div class="form-floating" style="width: 70%">
                                <input type="text" class="form-control" id="OR" name="txtOR" placeholder=""required>
                                <label style="color:black; font: bolder; font-size: large;" for="form-floating-3">Please Enter OR number</label>
                                <br>
                            </div>
  
	<button  style="color: whitesmoke; background-color: whitesmoke; background: crimson;border: revert;" class="btn btn-primary w-100 py-3"  type="submit" name="btnProcessTrans">       PROCESS TRANSACTION      </button>
</div>
</form>
</body>




<script type="text/javascript">

	function confirmdata() {
      var result = confirm("Do you want to Proceed?");
      
      if (result) {
     //   alert("You clicked 'Yes'!");
 
        return true;
      
      } else {
       // alert("You clicked 'No'!");
        return false;
      }
}
</script>