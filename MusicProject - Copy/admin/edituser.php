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
    <title>Edit User Account</title>
</head>
<body>
    <?php
        include("header.php");
        include ('../index/connect.php');
        $id=$_GET['id'];
        $query=mysqli_query($connect,"SELECT * from user where UserID='$id'");
        $row=mysqli_fetch_assoc($query);
        ?>
<div class="container mt-1">
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm ">
    <thead>
	<tr>
		<th>User Name</th>
		<th>User Password</th>
        <th>Full Name</th>
		<th>User Image</th>
		<th>Card Number</th>
		<th>Phone Number</th>
        <th>Address</th>
		<th>Email</th>
		<th>ID Number</th>
        <th>Role</th>
        <th>Function</th>
	 </tr>
    <thead>
    <tbody>
    <form method="POST" class="form">
    <td> <input type="text" value="<?php echo $row['UserName']; ?>" name="username"></td>
    <td> <input type="text" value="<?php echo $row['UserPassword']; ?>" name="userpassword"></td>
    <td> <input type="text" value="<?php echo $row ['FullName']?>" name ="fullname"></td>
	<td> <input type="file" value="../image/<?php echo $row['UserImage']?>" name ="userimage"></td>
    <td> <input type="text" value="<?php echo $row['CardNumber']?>" name ="cardnumber"></td>
	<td> <input type="text" value="<?php echo $row ['PhoneNumber']?>" name ="phonenumber"></td>
    <td> <input type="text" value="<?php echo $row['Address']?>" name ="address"></td>
	<td> <input type="email" value="<?php echo $row['Email']?>" name ="email"></td>
	<td> <input type="text" value="<?php echo $row['IDNumber']?>" name ="idnumber"></td>
    <td> <input type="text" value="<?php echo $row['Role']?>" name ="role"></td>
    <td> <input type="submit" value="Update" name="update_user"> </td>
<?php
    if (isset($_POST['update_user'])){
            $id=$_GET['id'];
            $username=$_POST['username'];
            $userpassword=$_POST['userpassword'];
            $fullname = $_POST['fullname'];
			$user_image = $_POST['userimage'];
   			$card_number = $_POST['cardnumber']; 
            $phone_number=$_POST['phonenumber'];
			$address = $_POST['address']; 
			$email = $_POST['email']; 
   			$id_number = $_POST['idnumber'];
			$role = $_POST['role'];

include('../index/connect.php');

$sql = "UPDATE user SET UserName ='$username', UserPassword ='$userpassword', FullName ='$fullname', UserImage = '$user_image', CardNumber ='$card_number', PhoneNumber='$phone_number', Address ='$address', Email ='$email', IDNumber ='$id_number', Role ='$role' WHERE UserID ='$id'";

if ($connect->query($sql) === TRUE) {
echo "<script>alert('Record updated successfully')</script>";
} else {
echo "Error updating record: " . $connect->error;
}
echo"<script>window.open('manageuser.php','_self')</script>";
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