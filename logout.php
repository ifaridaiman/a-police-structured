<?php 
//start session to extract all session in this page
session_start();
//destroy every session that have been extract
session_destroy();
//got to index ;
header('location: ../a-police-structured');
?>