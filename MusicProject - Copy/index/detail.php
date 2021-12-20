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
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/sign.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/detail.css">
    <title>Details Song</title> 
</head>
<body>
<div class="container-fluid" style="padding: unset">
    <div class="row">
        <?php
        include('navbar.php');
        ?>
    <div class="card">
    <div class="row">
        <?php
            include('connect.php');
            $id = $_GET["id"];
            $sql = "SELECT * FROM song INNER JOIN genre ON song.GenreID = genre.GenreID INNER JOIN artist ON song.ArtistID = artist.ArtistID WHERE SongID = {$id}";
            $result = mysqli_query($connect, $sql);
            $row= mysqli_fetch_assoc($result);
        ?>
        <div class="col-md-4 summary">
            <img class="image_posision rounded-circle mb-3" src="../image/<?php echo $row['SongImage'] ?>"><br>
                <audio controls controlsList="nodownload" ontimeupdate="MyAudio(this)" class="audio_posision">
                    <source src="../audio/<?php echo $row['SongAudio']?>" type="audio/mpeg">
                </audio>
                    <a type="submit" href='cartprocess.php?id=<?php echo $id ?>' class='btn btn-primary mt-3'><ion-icon name="cart-outline"></ion-icon> Add to cart</a>
                    <a type="submit" href='playlist.php?id=<?php echo $id ?>' class="btn btn-danger mt-3 mx-1"><ion-icon name="heart-outline"></ion-icon> Add to list</a>
        </div>
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                    <h2><?php echo $row['SongName']?></h2>
                    <div id="accordion">
                    <div class="cards">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href=""><b>Price: </b> <span class="badge rounded-pill bg-primary"><?php echo $row['Price']?><span> $</a>
                        </div>
                    </div>
                    <div class="cards">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#Genre"><b>Genrre: </b> <span class="badge rounded-pill bg-primary"><?php echo $row['GenreName']?></span></a>
                        </div>
                    <div id="Genre" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <p><?php echo $row["GenreDescription"] ?> </p>
                        </div>
                    </div>
                    </div>
                    <div class="cards">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#Artist"><b>Artist: </b><span class="badge rounded-pill bg-primary"> <?php echo $row['ArtistName']?><span></a>
                        </div>
                    <div id="Artist" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <img src="../image/<?php echo $row['ArtistImage']?>" width="150"; height="auto"; border-radious="3" ><br><br>
                            <p style=""><?php echo $row['ArtistDescription'];?> </p>
                        </div>
                    </div>
                    </div>
                    <div class="cards">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#Lyric"><b>Lyric</b></a>
                        </div>
                    <div id="Lyric" class="collapse show" data-bs-parent="#accordion">
                        <div class="card-body">
                        <p><?php echo $row["SongLyric"] ?> </p>
                        </div>
                    </div>
                    </div>
                </div> 
            </div>
            <script type="text/javascript">
            function MyAudio(event)
            {
                if(event.currentTime>30)
                {
                    event.currentTime=0;
                    event.pause();
                    alert("Pay for more!")
                }
            }
            </script>
                    </div>
                    <div class="col align-self-center text-right text-muted"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
</body>
</html>