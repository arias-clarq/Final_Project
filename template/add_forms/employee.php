<?php
session_start();
$_SESSION['title'] = "Add Employee Form";
include '../header-forms.php';
?>
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <div class="forms">
            <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                <div class="form-title">
                    <h4>Employee Account:</h4>
                </div>
                <div class="form-body">
                    <form action="../../config/employee/add.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group input-group input-icon right">
                                <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                    id="passwordField">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-sm" type="button" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Role:</label>
                            <select name="login_role_id" class="form-control">
                                <option selected disabled>Select an option</option>
                                <?php
                                $sql = "SELECT * FROM `tbl_login_role` WHERE `login_role_id` != 3";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?= $row['login_role_id'] ?>" class="text-capitalize">
                                        <?= $row['login_role'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    const togglePasswordButton = document.getElementById('togglePassword');
    const passwordField = document.getElementById('passwordField');
    
    togglePasswordButton.addEventListener('click', function() {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        togglePasswordButton.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>
<?php include '../footer.php'; ?>