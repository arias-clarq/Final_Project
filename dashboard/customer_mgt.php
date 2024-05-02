<?php
session_start();
$_SESSION['title'] = "Customer Management";
include '../template/header.php';
?>
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page mt-5">
        <h2 class="title1"><?= $_SESSION['title'] ?></h2>
    </div>
</div>
<!-- main content end-->
<?php include '../template/footer.php'; ?>