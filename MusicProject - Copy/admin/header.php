<?php
    include("../index/navbar.php"); 
?>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
<!--SubSearch-->
            <div class="collapse navbar-collapse bg-dark navbar-dark">             
              <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link active " href="../index/admin.php">Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../index/index.php">View Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Adding</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../admin/insertsong.php">New Song</a></li>
                      <li><a class="dropdown-item" href="../admin/insertgenre.php">New Genre</a></li>
                      <li><a class="dropdown-item" href="../admin/insertartist.php">New Artist</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Management</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../admin/manageuser.php">Account</a></li>
                      <li><a class="dropdown-item" href="../admin/managesong.php">Song</a></li>
                      <li><a class="dropdown-item" href="../admin/managegenre.php">Genre</a></li>
                      <li><a class="dropdown-item" href="../admin/manageartist.php">Artist</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="">Ranking</a></li>
                    </ul>
                  </li>
            </div>
<!-- Search -->
            <div class="collapse navbar-collapse" style="margin-right:10px" id="navleft">
              <nav class="navbar justify-content-center ms-auto">
                <form class="d-flex input-group w-auto">
                  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button class="input-group-text border-0">
                      <span id="search-addon">
                        <ion-icon name="search-sharp" size="large"></ion-icon>
                      </span>
                    </button>
                </form>
              </nav>
            </div>
      </div>
    </nav>
<!-- Ranking -->
<div class="offcanvas offcanvas-start bg-dark text-white " id="ranking">
  <div class="offcanvas-header">
    <h3 class="offcanvas-title ranking-title">TuneSource's top 10 today</h3>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <div class="row">
      <div class="ranking">
      <ol class="ranking-number">
          <?php
          include("../index/connect.php");
          $sql = "SELECT * FROM genre,song,artist WHERE song.GenreID = genre.GenreID AND song.ArtistID=artist.ArtistID ";
          $result = mysqli_query($connect, $sql);
          while($row =mysqli_fetch_array($result))
          {
          $SongID = $row['SongID'];
          $SongName = $row['SongName'];
          $Price =$row['Price'];
          $SongAudio =$row['SongAudio'];
          $SongImage=$row['SongImage'];
          $SongDescription = $row['SongDescription'];
          $SongLyric = $row['SongLyric'];
          $ArtistName = $row['ArtistName'];
          ?> 
          <li class="ranking-item">
            <div class="ranking-content">
            <img class="card-img-top" style="width:50px; height: 50px;" src="../image/<?php echo"$SongImage" ?>" alt="song image"> 
            <div class="ranking-content__text">
            <?php 
            echo"
            <a href='../index/detail.php?id=$SongID'>
            <h5>$SongName</h5>
            <h6>$ArtistName</h6>
            </a> 
            "
            ?>
            </div>
            </div>
          </li>
          <?php
          }
          ?>
        </ol>
      </div>  
    </div>
  </div>
    </div>
    </div>