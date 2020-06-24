<?php 
//connection database
//side server script to connect php and MYSQL


$connection = mysqli_connect('localhost','root','');
if(!$connection){
    die("database connection failed, please contact web master". mysqli_error($connection));
}
$dbname= 'auxi-police';
$select_db = mysqli_select_db($connection,$dbname);
if(!$select_db){
    die('there is no database name '.$dbname);
}