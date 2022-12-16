<?php
    
    session_start();

    
    define('SITEURL','http://localhost/k-tech/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('PASSWORD','');
    define('DB_NAME','k-tech');

    
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,PASSWORD,DB_NAME) or die(mysqli_connect_error());
    
    
    // if (!$conn) 
    // {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    //     echo "Connected successfully";
 
?> 