<!DOCTYPE html>
<html lang="en">
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
    <title>TuneSource.com</title> 
</head>
<body>
<?php
include('connect.php');
include('navbar.php');
include('search.php');
$search = "";
if( !empty($_GET['Search'])){
  $search = $_GET['Search'];
}
?>
<h5 class="title mt-5 px-5">Search results for keyword: <i>'<?= $search ?>'</i></h5>
<div class="container">
<div class="row">
    <?php
    if( !empty($search)) {
      $rs = mysqli_query( $connect ,"SELECT * FROM song,artist,genre WHERE song.SongName LIKE '%{$search}%' and song.artistID= artist.ArtistID and song.GenreID= genre.GenreID ");
      while($row = mysqli_fetch_assoc($rs))
      {
    ?>
    <div class="col-lg-2 col-md-3 col-sm-4 col-6">
      <div class="card card-product mt-3 mb-3">
    <!-- <div class="cards" style="background-color: white; margin-top: 20px; margin-left: 35px; overflow: auto; width: 200px; border: 2px solid #a40b8c; border-radius: 5px; float: left;"> -->
      <a href="detail.php?id=<?php echo $row['SongID']?>">
        <img class="card-img-top image-resize" src="../image/<?php echo $row['SongImage']?>" >
        <div class="card-body">
          <h5><?php echo $row['SongName'] ?></h5>
          <p style="color: red"><?php echo $row['Price']." $"; ?></p>
          <p><?php echo $row['ArtistName'] ?></p>
          <p><?php echo $row['GenreName'] ?></p>
        </div>
      </a>
      </div>
  </div>
    <?php
     }
    }
    ?>
</div>
</div>
</body>
</html>