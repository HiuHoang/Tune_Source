<?php
include('../index/connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM user WHERE UserID =$id";
if ($connect->query($sql) === TRUE) {
    echo "<script>alert('Deleted successfully!')</script>";
} else {
    echo"<script> alert ('Delete failed because this user still order in cart!')</script>";
}
echo"<script>window.open('manageuser.php','_self')</script>";
}
?>
<?php 