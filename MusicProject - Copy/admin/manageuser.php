<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
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
	<title>Management User</title>
</head>
<?php
include("header.php");
?>
<!-- Function -->
<div class="container mt-1">
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm ">
    <thead>
	<tr>
		<th>User ID</th>
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
        <th colspan="2">Function</th>
	 </tr>
    <thead>
    <tbody>
	 	<?php 
	 	include("../index/connect.php");
	 	$sql = "SELECT * FROM user";
		$result = mysqli_query($connect, $sql);
		while($row= mysqli_fetch_array($result)){
   			$user_id = $row['UserID'];
   			$user_name = $row['UserName'];
   			$user_password = $row['UserPassword'];
            $fullname = $row['FullName'];
			$user_image = $row['UserImage'];
   			$card_number = $row['CardNumber']; 
   			$phone_number = $row['PhoneNumber'];
			$address = $row['Address']; 
			$email = $row['Email']; 
   			$id_number = $row['IDNumber'];
			$role = $row['Role'];
			?>
		<tr>
			<td> <?php echo $user_id ?></td>
			<td> <?php echo $user_name ?></td>
            <td> <?php echo $user_password ?></td>
			<td> <?php echo $fullname ?></td>
			<td> <img src="../image/<?php echo $user_image ?>" style ="width: 100px;"></td>
            <td> <?php echo $card_number ?></td>
			<td> <?php echo $phone_number ?></td>
            <td> <?php echo $address ?></td>
			<td> <?php echo $email ?></td>
			<td> <?php echo $id_number ?></td>
            <td> <?php echo $role ?></td>
            <td> <a href="edituser.php?id=<?php echo $user_id ?>" class="btn btn-warning">Edit</a></td>
			<td> <a href="deleteuser.php?id=<?php echo $user_id ?>"class="btn btn-danger">Delete</a></td>
        </tr>
	 		<?php
	 		}
	 		?>
    <tbody>	 
    </table>
</div>
</div>
</body>
</html>