<?php
include_once 'headerdashboard.php';
include_once('../controlers/statistiqueControler.php');
$statistiqueController = new statistiqueController();

$totalcategories=$statistiqueController->getcategories();
$totalusers=$statistiqueController->getusers();
$totalposts=$statistiqueController->getposts();

?>

<div class="dash-content">
    <div class="title">
        <i class="uil uil-tachometer-fast-alt"></i>
        <span class="text">Dashboard</span>
    </div>

    <div class="boxes">
        <div class="box box1">
            <i class='bx bx-user'></i>
            <span class="text">Total users</span>
            <span class="number"><?= $totalusers[0]['Nbr'] ?></span>
        </div>
        <div class="box box2">
            <i class='bx bx-box' ></i>
            <span class="text">Total Post</span>
            <span class="number"><?= $totalposts[0]['Nbr'] ?></span>
        </div>
        <div class="box box3">
            <i class="uil uil-chart"></i>
            <span class="text">Total Gategorie</span>
            <span class="number"><?= $totalcategories[0]['Nbr'] ?></span>
        </div>
    </div>
</div>
<?php
include_once 'footerDashboard.php'
?>
