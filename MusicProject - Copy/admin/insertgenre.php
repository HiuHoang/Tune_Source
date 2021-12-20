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
    <title>Insert Artist</title>
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
                    <td>Genre Name</td>
                    <td>
                        <input type="text" name="genre_name">
                    </td>
                </tr>
                <tr>
                    <td>Genre Description</td>
                    <td>
                        <textarea name="genre_description" id=""></textarea>
                    </td>
                </tr>
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
    $genre_name = $_POST['genre_name'];
    $genre_description = $_POST['genre_description'];  
    // Getting the image from the field
  
    $genre_image  = $_FILES['genre_image']['name'];
    $genre_image_tmp = $_FILES['genre_image']['tmp_name'];
    move_uploaded_file($genre_image_tmp,"../image/$genre_image");  

    $sql = " INSERT INTO genre VALUES (NULL,'$genre_name','$genre_description') ";

    $insert_pro = mysqli_query($connect, $sql);
    
    if($insert_pro){
    echo "<script>alert('<?php echo'$genre_name'?> has been inserted successfully!')</script>";
    echo "<script>window.open('managegenre.php','_self')</script>";
    }
    else{
    echo "<script>alert('Failed!<?php echo'$genre_name'?>')</script>";
    }
    
    }
?>
</body>
</html>