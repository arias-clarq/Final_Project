<?php
session_start();
$_SESSION['title'] = "Add Employee Form";
include '../header-forms.php';

$gender = [
    "male",
    "female",
    "other"
];

$marital_status = [
    "single",
    "married",
    "divorced",
    "widowed",
    "separated",
    "civil_union",
    "in_a_relationship",
    "its_complicated"
];

?>
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <form action="../../config/employee/add.php" method="post">
            <!-- account -->
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Account:</h4>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group input-group input-icon right">
                                <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                    id="passwordField" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-sm" type="button" id="togglePassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Role:</label>
                            <select name="login_role_id" class="form-control" required>
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
                    </div>
                </div>
            </div>

            <!-- information -->
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Personal Information :</h4>
                    </div>
                    <div class="form-body">
                        <div class="input-group mb-3 mt-3">
                            <span class="input-group-text fw-bold">Name</span>
                            <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
                            <input type="text" class="form-control" placeholder="First Name" name="fname" required>
                            <input type="text" class="form-control" placeholder="Middle Name" name="mname" required>
                        </div>

                        <div class="input-group mb-3 mt-3">
                            <span class="input-group-text fw-bold">Age</span>
                            <input class="form-control" min="0" placeholder="Enter Age" type="number" name="age"
                                required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text fw-bold">Birthday</span>
                            <input class="form-control" type="date" name="bday" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text fw-bold">Gender</span>
                            <select name="gender" class="form-select" required>
                                <option selected disabled>Select Gender</option>
                                <?php
                                foreach ($gender as $gender) {
                                    ?>
                                    <option value="<?= $gender ?>" class="text-capitalize"><?= $gender ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text fw-bold">Marital Status</span>
                            <select name="marital_status" class="form-select" required>
                                <option selected disabled>Select Option</option>
                                <?php
                                foreach ($marital_status as $marital_status) {
                                    ?>
                                    <option value="<?= $marital_status ?>" class="text-capitalize"><?= $marital_status ?>
                                    </option>
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
                            <span class="input-group-text fw-bold">Email</span>
                            <input class="form-control" placeholder="Enter Email" type="email" name="email" required>
                        </div>

                        <div class="input-group mb-3 mt-3">
                            <span class="input-group-text fw-bold">Phone no.</span>
                            <input class="form-control" maxlength="11" placeholder="Enter Phone Number" type="phone"
                                name="phone" required>
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
                            <div class="col">
                                <?php
                                $API_URL = 'https://psgc.gitlab.io/api/regions/';
                                $json = file_get_contents($API_URL);
                                $data = json_decode($json, true);
                                ?>
                                <label class="form-label fw-bold">Select Region:</label>
                                <select name="region" id="regionSelect" class="form-select" required
                                    onchange="populateProvinces()">
                                    <option value="">Select Region</option>
                                    <?php
                                    foreach ($data as $region) {
                                        ?>
                                        <option value="<?= $region['code'] ?>"><?= $region['name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>

                            <div class="col mb-3">
                                <label class="form-label fw-bold">Select Province:</label>
                                <select name="province" id="provinceSelect" class="form-select" required disabled>
                                    <option disabled selected>Select Region First</option>
                                    <!-- Options will be populated dynamically using JavaScript -->
                                </select>
                            </div>

                            <div class="col mb-3">
                                <label class="form-label fw-bold">Select Municipality:</label>
                                <select name="municipality" id="municipalSelect" class="form-select" required disabled>
                                    <option disabled selected>Select Province First</option>
                                    <!-- Options will be populated dynamically using JavaScript -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- education -->
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Educational Background:</h4>
                    </div>
                    <div class="form-body">
                        <div class="mb-3 mt-3">
                            <div class="input-group">
                                <span class="input-group-text fw-bold">School</span>
                                <input type="text" class="form-control" placeholder="Enter Elementary" name="elem">
                                <input type="text" class="form-control" placeholder="Enter Junior Highschool"
                                    name="jhs">
                                <input type="text" class="form-control" placeholder="Enter Senior Highschool"
                                    name="shs">
                                <input type="text" class="form-control" placeholder="Enter College" name="college">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- job -->
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Job Details:</h4>
                    </div>
                    <div class="form-body">
                        <div class="row row-col-5 mb-3 mt-3">

                            <div class="col">
                                <label class="form-label fw-bold">Select Job:</label>
                                <select class="form-control" name="job_title" required>
                                    <option selected disabled>Select a job title</option>
                                    <option value="Chief Operating Officer">Chief Operating Officer</option>
                                    <option value="Chief Executive">Chief Executive</option>
                                    <option value="Chief Financial Officer">Chief Financial Officer</option>
                                    <option value="Human Resources Manager">Human Resources Manager</option>
                                    <option value="Chief Marketing Officer">Chief Marketing Officer</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Finance Manager">Finance Manager</option>
                                    <option value="Assistant">Assistant</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>


                            <div class="col">
                                <label class="form-label fw-bold">Select Department:</label>
                                <select class="form-control" name="department" required>
                                    <option selected disabled>Select department</option>
                                    <option value="HR">HR</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Production">Production</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Quality department">Quality department</option>
                                </select>
                            </div>

                            <div class="col">
                                <label class="form-label fw-bold">Employment Status:</label>
                                <select class="form-control" name="employment_status" required>
                                    <option selected disabled>Select status</option>
                                    <option value="Full-Time Employees">Full-Time Employees</option>
                                    <option value="Part-Time Employees">Part-Time Employees</option>
                                    <option value="Seasonal Employees">Seasonal Employees</option>
                                    <option value="Temporary Employees">Temporary Employees</option>
                                </select>
                            </div>

                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="input-group" style="height: 1.4rem;">
                                    <span class="input-group-text fw-bold">Employee Id Number</span>
                                    <input type="text" class="form-control" placeholder="Enter Employee Id Number"
                                        name="employement_num" required>
                                </div>
                            </div>

                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="input-group" style="height: 1.4rem;">
                                    <span class="input-group-text fw-bold">Date of Hire</span>
                                    <input type="date" class="form-control" name="hire_date" required>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- salary -->
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Salary & Deduction Details:</h4>
                    </div>
                    <div class="form-body">
                        <div class="input-group mb-3 mt-3">
                            <span class="input-group-text fw-bold">SSS Number</span>
                            <input type="text" class="form-control" placeholder="Enter SSS number" name="sss">
                            <span class="input-group-text fw-bold">Pag-Ibig Number</span>
                            <input type="text" class="form-control" placeholder="Enter Pag-Ibig Number" name="pagibig"
                            >
                            <span class="input-group-text fw-bold">PhilHealth Number</span>
                            <input type="text" class="form-control" placeholder="Enter PhilHealth Number" name="phil"
                            >
                            <span class="input-group-text fw-bold">Basic Salary</span>
                            <input type="number" class="form-control" placeholder="Enter Basic Salary" name="salary"
                                required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- emergency -->
            <div class="forms">
                <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                    <div class="form-title">
                        <h4>Emergency Contact:</h4>
                    </div>
                    <div class="form-body">
                        <div class="row row-col-2 input-group mb-3 mt-3">
                            <div class="col input-group">
                                <span class="input-group-text fw-bold">Name of Spouse/Guardian</span>
                                <input type="text" class="form-control" placeholder="Enter Name of Spouse/Guardian"
                                    name="person_name" required>
                            </div>
                            <div class="col input-group">
                                <span class="input-group-text fw-bold">Relationship</span>
                                <input type="text" class="form-control" placeholder="Enter Relationship"
                                    name="person_relationship" required>
                            </div>
                        </div>
                        <div class="row row-col-2 input-group mb-3 mt-3">
                            <div class="col input-group">
                                <span class="input-group-text fw-bold">Spouse/Guardian Phone Number</span>
                                <input type="number" class="form-control"
                                    placeholder="Enter Spouse/Guardian Phone Number" name="person_phone_num" required>
                            </div>
                            <div class="col input-group">
                                <span class="input-group-text fw-bold">Spouse/Guardian Email</span>
                                <input type="email" class="form-control" placeholder="Enter Spouse/Guardian Email"
                                    name="person_email" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
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

    $(document).ready(function () {
        // Event listener for when the region select changes
        $('#regionSelect').change(function () {
            var regionCode = $(this).val();

            // Fetch provinces based on the selected region using AJAX
            $.getJSON('https://psgc.gitlab.io/api/regions/' + regionCode + '/provinces', function (provinces) {
                var $provinceSelect = $('#provinceSelect');
                $provinceSelect.empty().append('<option disabled selected>Select Province</option>');

                if (provinces.length > 0) {
                    $.each(provinces, function (i, province) {
                        var provinceCode = province.code;
                        $provinceSelect.append($('<option>', {
                            value: province.name,
                            text: province.name,
                            'data-province-code': provinceCode // Set custom attribute with province code
                        }));
                    });
                    $provinceSelect.prop('disabled', false);
                } else {
                    $provinceSelect.append($('<option>', {
                        text: 'No Available Provinces'
                    }));
                    $provinceSelect.prop('disabled', true);
                }
            });
        });

        // Event listener for when the province select changes
        $('#provinceSelect').change(function () {
            var provinceCode = $(this).find('option:selected').attr('data-province-code');
            console.log(provinceCode);
            // Fetch municipalities based on the selected province using AJAX
            $.getJSON('https://psgc.gitlab.io/api/provinces/' + provinceCode + '/municipalities', function (municipalities) {
                var $municipalSelect = $('#municipalSelect');
                $municipalSelect.empty().append('<option disabled selected>Select Municipality</option>');

                if (municipalities.length > 0) {
                    $.each(municipalities, function (i, municipality) {
                        $municipalSelect.append($('<option>', {
                            value: municipality.name,
                            text: municipality.name
                        }));
                    });
                    $municipalSelect.prop('disabled', false);
                } else {
                    $municipalSelect.append($('<option>', {
                        text: 'No Available Municipalities'
                    }));
                    $municipalSelect.prop('disabled', true);
                }
            });
        });
    });
</script>
<?php include '../footer.php'; ?>