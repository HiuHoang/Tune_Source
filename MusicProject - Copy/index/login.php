<!-- Log in form -->
<form method="POST">
                <div class="modal" id="Login">
                    <div class="modal-dialog modal-dialog-centered .modal-fullscreen-sm-down">
                        <div class="modal-content mt-2">
                          <div class="row d-flex justify-content-center align-items-center">
                            <div class="cards bg-dark text-white">
                              <div class="card-body p-5 text-center">
                                  <h2 class="fw-bold">LOGIN</h2>
                                  <p class="text-white-50 mb-5">Please enter your username and password!</p>                   
                                  <div class="form-outline form-white mb-4">
                                    <input type="text" name="user_name" placeholder="Username" class="form-control form-control-lg" required/>                              
                                  </div>
                    
                                  <div class="form-outline form-white mb-4">
                                    <input type="password" name="user_password" placeholder="Password" class="form-control form-control-lg" required/>
                                  </div>
                    
                                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
                    
                                  <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>
                    
                                  <div class="d-flex justify-content-center text-center mt-4">
                                    <a href="#!" class="text-white"><ion-icon name="logo-facebook" size="large" class="m-1"></ion-icon></a>
                                    <a href="#!" class="text-white"><ion-icon name="logo-google" size="large" class="m-1"></ion-icon></a>
                                    <a href="#!" class="text-white"><ion-icon name="logo-github" size="large" class="m-1"></ion-icon></a>
                                  </div>
                                  <div>
                                  <p class="mb-0">Don't have an account? <a href="<?php 'register.php'?>" class="text-white-50 fw-bold">Sign Up</a></p>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
</form>

<?php
              include('connect.php');        
                if(isset($_POST['login']))
                {
                $username=$_POST['user_name'];
                $password=$_POST['user_password'];
                $sql ="SELECT * FROM `user` WHERE UserName ='$username' AND UserPassword ='$password'";
                $result= mysqli_query($connect,$sql);
                $data = mysqli_fetch_array($result);
                $check_login= mysqli_num_rows($result);
                if($check_login>0){
                  $_SESSION['user'] = $data;
                  $_SESSION['user_role'] = $data['Role'];
                    if($_SESSION['user_role']=="admin"){
                      echo"<script>alert('Hi Admin!')</script>";
                      echo"<script>window.open('admin.php','_self')</script>";
                    }
                    else{
                    echo"<script>alert('Login successfully!')</script>";
                    echo"<script>window.open('index.php','_self')</script>";
                    }
                }else {
                    echo"<script>alert('Login failed!')</script>";
                }
                }
                ?>
