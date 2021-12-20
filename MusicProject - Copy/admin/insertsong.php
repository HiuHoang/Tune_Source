<!DOCTYPE html>
<html lang="en">
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
    <title>Insert Song</title>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div class="container mt-1 m">
    <div class="table-responsive">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table table-borderer table-striped table-hover m-3">
                <tbody>
                <tr>
                    <td>Song Name</td>
                    <td>
                        <input type="text" name="song_name">
                    </td>
                </tr>
                <tr>
                    <td>Song Price</td>
                    <td>
                        <input type="text" name="song_price">($)
                    </td>
                </tr>
                <tr>
                    <td>Song Image</td>
                    <td>
                        <input type="file" name="song_image">
                    </td>
                </tr>
                <tr>
                    <td>Song Audio</td>
                    <td>
                        <input type="file" name="song_audio">
                    </td>
                </tr>
                <tr>
                    <td>Song Lyric</td>
                    <td>
                        <textarea name="song_lyric" id="" cols="100" rows="4"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Song Description</td>
                    <td>
                        <textarea name="song_description" id="" cols="100" rows="4"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Genre</td>
                    <td>
                        <select name="genre_id" id="">
                            <?php 
                                $sql = "SELECT * FROM genre";
                                $result = mysqli_query($connect, $sql);
                                while($row= mysqli_fetch_array($result)) 
                            {
                                $GenreID = $row['GenreID'];
                                $GenreName = $row['GenreName'];
                            ?>
                                <option <?php  echo "selected=\"selected\"";  ?>> <?php echo $GenreID ." - $GenreName" ?> </option> 
                            <?php
                            }
                            ?> 
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Artist</td>
                    <td>
                        <select name="artist_id" id="">
                            <?php 
                            $sql = "SELECT * FROM artist";
                            $result = mysqli_query($connect, $sql);
                            while($row= mysqli_fetch_array($result)) 
                            {
                                $ArtistID = $row['ArtistID'];
                                $ArtistName = $row['ArtistName'];
                            ?>
                                <option <?php echo "selected=\"selected\"";  ?>> <?php echo $ArtistID ." - $ArtistName" ?> </option> 
                            <?php
                            }
                            ?> 
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="insert" class="btn btn-success" value="Insert">
                    </td>
                </tr>
            </tbody>
            </table>
    
        </form>
    </div>
</div>
    <?php
    include ('../index/connect.php');
    if(isset($_POST['insert'])){
    $song_name = $_POST['song_name'];
    $song_price = $_POST['song_price'];
    $song_lyric = $_POST['song_lyric'];
    $song_description = $_POST['song_description'];  
    $genre_id = $_POST['genre_id'];
    $artist_id = $_POST['artist_id'];
    // Getting the image from the field
  
    $song_image  = $_FILES['song_image']['name'];
    $song_image_tmp = $_FILES['song_image']['tmp_name'];
    move_uploaded_file($song_image_tmp,"../image/$song_image");  

    $song_audio  = $_FILES['song_audio']['name'];
    $song_audio_tmp = $_FILES['song_audio']['tmp_name'];
    move_uploaded_file($song_audio_tmp,"../audio/$song_audio"); 

    $sql = " INSERT INTO song VALUES (NULL,'$song_name','$song_price','$song_image','$song_audio','$song_lyric','$song_description', '$genre_id', '$artist_id') ";

    $insert_pro = mysqli_query($connect, $sql);
    
    if($insert_pro){
    echo "<script>alert('<?php echo'$song_name'?> has been inserted successfully!')</script>";
    echo "<script>window.open('managesong.php','_self')</script>";
    }
    else{
    echo "<script>alert('Failed!<?php echo'$song_name'?>')</script>";
    }
    
    }
?>
</body>
</html>