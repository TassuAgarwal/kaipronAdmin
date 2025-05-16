<?php
session_start();
ini_set("display_errors", "1");
error_reporting(1);
include '../../connection.php';
?>

<!DOCTYPE html>
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
    table {
        /* background-color: gray; */
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid rgb(209, 206, 206);
        text-align: center;
        padding: 8px;
    }

</style>

<body>
    <?php include '../layout.php' ?>

    <section id="content">

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Products</h1>
                </div>
                <a href="addProduct.php" class="btn-download">
                    <span class="text">Add New product</span>
                </a>
            </div>


            <table class="pt-4 mt-4">
                <tr>
                    <th>S. No.</th>
                    <th>Product Name</th>
                    <th>Desc</th>
                    <th>Image</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>

                <?php
                $query = "SELECT * FROM product";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {

                    $serialNumber = 1;

                    while ($row = mysqli_fetch_assoc($result)) {

                        $id = $row['product_id'];
                        $name = $row['product_name'];
                        $desc = $row['description'];
                        $image = $row['image'];
                        $model = $row['model'];
                        $price = $row['price'];
                        $category = $row['category'];
                ?>
                        <tr>
                            <td><?php echo  $serialNumber++ ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $desc; ?></td>
                            <td><img src="../../Assets/images/products/<?php echo $image; ?>" height="80" width="80" alt="<?php echo $image; ?>"></td>
                            <td><?php echo $model; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $category; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "Not found.";
                }
                ?>
            </table>

        </main>

    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a class="btn btn-danger text-light text-decoration-none" id="deleteCat" href="#">Yes</a>
            </div>
        </div>
    </div>
</div>


    <script language="Javascript">
        function deleteId(product_id) {
            var del = document.getElementById('deleteCat').setAttribute("href", "delete.php?product_id=" + product_id);
        }
    </script>

    <script src="../script.js"></script>

    <!-- jQuery (Required for Bootstrap 4) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Popper.js (Required for Bootstrap Modals) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>

</html>