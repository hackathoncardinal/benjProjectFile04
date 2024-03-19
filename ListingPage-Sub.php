<?php
require_once("config.php"); 
if(isset($_POST['btnSearch'])){

 $Search_Invoice =  $_POST['txtSearch'];
echo $Search_Invoice;

//echo '<br>'.$Search_Invoice.'<br>'.$Search_txtStdID.'';

$queryItemlist = "SELECT * FROM `paid_itemlist` WHERE invoice='$Search_Invoice'  And status = 'paid' ";
//echo $queryItemlist;
$_SESSION['tempData2'] = $queryItemlist;


$resultItemList = $dbc->query($queryItemlist);

}else{

$resultItemList = $dbc->query($_SESSION['tempData2']);
}

 


?>
<meta charset="utf-8">
    <title>Listing Page Sub</title>
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
         echo "<h2 style='text-align-last: center; background: #ffffff;' >Total Price : "."$SumPrice"." Php</h2>";

	}else{

	}

	?>

</div>


</body>


