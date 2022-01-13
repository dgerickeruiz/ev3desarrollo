<?php

 if(isset($_SESSION['user'])){
        header("Location: http://localhost/ev3desarrollo/vistas/principal.php");
 }
 else{
         require_once 'vistas/login.php';
 }
?>