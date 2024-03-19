<?php
//data implementation
require_once("config.php");


if(isset($_POST['btnSubmit'])){
//if Start here

	$varFullname = $_POST['txtFullname'];
	$varEmail = $_POST['txtEmail'];
	$varSubject = $_POST['txtSubject'];
	$varMessage = $_POST['txtMessage'];




//start Email


$fromEmail = 'Polytechnic University of the Philippines - Parañaque Campus';
$fromEmailext = 'Payment Management System';
$to = $varEmail;
$subject = $varSubject;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$fromEmail.'<'.$fromEmailext.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
$message = '
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

<br/>
<br/>
Hi! '.$varFullname.'<br/>
                 <br/>
	
	Thank you for responding. I appreciate the detailed information you provided
<br/>
<br/>
<hr>
note: '.$varMessage.'
<hr>
<br/>
If you have questions or suggestions, email us at
PUPparanaquecampus@gmail.com.
<br/>
<br>
Thank you and Keep safe.
<br>
<br>
</div>
<div class="container">

        Best Regards,<br/>
        
</div>
</body>
</html>
';
$result = @mail($to, $subject, $message, $headers);

if($result){
	echo"Email Sent";
	header("location: MSG_SUCCESS-Contact.html");	
	exit();
}else{
	echo"Error";
}

//End Email



//Thank you for responding. I appreciate the detailed information you provided
//end If
}else{

}



?>