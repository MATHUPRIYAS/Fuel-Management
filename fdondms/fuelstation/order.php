<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$sqlInsert = "INSERT INTO `ordertracking` (`orderid`, `deliveryboyname`, `status`)
                  SELECT DISTINCT `OrderNumber`, 'Delivery Boy Name', 'Initial Status' FROM `tbltracking`";
    if ($conn->query($sqlInsert) === TRUE) {
        echo "Records inserted successfully.";
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
    $conn->close();
exit("Error: " . $e->getMessage());
?>