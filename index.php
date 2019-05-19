<?php

session_start();
    unset($_SESSION);

    if(!empty($_SESSION['USER_ID'])){
        header("Location: view/HomeView.php");   
    }else{
        header("Location: view/Login.php");     
    }
	
?>
