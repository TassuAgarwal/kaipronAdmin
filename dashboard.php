<?php
session_start();
if (!isset($_SESSION['login_sess'])) {
    header("Location: user/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>AdminHub</title>
</head>

<body>
    <?php include 'layout.php' ?>

    <section id="content">

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <ul class="box-info">
                <li>
                    <i style="background:rgb(214, 253, 214); color: #1aad1b;" class='bx bx-package'></i>
                    <span class="text">
                        <h3>50+</h3>
                        <p>Products</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-badge-check' style="background:#ced0f8; color: #252fe1;"></i>
                    <span class="text">
                        <h3>100%</h3>
                        <p>Best Quality</p>
                    </span>
                </li>
                <li>
                    <i style="background:rgb(214, 253, 214); color: #1aad1b;" class='bx bx-happy-alt'></i>
                    <span class="text">
                        <h3>80+</h3>
                        <p>Happy Client</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle' style="background:#ced0f8; color: #252fe1;"></i>
                    <span class="text">
                        <h3>100%</h3>
                        <p>Valid Prices</p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Most Popular Products</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Price</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <p>Kaipron stark-A</p>
                                </td>
                                <td>(Ksa0944) </td>
                                <td> 13500 INR</td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Spun 10"</p>
                                </td>
                                <td>(Pr62) </td>
                                <td> 75 INR</td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Kaipron inline filter</p>
                                </td>
                                <td>(Kpi06) </td>
                                <td> 450 INR</td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Kaipron pp spun</p>
                                </td>
                                <td>(Kps290) </td>
                                <td>390 INR</td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Dualon-x alkaline ro</p>
                                </td>
                                <td>(Kda0056) </td>
                                <td> 18500 INR</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Best Seller Products</h3>
                    </div>
                    <ul class="todo-list">
                    <li class="blue">
                            <p>RO Purifier Parts</p>
                        </li>
                        <li class="green">
                            <p>RO Water Purifier Parts</p>
                        </li>
                        <li class="yellow">
                            <p>RO Filter Parts</p>
                        </li>
                        <li class="orange">
                            <p>Reverse Osmosis Spare Parts</p>
                        </li>
                        <li class="green">
                            <p>Kaipron pp spun</p>
                        </li>
                    </ul>
                </div>
            </div>
        </main>

    </section>

    <script src="../script.js"></script>

</body>

</html>