<!-- Sign up form -->
<form method="POST">
                <div class="modal" id="Signup">
                    <div class="modal-dialog modal-dialog-centered .modal-fullscreen-sm-down">
                        <div class="modal-content mt-2">
                          <div class="row d-flex justify-content-center align-items-center">
                            <div class="cards bg-dark text-white">
                                <div class="cards-body p-4 p-md-5">
                                <h2 class="fw-bold">Sign up</h2>
                                <p class="text-white-50 mb-5">Please fill in the form below!</p>  
                            <form>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="first_name" class="form-control form-control-lg" required/>
                                            <label class="form-label" >First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="last_name" class="form-control form-control-lg" required/>
                                            <label class="form-label" >Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <input type="email" name="email" class="form-control form-control-lg" required/>
                                            <label  class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <p>Gender</p>
                                        <div class="check-gender">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="option1" checked/>
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="option2" checked/>
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender" value="option3" checked/>
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>   -->
                                <div class="row">
                                    <div class="mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="user_name" class="form-control form-control-lg" checked/>
                                            <label class="form-label" for="emailAddress">User Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-4">
                                        <div class="form-outline">
                                            <input type="password" name="password" class="form-control form-control-lg" checked/>
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 ">
                                        <div class="form-outline">
                                            <input type="tel" name="phone_number" class="form-control form-control-lg" required/>
                                            <label class="form-label" for="phoneNumber">Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 ">
                                        <div class="form-outline">
                                            <input type="text" name="address" class="form-control form-control-lg" required/>
                                            <label class="form-label" for="firstName">Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to <a href="">Terms</a> and <a href="">Conditions</a> of TuneSource.Corp
                                        </label>
                                </div>
                                <div class="check-submit">
                                    <button class="btn btn-outline-light btn-lg px-5 m-3" type="submit" name="sign_up">Sign Up</button>
                                </div>
                            </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
            </div>
</form>
        <?php
            include("connect.php");
            if(isset($_POST['sign_up']))
            {
            $username = $_POST['user_name'];
            $password = $_POST['password'];
            $firstname = $_POST['first_name'];
            $lastname = $_POST['last_name'];
            $phonenumber = $_POST['phone_number'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $sql = "INSERT INTO `user` VALUES (NULL,'$username','$password','$firstname $lastname',NULL,NULL,'$phonenumber','$address','$email',NULL, NULL);";
            $result = mysqli_query($connect, $sql);
            if($result>0) {
                echo"<script>alert('Register successfully!')</script>";
                echo"<script>window.open('../index/index.php','_self')</script>";
                } 
            else 
                {
                echo "<script>alert('Register faied because this 'User Name' has already exited!')</script>";
                }
            }
        ?>
