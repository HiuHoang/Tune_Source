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
    <link rel="stylesheet" href="../css/cart.css">
    <title>My Cart</title> 
</head>
<body>
<div class="container-fluid" style="padding: unset">
    <div class="row">
        <?php
        include('navbar.php');
        ?>
    <div class="card mb-5">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My cart</li>
                        </ol>
                    </nav>
                    <h4><b>Shopping Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted"></div>
                </div>
            </div>
                    <?php
                        include('connect.php');
                        $total_price = 0;
                        $user = (isset($_SESSION['user'])) ? $_SESSION['user']:[];
                        $user_id = $user['UserID'];
                        $sql = "SELECT * from cart where UserID ='$user_id' ";
                        $result = mysqli_query($connect, $sql);
                        $check_user = mysqli_num_rows($result);
                        if ($check_user == 0){
                            echo"<script>alert('Your shopping cart is empty !')</script>";
                            echo"<script>window.open('../index/index.php','_self')</script>";
                        }
                        else {
                            $sql = "SELECT CartID, SongName, SongImage, Price, artist.ArtistName, song.SongID from song, cart, artist where song.SongID = cart.SongID AND song.ArtistID = artist.ArtistID AND UserID ='$user_id'";
                            $result = mysqli_query($connect, $sql);
                            while($row =mysqli_fetch_array($result))
                            {
                            $SongID = $row['SongID'];
                            $SongName = $row['SongName'];
                            $SongImage=$row['SongImage'];
                            $SongPrice = $row['Price'];
                            $ArtistName = $row['ArtistName'];     
                    ?>
                <div class="row border-top">
                    <div class="row main align-items-center">
                        <div class="col-4"><img class="img-fluid" src="../image/<?php echo"$SongImage"?>"></div>
                        <div class="col-4">
                            <div class="row"><?php echo"$SongName"?></div>
                            <div class="row text-muted"><?php echo"$ArtistName"?></div>
                        </div>
                        <div class="col-2"><?php echo "$SongPrice"."$"?></div>
                        <div class="col-2"><a href="cartdelete.php?id=<?php echo "$SongID" ?>"class="btn btn-danger cartdelete">Delete</a></div>
                    </div>
                </div>
                        <?php
                        $total_price += $SongPrice;
                            }
                        }
                        ?>
                <div class="row border-bottom"></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Summary</b></h5>
            </div>
            <hr>
            <form>
                <p>Card number</p> 
                    <input class="text-muted" placeholder="Enter your card number">
                <p>Coupon code</p> <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right"><h2><?php echo $total_price ."$"?></h2></div>
            </div> <button class="btn btn-success">CHECKOUT</button>
        </div>
    </div>
    </div>
    </div>
</div>
</body>
</html>