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
    <title>Profile</title> 
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
            $sql = "SELECT * FROM user WHERE UserID = {$id}";
            $result = mysqli_query($connect, $sql);
            $row= mysqli_fetch_assoc($result);
        ?>
        <div class="col-md-4 summary">
            <img class="image_posision rounded-circle mb-3" src="../image/<?php echo $row['UserImage'] ?>">
            <table class="m-auto">
                <tr>
                    <td>User Name:</td>
                    <td><h2><?php echo $row['UserName']?></h2></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><h2><?php echo $row['UserPassword']?></h2></td>
                </tr>
                <tr>
                    <td colspan="2"><a href="profileedit.php?id=<?php echo $id ?>" class="btn btn-warning px-5 mt-2"><ion-icon name="brush-outline"></ion-icon> Edit profile</a></td>
                </tr>
            </table>
        </div>
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                        <div id="accordion">
                            <div class="cards">
                                <div class="card-header">
                                    <a class="btn" data-bs-toggle="collapse" href=""><b>Full Name:</b> <span class="badge rounded-pill bg-primary"><?php echo $row['FullName']?><span></a>
                                </div>
                            </div>
                            <div class="cards">
                                <div class="card-header">
                                    <a class="btn" data-bs-toggle="collapse" href=""><b>Card Number:</b> <span class="badge rounded-pill bg-primary"><?php echo $row['CardNumber']?><span></a>
                                </div>
                            </div>
                            <div class="cards">
                                <div class="card-header">
                                    <a class="btn" data-bs-toggle="collapse" href=""><b>Phone Number:</b> <span class="badge rounded-pill bg-primary"><?php echo $row['PhoneNumber']?><span></a>
                                </div>
                            </div>
                            <div class="cards">
                                <div class="card-header">
                                    <a class="btn" data-bs-toggle="collapse" href=""><b>Address:</b> <span class="badge rounded-pill bg-primary"><?php echo $row['Address']?><span></a>
                                </div>
                            </div>
                            <div class="cards">
                                <div class="card-header">
                                    <a class="btn" data-bs-toggle="collapse" href=""><b>Email:</b> <span class="badge rounded-pill bg-primary"><?php echo $row['Email']?><span></a>
                                </div>
                            </div>
                            <div class="cards">
                                <div class="card-header">
                                    <a class="btn" data-bs-toggle="collapse" href=""><b>ID Number:</b> <span class="badge rounded-pill bg-primary"><?php echo $row['IDNumber']?><span></a>
                                </div>
                            </div>
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