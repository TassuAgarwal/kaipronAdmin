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
    <title>Gallery</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>
    <link rel="stylesheet" href="../style.css">

</head>

<style>
  
    .tz-gallery {
        padding: 40px;
    }

    .tz-gallery .row>div {
        padding: 2px;
    }

    .tz-gallery img {
        width: 95%;
        height: 17vw;
        border-radius: 5%;
    }

</style>

<body>
    <?php include '../layout.php' ?>

    <section id="content">
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Gallery</h1>
                </div>
                <a href="addimg.php" class="btn-download">
                    <span class="text">Add New Image</span>
                </a>
            </div>

            <div class="tz-gallery">
                <div class="row">

                    <?php
                    $query = "SELECT * FROM gallery";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {


                            $image = $row['gallery_image'];
                    ?>

                                <div class="col-sm-12 col-md-4">
                                    <img src="../../Assets/images/gallery/<?php echo $image; ?>" alt="<?php echo $image; ?>">
                                </div>
                            
                    <?php
                        }
                    } else {
                        echo "No gallery images found.";
                    }
                    ?>

                </div>
            </div>
        </main>
    </section>
 
    <script src="../script.js"></script>


</body>

</html>

 