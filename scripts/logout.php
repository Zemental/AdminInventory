<?php
    session_start();
    session_unset($_SESSION['id']);
    session_unset($_SESSION['usuario']);
    session_unset($_SESSION['nombres']);
    session_unset($_SESSION['apellidos']);
    session_destroy();
    header("location:../index.php");