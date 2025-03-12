<?php
ini_set("display_errors", "1");
include '../connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url('manali.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    #label {
        word-spacing: 2px;
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 12px;
        margin-bottom: 0;
        font-family: 'Public Sans';
    }

    #btnn {
        background: linear-gradient(to right,rgb(203, 222, 165),rgb(125, 218, 125),rgb(122, 127, 215));
    }
</style>

<body>
    <div class="container m-auto pt-4 w-75">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-lg-5 col-xl-7">
                <div class="card text-black" style="box-shadow: 0px 1px 30px 5px rgba(0, 0, 0, 0.25);">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="text-center">
                                <img src="https://www.kaipron.com/gall/logo.png"
                                    style="width: 155px;" alt="logo">
                                <h5 class="mb-2 pt-4" style="color:rgb(87, 107, 140);font-weight: 600">Welcome to kaipron 👋</h5>
                                <p class="mb-4 pb-2" style="font-size: 14px; color:rgb(115, 136, 153);">Please create your account </p>
                            </div>
                            <div class="col-md-4 col-lg-11">
                                <?php
                                if (isset($_POST['register'])) {
                                    extract($_POST);
                                    if (strlen($username) < 3) {
                                        $error[] = 'Please enter atleast 5 letters';
                                    }
                                    if (strlen($username) > 20) {
                                        $error[] = 'Max 20 letters allowed !!';
                                    }
                                    if (!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)) {
                                        $error[] = 'Invalid username !! Please enter without space or any special letter';
                                    }
                                    if (strlen($email) > 50) {
                                        $error[] = 'Max 50 letters allowed !!';
                                    }
                                    if (strlen($password) < 5) {
                                        $error[] = 'Password must be 6 letter long';
                                    }
                                    if (strlen($password) > 20) {
                                        $error[] = 'Max 20 letters allowed !!';
                                    }
                                    if ($password != $confirmpass) {
                                        $error[] = 'Password do not match. Please enter again.';
                                    }
                                    $sql = "select * from adminData where (username='$username' or email='$email');";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);

                                        if ($username == $row['username']) {
                                            $error[] = 'Username already Exists.';
                                        }
                                        if ($email == $row['email']) {
                                            $error[] = 'Email already Exists';
                                        }
                                    }
                                    if (!isset($error)) {
                                        $options = array("cost" => 4);
                                        $password = password_hash($password, PASSWORD_BCRYPT, $options);
                                        $res = mysqli_query($conn, "Insert into adminData(username,email,password,confirm_password) values ('" . $username . "','" . $email . "','" . $password . "','" . $confirmpass . "')");

                                        if ($res) {
                                            $done = 1;
                                        } else {
                                            $error[] = 'Something went wrong';
                                        }
                                    }
                                }
                                ?>

                                <?php if (isset($done)) { ?>

                                    <h2>You have registered Successfully <a href="login.php">Login here</a></h2>

                                <?php } else { ?>

                                    <form method="POST">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label id="label" class="form-label">Username</label>
                                                <input type="text" name="username" value="<?php if (isset($error)) {
                                                                                                echo $username;
                                                                                            } ?>" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label id="label" class="form-label">Email</label>
                                                <input type="email" name="email" value="<?php if (isset($error)) {
                                                                                            echo $email;
                                                                                        } ?>" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label id="label" class="form-label">Password</label>
                                                <input type="password" name="password" required value="<?php if (isset($error)) {
                                                                                                            echo $password;
                                                                                                        } ?>" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <label id="label" class="form-label">Confirm password</label>
                                                <input type="password" name="confirmpass" required value="<?php if (isset($error)) {
                                                                                                                echo $confirmpass;
                                                                                                            } ?>" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center my-4">
                                            <button id="btnn" type="submit" name="register" data-mdb-button-init data-mdb-ripple-init
                                                class="btn w-100 text-white">Sign-up</button>
                                        </div>

                                    </form>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- 
    <?php

    if (isset($error)) {
        foreach ($error as $errorr)
            echo '<script>alert("' . $errorr . '")</script>';
    }
    ?> -->


    <!-- <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script>

        $(document).ready(function () {
            $(document).on('click', '#btn', function () { 
                var username = $('#loginName').val();
                var password = $('#loginPassword').val();
            });
        })  


        // Document is ready 
        $(document).ready(function () {

            // Validate Username 
            $("#usercheck").hide();
            let usernameError = true;
            $("#usernames").keyup(function () {
                validateUsername();
            });

            function validateUsername() {
                let usernameValue = $("#usernames").val();
                if (usernameValue.length == "") {
                    $("#usercheck").show();
                    usernameError = false;
                    return false;
                } else if (usernameValue.length < 3 || usernameValue.length > 10) {
                    $("#usercheck").show();
                    $("#usercheck").html("**length of username must be between 3 and 10");
                    usernameError = false;
                    return false;
                } else {
                    $("#usercheck").hide();
                }
            }

            // Validate Email 
            const email = document.getElementById("email");
            email.addEventListener("blur", () => {
                let regex =
                    /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
                let s = email.value;
                if (regex.test(s)) {
                    email.classList.remove("is-invalid");
                    emailError = true;
                } else {
                    email.classList.add("is-invalid");
                    emailError = false;
                }
            });

            // Validate Password 
            $("#passcheck").hide();
            let passwordError = true;
            $("#password").keyup(function () {
                validatePassword();
            });
            function validatePassword() {
                let passwordValue = $("#password").val();
                if (passwordValue.length == "") {
                    $("#passcheck").show();
                    passwordError = false;
                    return false;
                }
                if (passwordValue.length < 3 || passwordValue.length > 10) {
                    $("#passcheck").show();
                    $("#passcheck").html(
                        "**length of your password must be between 3 and 10"
                    );
                    $("#passcheck").css("color", "red");
                    passwordError = false;
                    return false;
                } else {
                    $("#passcheck").hide();
                }
            }



            // Submit button 
            $("#submitbtn").click(function () {
                validateUsername();
                validatePassword();
                validateConfirmPassword();
                validateEmail();
                if (
                    usernameError == true &&
                    passwordError == true &&
                    confirmPasswordError == true &&
                    emailError == true
                ) {
                    return true;
                } else {
                    return false;
                }
            });
        });
    </script> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>