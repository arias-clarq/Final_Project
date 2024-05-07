<?php
session_start();
$_SESSION['title'] = "Customer Management";
include '../template/header.php';
?>
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page mt-5">
        <h2 class="title1"><?= $_SESSION['title'] ?></h2>
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
        } elseif (isset($_SESSION['deleteMsg'])) { ?>
            <div class="alert alert-danger  alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>
                    <?= $_SESSION['deleteMsg'] ?>
                </strong>
            </div>
        <?php }
        unset($_SESSION['deleteMsg']);
        unset($_SESSION['confirm_msg']);
        ?>
        <div class="blank-page widget-shadow scroll" id="style-2 div1">
            <table id="customer" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `tbl_customer_account` INNER JOIN tbl_login_role ON tbl_customer_account.login_role_id = tbl_login_role.login_role_id";
                    $result = $conn->query($sql);
                    $count = 0;
                    while ($row = $result->fetch_assoc()) {
                        $count += 1;
                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $row['username'] ?></td>
                            <td>********</td>
                            <td>

                                <form action="../template/view_forms/customer.php" method="post">
                                    <input type="hidden" name="id" value="<?= $row['customer_id'] ?>">
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-eye"
                                            aria-hidden="true"></i> View</button>
                                </form>

                                <form action="../template/edit_forms/customer.php" method="post">
                                    <input type="hidden" name="id" value="<?= $row['customer_id'] ?>">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-pencil"
                                            aria-hidden="true"></i> Edit</button>
                                </form>

                                <form action="../template/delete_forms/customer.php" method="post">
                                    <input type="hidden" value="<?= $row['username'] ?>" name="username">
                                    <input type="hidden" value="<?= $row['customer_id'] ?>" name="id">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    new DataTable('#customer');
</script>
<!-- main content end-->
<?php include '../template/footer.php'; ?>