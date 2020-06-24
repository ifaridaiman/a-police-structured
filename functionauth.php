<?php
//start the session to use variable like $_SESSION[''];
session_start();
//use file connect.php
require('connect.php');

//variable
$id = $_POST['inputId'];
$password = $_POST['inputPassword'];

//isset is used to check either the variable is available or not;
if (isset($id) and isset($password)) {
    //query database
    $query = " SELECT * FROM user where userID='$id' and userIC='$password'";
    //display result
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    $rolequery = " SELECT role_id FROM user WHERE userID='$id'";
    $roleget = mysqli_query($connection, $rolequery) or die(mysqli_error($connection));

    while ($row = mysqli_fetch_array($roleget)) {
        $role = $row['role_id'];
    }


    //user authentication 
    if ($count == 1) {
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;
    } else {
        $fmsg = "Invalid Login ";
    }

    if (isset($_SESSION['id']) and isset($_SESSION['role'])) {
        if ($role == 1) {
            header('location: user/index.php');
        } elseif ($role == 3) {
            header('location: headpolice/index.php');
        } elseif ($role == 2) {
            header('location: patrolpolice/index.php');
        } else {
            echo 'problem';
        }
    } else {
        header('location: auth.php/problem');
    }
}
