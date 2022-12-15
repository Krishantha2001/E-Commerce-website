<?php include('confing/constants.php');?>
<?php 
$id = $_GET['id'];

$sql = "DELETE FROM cart WHERE id = $id";
$res = mysqli_query($conn,$sql);
if($res)
{
    header('location:cart.php?id=0');
}
?>