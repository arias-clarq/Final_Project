<?php
session_start();
$_SESSION['title'] = "Edit Customer Form";
include '../header-forms.php';

$gender = [
    "male",
    "female",
    "other"
];

$id = isset($_POST['id']) ? $_POST['id'] : $_SESSION['login_id'];
$sql = "SELECT * FROM `tbl_customer_info` 
INNER JOIN tbl_customer_account ON tbl_customer_info.customer_id = tbl_customer_account.customer_id 
WHERE `tbl_customer_info`.`customer_id` = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div id="page-wrapper">
    <div class="main-page">
        <form action="../../config/customer/edit.php" method="post">
            <!-- account -->
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Account:</h4>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="<?= isset($row['username']) ? $row['username'] : "" ?>"
                                class="form-control" placeholder="Enter Username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group input-group input-icon right">
                                <input type="password" value="<?= isset($row['password']) ? $row['password'] : "" ?>"
                                    class="form-control" placeholder="Enter Password" name="password"
                                    id="passwordField">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-sm" type="button" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($_SESSION['login_role'] == 1) {
                            ?>
                            <div class="d-flex justify-content-end">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <?php
            if ($_SESSION['login_role'] == 3) {
                ?>

                <!-- information -->
                <div class="forms">
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Personal Information :</h4>
                        </div>
                        <div class="form-body">
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text fw-bold">Name</span>
                                <input type="text" value="<?= isset($row['lastname']) ? $row['lastname'] : "" ?>"
                                    class="form-control text-capitalize" placeholder="Last Name" name="lname">
                                <input type="text" value="<?= isset($row['firstname']) ? $row['firstname'] : "" ?>"
                                    class="form-control text-capitalize" placeholder="First Name" name="fname">
                            </div>

                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text fw-bold">Age</span>
                                <input class="form-control" value="<?= isset($row['age']) ? $row['age'] : "" ?>" min="0"
                                    placeholder="Enter Age" type="number" name="age">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text fw-bold">Birthday</span>
                                <input class="form-control" value="<?= isset($row['birthdate']) ? $row['birthdate'] : "" ?>"
                                    type="text" name="bday">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text fw-bold">Gender</span>
                                <select name="gender" class="form-select">
                                    <option selected disabled>Select Gender</option>
                                    <?php
                                    foreach ($gender as $gender) {
                                        ?>
                                        <option value="<?= $gender ?>" class="text-capitalize" <?= ($gender == $row['gender']) ? "selected" : "" ?>><?= $gender ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- contact -->
                <div class="forms">
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Contact Information:</h4>
                        </div>
                        <div class="form-body">
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text fw-bold">Phone no.</span>
                                <input class="form-control" value="<?= isset($row['phone_num']) ? $row['phone_num'] : "" ?>"
                                    maxlength="11" placeholder="Enter Phone Number" type="phone" name="phone">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- address -->
                <div class="forms">
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Address Details:</h4>
                        </div>
                        <div class="form-body">
                            <div class="row row-col-3 mb-3">
                                <div class="col mb-3">
                                    <label class="form-label fw-bold">Province:</label>
                                    <input class="form-control text-capitalize" type="text"
                                        value="<?= isset($row['province']) ? $row['province'] : "" ?>" name="province">
                                </div>

                                <div class="col mb-3">
                                    <label class="form-label fw-bold">Municipality:</label>
                                    <input class="form-control text-capitalize" type="text"
                                        value="<?= isset($row['municipality']) ? $row['municipality'] : "" ?>" name="municipality"  >
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </form>
    </div>
</div>

<script>
    const togglePasswordButton = document.getElementById('togglePassword');
    const passwordField = document.getElementById('passwordField');

    togglePasswordButton.addEventListener('click', function () {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        togglePasswordButton.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>

<?php include '../footer.php'; ?>