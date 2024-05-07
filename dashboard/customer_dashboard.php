<?php
session_start();
$_SESSION['title'] = "Dashboard";
include '../template/header-customer.php';
?>
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page mt-5">
        <!-- action msg here -->
        <?php
        if (isset($_SESSION['confirm_msg'])) {
            ?>
            <div class="alert alert-success  alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>
                    <?= $_SESSION['confirm_msg'] ?>
                </strong>
            </div>
            <?php
        } 
        unset($_SESSION['confirm_msg']);
        ?>
    </div>
</div>
<!-- main content end-->
<?php include '../template/footer.php'; ?>