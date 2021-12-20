<?php
include('../index/connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM song WHERE SongID =$id";
if ($connect->query($sql) === TRUE) {
    echo "<script>alert('Deleted successfully!')</script>";
} else {
    echo"<script> alert ('Delete failed!')</script>";
}
    echo"<script>window.open('managesong.php','_self')</script>";
}
?>

