<?php include('confing/constants.php')?>

<?php
session_destroy();
header('location:login.php');
?>