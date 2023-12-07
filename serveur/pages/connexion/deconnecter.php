<?php
    session_start();
    session_unset();
    session_destroy(); 
    header('Location: ../../../index.php');
    exit; //Le placer toujours après un header('Location: ....)
?>