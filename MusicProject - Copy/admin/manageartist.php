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
	<title>Management Artist</title>
</head>
<?php
include("header.php");
?>
<!-- Function -->
<div class="container mt-1">
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm">
    <thead>
	<tr>
		<th>Artist ID</th>
		<th>Artist Name</th>
		<th>Artist Image</th>
        <th>Artist Description</th>
        <th colspan="3">Function</th>
	 </tr>
    <thead>
    <tbody>
	 	<?php 
	 	include('../index/connect.php');
	 	$sql = "SELECT * FROM artist ";
		$result = mysqli_query($connect, $sql);
		while($row= mysqli_fetch_array($result)){
   			$artist_id = $row['ArtistID'];
   			$artist_name = $row['ArtistName'];
   			$artist_image = $row['ArtistImage'];
   			$artist_description = $row['ArtistDescription'];
			?>
		<tr>
			<td> <?php echo $artist_id ?></td>
			<td> <?php echo $artist_name ?></td>
			<td> <img src="../image/<?php echo $artist_image ?>" style ="width: 100px;"></td>
            <td> <?php echo $artist_description ?></td>
            <td> <a href="editartist.php?id=<?php echo $artist_id ?>" class="btn btn-warning">Edit</a></td>
			<td> <a href="deleteartist.php?id=<?php echo $artist_id ?>"class="btn btn-danger">Delete</a></td>
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