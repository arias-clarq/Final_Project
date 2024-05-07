<div class="sticky-header header-section ">
    <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <div class="profile_details_left"><!--notifications of menu start -->
            <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->
        <div class="clearfix"> </div>
    </div>
    <div class="header-right">

        <div class="profile_details">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <span class="prfil-img"><img src="../images/2.jpg" alt=""> </span>
                            <div class="user-name">
                                <?php
                                $user_id = $_SESSION['login_id'];

                                $user_sql = "SELECT * FROM `tbl_customer_account` 
                                INNER JOIN tbl_customer_info ON tbl_customer_account.customer_id = tbl_customer_info.customer_id
                                INNER JOIN tbl_login_role ON tbl_customer_account.login_role_id = tbl_login_role.login_role_id 
                                WHERE `tbl_customer_account`.`customer_id` = $user_id";
                                $user_res = $conn->query($user_sql);
                                
                                if ($user_res->num_rows > 0) {
                                    $user_row = $user_res->fetch_assoc();
                                }
                                ?>
                                <p class="text-capitalize">
                                    <?= $user_row['lastname'] . ',' . $user_row['firstname'] ?>
                                </p>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a href="../template/edit_forms/customer.php"><i class="fa fa-user"></i> My Account</a>
                        </li>
                        <li> <a href="../index.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>