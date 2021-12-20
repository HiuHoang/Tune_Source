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
    <title>Edit User Song</title>
</head>
<body>
    <?php
        include("header.php");
        include ('../index/connect.php');
        $id=$_GET['id'];
        $query=mysqli_query($connect,"SELECT * FROM song WHERE SongID='$id'");
        $row=mysqli_fetch_assoc($query);
        ?>
<div class="container mt-1">
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm ">
    <thead>
	<tr>
        <th>Song Name</th>
		<th>Price ($)</th>
		<th>Song Image</th>
        <th>Song Audio</th>
        <th>Song Description</th>
        <th>Lyric</th>
        <th>Function</th>
	 </tr>
    <thead>
    <tbody>
    <form method="POST" class="form">
    <td> <input type="text" value="<?php echo $row['SongName']; ?>" name="username" autofocus></td>
    <td> <input type="text" value="<?php echo $row['Price']; ?>" name="userpassword"autofocus></td>
    <td> <input type="file" value="../image/<?php echo $row['SongImage']?>" name ="userimage"autofocus></td>
    <td> <input type="file" value="../audio/<?php echo $row['SongAudio']?>" name ="songaudio"autofocus></td>
    <td> <input type="text" value="<?php echo $row ['SongDescription']?>" name ="songdescription"autofocus></td>
    <td> <input type="text" value="<?php echo $row ['SongLyric']?>" name ="fullname"autofocus></td>
    <td> <input type="submit" value="Update" name="update_user" class="btn btn-success"> </td>
<?php
    if (isset($_POST['update_user'])){
            $id=$_GET['id'];
            $username=$_POST['username'];
            $userpassword=$_POST['userpassword'];
            $user_image = $_POST['userimage'];
            $user_audio = $_POST['songaudio'];
            $user_description = $_POST['songdescription'];
            $fullname = $_POST['fullname'];

    include('../index/connect.php');

$sql = "UPDATE song SET SongName ='$username', Price ='$userpassword', SongImage ='$user_image',SongAudio ='$user_audio',SongDescription='$user_description', SongLyric = '$fullname' WHERE SongID ='$id'";

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