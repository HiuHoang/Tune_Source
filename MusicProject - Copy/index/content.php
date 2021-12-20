<div class="container">
  <div class="row mt-5">
    <h2 class="list-product-title" id="newsong">Trending Song</h2>
    <div class="product-group">
      <div class="row">
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
             <div class="col-lg-2 col-md-3 col-sm-4 col-6">
              <div class="card card-product mt-3 mb-3">
                <a href="detail.php?id=<?php echo $SongID?>">
                <img class="card-img-top image-resize" src="../image/<?php echo"$SongImage"?>" alt="song image">
                  <div class="card-body">
                      <?php
                        echo"
                        <h5>$SongName</h5>
                        <p>$ArtistName</p>
                        "?>
                          <audio controls controlsList="nodownload" ontimeupdate="MyAudio(this)" class="audio" >
                            <source src="../audio/<?php echo $SongAudio?>" type="audio/mpeg" >
                          </audio>
                        </a>
                        <!-- Limited time listenning -->
                        <script type="text/javascript">
                        function MyAudio(event)
                        {
                        if(event.currentTime>30)
                          {
                          event.currentTime=0;
                          event.pause();
                          alert("Pay to more!")
                          }
                        }
                        </script>
                  </div>
              </div>
            </div>
          <?php
          }
          ?>
      </div>
    </div>
  </div>
</div>