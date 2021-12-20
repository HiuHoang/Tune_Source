<?php
include('../index/connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM genre WHERE GenreID =$id";
if ($connect->query($sql) === TRUE) {
    echo "<script>alert('Deleted successfully!')</script>";
} else {
    echo"<script> alert ('Delete failed because there are still songs of this genre in the store!')</script>";
}
echo"<script>window.open('managegenre.php','_self')</script>";
}
?>
