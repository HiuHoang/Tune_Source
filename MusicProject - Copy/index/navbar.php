<?php
 include('connect.php');
 session_start();
 //$user = $_SESSION['user'];
$user = (isset($_SESSION['user'])) ? $_SESSION['user']:[];
?>
<!-- Help form -->
<div class="offcanvas offcanvas-end" id="help">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title">Any question</h3>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <p>Please fill in this form for help</p>
      </div>
</div>
<!-- Main navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navleft">
                <ion-icon name="search-sharp" size="large"></ion-icon>
            </button>
            <a href="index.php" class="navbar-brand"><h3 class="fw-bold">Tu<ion-icon name="musical-notes" class="logo"></ion-icon>eSource</h3></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navright">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navright">
                <ul class="navbar-nav ms-auto">
                    <div class="d-flex justify-content-end">
                        <li class="nav-item">
                            <a href="cart.php" class="nav-link"> <ion-icon name="bag-handle-outline" class="icon-position"></ion-icon>Shopping Cart</a>
                        </li>
                    </div>
                    <div class="d-flex justify-content-end">
                        <li class="nav-item">
                            <a href="#" class="nav-link"><span class="position-relative"><ion-icon name="notifications-outline" class="icon-position"></ion-icon>Notification<span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger p-1"><span class="visually-hidden">unread messages</span></span></span></a>
                        </li>
                    </div>
                    <div class="d-flex justify-content-end">
                        <li class="nav-item dropdown">
                            <a href="" class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#help"><ion-icon name="alert-circle-outline" class="icon-position"></ion-icon>Help</a>
                        </li>
                    </div>
                    <div class="d-flex justify-content-end">
                    <li class="nav-item dropdown">
                        <?php if(isset($user ['UserName'])){?>
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"><?php echo $user['UserName']?></a>
                            <ul class="dropdown-menu ">
                                <?php if(isset($user ['Role'])){?>
                                <li><a class="dropdown-item" href="admin.php">Admin</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                                <?php }else{?>
                                <li><a class="dropdown-item" href="profile.php?id=<?php echo $user['UserID']?>">Profile</a></li>
                                <li><a class="dropdown-item" href="playlist.php">Playlist</a></li>
                                <li><a class="dropdown-item" href="downloaded.php">Downloaded</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                                <?php
                                    }
                                ?>
                            </ul>                  
                        <?php }else{ ?>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#Signup">Sign up</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#Login">Log in</a>
                            </li>
                        <?php
                            }
                        ?>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
include("login.php");
include("register.php");
    ?>

                                  
                              