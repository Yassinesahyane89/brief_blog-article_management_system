<?php
session_start();
$id_user = $_SESSION["id"];
if(!isset($_SESSION["goodLogin"])){
     header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../assets/css/DashboardStyle.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin Dashboard Panel</title>
</head>
<body>
<nav>
    <div class="logo">
        <span class="logo_name">CultureDev.to™</span>
    </div>
    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="statistique.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
            <li><a href="post.php">
                    <i class='bx bx-box' ></i>
                    <span class="link-name">Post</span>
                </a></li>
            <li><a href="categories.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Gategorie</span>
                </a></li>
            <!-- <li><a href="user.php">
                    <i class='bx bx-user' ></i>
                    <span class="link-name">User</span>
                </a></li> -->
        </ul>
        <ul class="logout-mode">
            <li>
                <a href="../controlers/logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a>
            </li>
            <li class="mode">
            </li>
        </ul>
    </div>
</nav>
<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <img src="../assets//image/thumb-1920-910289.jpg" alt="">
    </div>