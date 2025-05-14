<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);

include '../../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT username, email, password FROM admindata WHERE username = '$username' OR email = '$username'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) === 1) {
        $row = mysqli_fetch_assoc($res);;

        if (password_verify($password, $row['password'])) {
            $_SESSION["login_sess"] = 1;
            header('Location: ../Dashboard/dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid Password";
        }
    } else {
        $_SESSION['error'] = "User Not Found";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../Backend/Layout/favicon.ico" type="image/x-icon" />
    <title>Login</title>
    <script src="https://kit.fontawesome.com/ba99933381.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap');

    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: rgb(146, 146, 181);
    }

    .gradient-custom-2 {
        background: linear-gradient(to right, rgb(216, 230, 188), rgb(186, 231, 186), rgb(197, 199, 237));
    }

    input::placeholder {
        font-size: 14px;
    }

    #label {
        word-spacing: 2px;
        font-weight: 400;
        letter-spacing: 0.5px;
        font-size: 12px;
        font-family: 'Public Sans';
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
</style>

<body>

    <div class="container p-4 mt-2">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-12">
                <div id="card-border" class="card border-0 rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <?php if (isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger p-1 alert-dismissible fade show w-100" role="alert">
                                        <strong>ERROR!</strong> <?= $_SESSION['error'];
                                                                unset($_SESSION['error']); ?>
                                        <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <div class="text-center">
                                    <img src="https://www.kaipron.com/gall/logo.png" style="width: 155px;" alt="logo">
                                    <h5 class="mb-2 pt-4" style="color:rgb(87, 107, 140);font-weight: 600">Welcome to Kaipron 👋</h5>
                                    <p class="mb-4 pb-2" style="font-size: 14px; color:rgb(115, 136, 153);">Please sign-in to your account</p>
                                </div>

                                <form action="" id="form" method="POST">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="loginName" id="label">EMAIL OR USERNAME</label>
                                        <input type="text" id="loginName" name="username" value="" class="form-control"
                                            placeholder="Enter your email or username" required />
                                    </div>

                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label mb-0 pb-0" for="password" id="label">PASSWORD</label>
                                            <a href="forgetPassword.php" style="text-decoration:none; color:#299e11;">
                                                <small>Forgot Password?</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="loginPassword" class="form-control" name="password"
                                                placeholder="············" required>
                                            <span class="input-group-text cursor-pointer"><i id="passwordIcon" onclick="Password()"
                                                    class="fa-regular text-muted fa-eye-slash"></i></span>
                                        </div>
                                    </div>

                                    <input class="mb-4" type="checkbox"> Remember Me

                                    <button type="submit" name="Subb"
                                        class="btn text-dark w-100 gradient-custom-2 btn-block mb-4">Sign in
                                    </button>

                                    <div class="text-center text-muted mb-0">
                                        <p>New on our Platform? <a href="register.php" style="text-decoration:none; color:#299e11;">Register here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-dark px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">We are the best water solutions.</h4>
                                <p class="small mb-0">At Kaipron, we believe that clean water is essential to life, and we strive to make it accessible to all. Our cutting-edge water purifiers are designed to deliver superior performance, removing impurities, contaminants, and harmful substances to provide you with water that meets the highest quality standards. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function Password() {
            var hideShow = document.getElementById("loginPassword");
            var icon = document.getElementById("passwordIcon")

            if (hideShow.type === "password") {
                hideShow.type = "text";
                icon.className = "text-muted fs-6 fa-regular fa-eye";
            } else {
                hideShow.type = "password";
                icon.className = "fa-regular fa-eye-slash";
            }
        }
    </script>

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#btn', function() {
                event.preventDefault();
                var email = $("#loginName").val();
                var password = $("#loginPassword").val();
                var err = false;

                // Email
                if (email === "") {
                    err = true;
                    $("#errorEmail").html("* Required Field");
                } else {
                    $("#errorEmail").html("");
                }

                // Password
                if (password === "") {
                    err = true;
                    $("#errorPass").html("* Required Field");
                } else {
                    err = false;
                    $("#errorPass").html("");
                }
                // button
                if (err === true) {
                    return false;
                }
                if (!err) {
                    $("#form").submit();
                }
            });
        })
    </script>

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