<?php

    $con = mysqli_connect('localhost','root','','inventory');
    $res = mysqli_query($con, "SELECT * FROM Usuarios where usuario= '".$_POST['usuario']."' and password='".$_POST['password']."'");
    if (mysqli_num_rows($res)>0)
    {
        $data['error'] = false;
        session_start();
        $_row = mysqli_fetch_row($res);
        $_SESSION['id']=$_row[0];
        $_SESSION['usuario']=$_row[1];
        $_SESSION['nombres']=$_row[3];
        $_SESSION['apellidos']=$_row[4];      
    } 
    else 
    {
        $data['error'] = true;
    }
    echo json_encode($data);