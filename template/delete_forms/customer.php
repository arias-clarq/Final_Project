<?php
session_start();
$_SESSION['title'] = "Delete Employee Form";
include '../header-forms.php';
?>
<div id="page-wrapper">
    <div class="main-page">
        <div class="forms text-center">
            <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                <div class="form-title">
                    <h4>Delete this account?</h4>
                    <h6><?=$_POST['username']?></h6>
                </div>
                <div class="form-body">
                    <form action="../../config/customer/delete.php" method="post">
                        <input type="hidden" value="<?=$_POST['id']?>" name="id">
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../footer.php'; ?>