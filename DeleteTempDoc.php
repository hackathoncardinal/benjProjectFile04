<?php
    
 $sql = "DELETE FROM `itemlist` WHERE status = 'request' ";
       // echo $sql;
        if ($dbc->query($sql) === TRUE) {
           // echo "Record Delete successfully.";
        } else {
            echo "Error  delete: Please Contact youre system administrator " . $dbc->error;
        }

?>