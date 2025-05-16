<?php
session_start();
ini_set("display_errors", "1");
error_reporting(1);
include '../../connection.php';

if (isset($_POST['add_product'])) {

    $product_name = $_POST['product_name'];
    $desc = $_POST['description'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $file = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    $folder = '../../Assets/images/products/';

    if (move_uploaded_file($file, $folder . $file_name)) {

        $query = mysqli_query($conn, "Insert into product (Product_name, description, model,price,category,image) values ('" . $product_name . "', '" . $desc . "', '" . $model . "', '" . $price . "', '" . $category . "', '" . $file_name . "')");
        $_SESSION['status'] = "Inserted successfully";
        header("location:product.php");
    } else {
        $_SESSION['error'] = "Failed to Enter data";
        header("location:product.php");
        echo "<h3>  Failed to upload image!</h3>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<style>
    #form {
        padding: 4vw 3vw;
    }

    .dropzone-wrapper {
        border: 2px dashed #91b0b3;
        color: #92b0b3;
        position: relative;
        width: 100%;
        height: 120px;
    }

    .dropzone-desc {
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        text-align: center;
        width: 45%;
        top: 20px;
        font-size: 16px;
    }

    .dropzone,
    .dropzone:focus {
        /* position: absolute; */
        outline: none !important;
        width: 100%;
        height: 100px;
        cursor: pointer;
        opacity: 0;
    }

    .dropzone-wrapper:hover,
    .dropzone-wrapper.dragover {
        background: #ecf0f5;
    }

    .preview-zone {
        text-align: center;
        padding-left: 40px;
    }

    .preview-zone .box {
        box-shadow: none;
        border-radius: 100;
        margin-bottom: 0;
    }

    .preview-zone .box-body img {
        width: 8vw;
        height: 8vw;
        border-radius: 100px;
    }

    #label {
        word-spacing: 2px;
        font-weight: 400;
        letter-spacing: 1px;
        font-size: 14px;
        font-family: 'Public Sans';
    }

    .Submit-btn {
        height: 36px;
        padding: 20px 50px;
        border: none;
        background: var(--blue);
        color: var(--light);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        grid-gap: 10px;
        font-weight: 500;
    }
</style>

<body>

    <?php
    include('../layout.php'); ?>

    <section id="content">
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Product</h1>
                </div>
                <a href="product.php" class="btn-download">
                    <span class="text">Back</span>
                </a>
            </div>

            <?php
            if (isset($_SESSION['status'])) { ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Yay!</strong> <?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['status']);
            }
            ?>

            <?php
            if (isset($_SESSION['error'])) { ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR !</strong> <?php echo $_SESSION['error']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['error']);
            }
            ?>

            <form action="addProduct.php" method="POST" id="form" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-6 mb-4">
                        <label class="col-sm-6 col-form-label" id="label" for="basic-default-name">Product
                            Name</label>
                        <div class="col">
                            <input type="text" class="form-control" name="product_name" id="ProName"
                                placeholder="Enter Product Name">
                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <label class="col-sm-6 col-form-label" id="label" for="basic-default-name">Product
                            Description</label>
                        <div class="col">
                            <input type="text" class="form-control" name="description" id="ProDesc"
                                placeholder="Enter Description">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mb-4">
                        <label class="col-sm-6 col-form-label" id="label" for="basic-default-name">Product
                            Model</label>
                        <div class="col">
                            <input type="text" class="form-control" name="model" id="ProName"
                                placeholder="Enter Product Model">
                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <label class="col-sm-6 col-form-label" id="label" for="basic-default-name">Product
                            Price</label>
                        <div class="col">
                            <input type="text" class="form-control" name="price" id="ProDesc"
                                placeholder="Enter Product Price">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mb-4">
                        <label class="col-sm-6 col-form-label" id="label" for="basic-default-name">Product
                            category</label>
                        <div class="col">
                            <input type="text" class="form-control" name="category" id="ProName"
                                placeholder="Enter Product Price">
                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <label class="col-sm-6 col-form-label" id="label" for="basic-default-name">Upload Image</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group d-flex mb-0">
                                        <div class="dropzone-wrapper" id="drop">
                                            <div class="dropzone-desc">
                                                <i class="glyphicon glyphicon-download-alt"></i>
                                                <p>Choose an image file or drag it here.</p>
                                            </div>
                                            <input type="file" id="inputImage" name="image"
                                                class="dropzone">
                                        </div>
                                        <div class="preview-zone hidden">
                                            <div class="box box-solid">
                                                <div class="box-body"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="add_product" class="Submit-btn">
                    Add
                </button>
            </form>
        </main>
    </section>


    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script>
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var htmlPreview =
                        '<img width="200" src="' + e.target.result + '" />' +
                        '<p>' + input.files[0].name + '</p>';
                    var wrapperZone = $(input).parent();
                    var previewZone = $(input).parent().parent().find('.preview-zone');
                    var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                    wrapperZone.removeClass('dragover');
                    previewZone.removeClass('hidden');
                    boxZone.empty();
                    boxZone.append(htmlPreview);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function reset(e) {
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
        }

        $(".dropzone").change(function() {
            readFile(this);
        });

        $('.dropzone-wrapper').on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });

        $('.dropzone-wrapper').on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });

        $('.remove-preview').on('click', function() {
            var boxZone = $(this).parents('.preview-zone').find('.box-body');
            var previewZone = $(this).parents('.preview-zone');
            var dropzone = $(this).parents('.form-group').find('.dropzone');
            boxZone.empty();
            previewZone.addClass('hidden');
            reset(dropzone);
        });
    </script>

    <script>
        var input = document.getElementById('inputImage');
        var drop = document.getElementById('drop');

        input.addEventListener('change', () => {
            if (input.files.length > 0) {
                console.log("okok");
                drop.style.pointerEvents = "none";
                drop.style.opacity = "0.5";
                // drop.style.display = "none";
            }
        });
    </script>

    <script src="../script.js"></script>

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