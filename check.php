<?php
    $login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    echo $login;

    $pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
    echo $pass;


    mysqli_connect()('ec2-54-228-218-84.eu-west-1.compute.amazonaws.com','pfqaukrpwxfxsu','b47a2752d7155f53a3755fd0d1a3b1ecbf093430caf4c26622d666f11579b31a','de79gv4fpuu8oh') ;

    mysql_close(); 
?>
