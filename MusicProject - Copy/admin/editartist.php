<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/slide.css">
    <link rel="stylesheet" href="../css/content.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/sign.css">
    <link rel="stylesheet" href="../css/search.css">
    <title>Edit Artist Account</title>
</head>
<body>
    <?php
        include("header.php");
        include ('../index/connect.php');
        $id=$_GET['id'];
        $query=mysqli_query($connect,"SELECT * FROM artist WHERE ArtistID ='$id'");
        $row=mysqli_fetch_assoc($query);
        ?>
<div class="container mt-1">
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm ">
    <thead>
	<tr>
        <th>Artist Name</th>
		<th>Artist Image</th>
        <th>Artist Description</th>
        <th>Function</th>
	 </tr>
    <thead>
    <tbody>
    <form method="POST" class="form">
    <td> <input type="text" value="<?php echo $row['ArtistName']; ?>" name="username" autofocus></td>
    <td> <input type="file" value="../image/<?php echo $row['ArtistImage']?>" name ="userimage"autofocus></td>
    <td> <input type="text" value="<?php echo $row['ArtistDescription']; ?>" name="userpassword"autofocus></td>
    <td> <input type="submit" value="Update" name="update_user" class="btn btn-success"> </td>
<?php
    if (isset($_POST['update_user'])){
            $id=$_GET['id'];
            $user_image = $_POST['userimage'];
            $username=$_POST['username'];
            $userpassword=$_POST['userpassword'];

include('../index/connect.php');

$sql = "UPDATE artist SET ArtistName ='$username', ArtistImage ='$user_image' , ArtistDescription ='$userpassword' WHERE SongID ='$id'";

if ($connect->query($sql) === TRUE) {
echo "<script>alert('Record updated successfully')</script>";
} else {
echo "Error updating record: " . $connect->error;
}
echo"<script>window.open('managesong.php','_self')</script>";
$connect->close();
    } 
?>
</form>
<tbody>	 
    </table>
</div>
</div>
</body>
</html>