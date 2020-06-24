<?php
session_start();
require('connect.php');
$status = $_GET['status'];
$reportid = $_GET['id'];

if (isset($status) && isset($reportid)) {
    echo $status . ' ' . $reportid;
    $updatestatusquery = "UPDATE report SET progressID='$status' where reportID='$reportid'";
    $updatestatusget = mysqli_query($connection, $updatestatusquery);
    if ($_SESSION['role'] == '3') {
        header('Location: headpolice/reporthistory.php?id=' . $reportid);
    } elseif ($_SESSION['role'] == '2') {
        header('Location: patrolpolice/reportcheck.php?id=' . $reportid);
    } else {
        echo 'problem at role';
    }
} else {
    echo 'problem';
}
