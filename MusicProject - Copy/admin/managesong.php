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
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/sign.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/admin.css">
	<title>Manage Song</title>
</head>
<body>
   <?php
    include("header.php");
    ?>
<!-- Content -->
<div class="container mt-1">
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover table-sm">
    <thead>
	<tr>
		<th>Song Name</th>
		<th>Price ($)</th>
		<th>Song Images</th>
        <th>Genre Name</th>
		<th>Artist Name</th>
        <th>Artist Image</th>
        <th>Lyric</th>
        <th>Audio</th>
        <th>Song Description</th>
        <th colspan="3">Function</th>
	 </tr>
    <thead>
    <tbody>
	 	<?php 
	 	include("../index/connect.php");
        $sql = "SELECT * FROM genre,song,artist WHERE song.GenreID = genre.GenreID AND song.ArtistID=artist.ArtistID";
		$result = mysqli_query($connect, $sql);
		while($row= mysqli_fetch_array($result)){
            $song_id = $row['SongID'];
   			$song_name = $row['SongName'];
   			$song_price = $row['Price'];
   			$song_image = $row['SongImage'];
            $genre_name = $row['GenreName'];
   			$artist_name = $row['ArtistName'];
            $artist_image = $row['ArtistImage'];
            $song_lyric = $row['SongLyric'];
            $song_audio = $row['SongAudio'];
            $song_description = $row['SongDescription']; 
			?>
		<tr>
			<td> <?php echo $song_name ?></td>
			<td> <?php echo $song_price ?></td>
			<td> <img src="../image/<?php echo $song_image ?>" style ="width: 100px;"></td>
            <td> <?php echo $genre_name ?></td>
			<td> <?php echo $artist_name ?></td>
            <td> <img src="../image/<?php echo $artist_image ?>" style ="width: 100px;"></td>
            <td> <?php echo $song_lyric ?></td>
            <td>
            <audio controls controlsList="nodownload" ontimeupdate="MyAudio(this)" style="width:150px">
            <source src="../audio/<?php echo $song_audio?>" type="audio/mpeg" >
            </audio>
            </td>
            <td> <?php echo $song_description ?></td>
            <td> <a href="editsong.php?id=<?php echo $song_id ?>" class="btn btn-warning">Edit</td>
			<td> <a href="deletesong.php?id=<?php echo $song_id ?>" class="btn btn-danger">Delete</td>
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