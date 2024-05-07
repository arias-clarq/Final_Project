<?php
session_start();
$_SESSION['title'] = "View Customer Form";
include '../header-forms.php';

$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_customer_info` 
INNER JOIN tbl_customer_account ON tbl_customer_info.customer_id = tbl_customer_account.customer_id 
WHERE `tbl_customer_info`.`customer_id` = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div id="page-wrapper">
    <div class="main-page">

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
                            class="form-control text-capitalize" placeholder="Last Name" name="lname" readonly>
                        <input type="text" value="<?= isset($row['firstname']) ? $row['firstname'] : "" ?>"
                            class="form-control text-capitalize" placeholder="First Name" name="fname" readonly>
                    </div>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text fw-bold">Age</span>
                        <input class="form-control" value="<?= isset($row['age']) ? $row['age'] : "" ?>" min="0"
                            placeholder="Enter Age" type="number" name="age" readonly>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold">Birthday</span>
                        <input class="form-control" value="<?= isset($row['birthdate']) ? $row['birthdate'] : "" ?>"
                            type="text" name="bday" readonly>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text fw-bold">Gender</span>
                        <input class="form-control text-capitalize" type="text"
                            value="<?= isset($row['gender']) ? $row['gender'] : "" ?>" readonly>
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
                            maxlength="11" placeholder="Enter Phone Number" type="phone" name="phone" readonly>
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
                                value="<?= isset($row['province']) ? $row['province'] : "" ?>" readonly>
                        </div>

                        <div class="col mb-3">
                            <label class="form-label fw-bold">Municipality:</label>
                            <input class="form-control text-capitalize" type="text"
                                value="<?= isset($row['municipality']) ? $row['municipality'] : "" ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="../../dashboard/customer_mgt.php">
                        <button type="submit" class="btn btn-default">Back</button>
                    </a>
                </div>  
            </div>
        </div>

    </div>
</div>

<?php include '../footer.php'; ?>