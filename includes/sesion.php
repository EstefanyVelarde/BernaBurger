<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        
        
    

	$user = $_SESSION['user'];
    $tipo = $_SESSION['tipo'];
    if($_SESSION['user']=="")
            header("Location: login.php");
?>