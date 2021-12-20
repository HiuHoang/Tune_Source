  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
<!--SubSearch-->
            <div class="collapse navbar-collapse bg-dark navbar-dark" id="navbarNavDropdown">             
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#ranking">Ranking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active " href="#newsong">Trending</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Genre</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Pop</a></li>
                    <li><a class="dropdown-item" href="#">Rap</a></li>
                    <li><a class="dropdown-item" href="#">Jazz</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Topic</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">For energetic summer</a></li>
                      <li><a class="dropdown-item" href="#">For warm winter</a></li>
                      <li><a class="dropdown-item" href="#">For lover</a></li>
                      <li><a class="dropdown-item" href="#">For children</a></li>
                    </ul>
                  </li>
              </ul>
            </div>
<!-- Search -->
            <div class="collapse navbar-collapse" style="margin-right:10px" id="navleft">
              <nav class="navbar justify-content-center ms-auto">
                <form class="d-flex input-group w-auto" action="searchresult.php" method="GET">
                  <input type="search" class="form-control" name="Search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button class="input-group-text border-0" name="search">
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
          include("connect.php");
          $sql = "SELECT * FROM genre,song,artist WHERE song.GenreID = genre.GenreID AND song.ArtistID=artist.ArtistID";
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
            <a href='detail.php?id= <?php echo $SongID?>'>
            <div class="ranking-content">
              <div class="ranking-content__image">
                <img class="card-img-top" style="width:50px; height: 50px;" src="../image/<?php echo"$SongImage" ?>" alt="song image"> 
              </div>
              <div class="ranking-content__text">
              <?php 
                echo"
                <h5>$SongName</h5>
                <h6>$ArtistName</h6>
              "?>
              </div>
            </div>
            </a> 
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