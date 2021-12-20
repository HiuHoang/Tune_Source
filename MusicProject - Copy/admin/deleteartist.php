<?php
include('../index/connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM artist WHERE ArtistID =$id";
if ($connect->query($sql) === TRUE) {
    echo "<script>alert('Deleted successfully!')</script>";
} else {
    echo"<script> alert ('Delete failed because this genre still has songs in the store!')</script>";
}
echo"<script>window.open('manageartist.php','_self')</script>";
}
?>
<?php 