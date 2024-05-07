<?php 
session_start();
$_SESSION['title'] = "Admin Dashboard";
include '../template/header.php'; 
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
		
		<div class="col_3">
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-dollar icon-rounded"></i>
					<div class="stats">
						<h5><strong>$452</strong></h5>
						<span>Total Revenue</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-laptop user1 icon-rounded"></i>
					<div class="stats">
						<h5><strong>$1019</strong></h5>
						<span>Online Revenue</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-money user2 icon-rounded"></i>
					<div class="stats">
						<h5><strong>$1012</strong></h5>
						<span>Expenses</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
					<div class="stats">
						<h5><strong>$450</strong></h5>
						<span>Expenditure</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 widget">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-users dollar2 icon-rounded"></i>
					<div class="stats">
						<h5><strong>1450</strong></h5>
						<span>Total Users</span>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

		<div class="row-one widgettable">
			<div class="col-md-3 stat">
				<div class="content-top-1">
					<div class="col-md-6 top-content">
						<h5>Sales</h5>
						<label>20+</label>
					</div>
					<div class="col-md-6 top-content1">
						<div id="demo-pie-1" class="pie-title-center" data-percent="45"> <span class="pie-value"></span>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="content-top-1">
					<div class="col-md-6 top-content">
						<h5>Reviews</h5>
						<label>2262+</label>
					</div>
					<div class="col-md-6 top-content1">
						<div id="demo-pie-2" class="pie-title-center" data-percent="75"> <span class="pie-value"></span>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="content-top-1">
					<div class="col-md-6 top-content">
						<h5>Visitors</h5>
						<label>12589+</label>
					</div>
					<div class="col-md-6 top-content1">
						<div id="demo-pie-3" class="pie-title-center" data-percent="90"> <span class="pie-value"></span>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

		<!-- for amcharts js -->
		<script src="../js/amcharts.js"></script>
		<script src="../js/serial.js"></script>
		<script src="../js/export.min.js"></script>
		<link rel="stylesheet" href="../css/export.css" type="text/css" media="all" />
		<script src="../js/light.js"></script>
		<!-- for amcharts js -->

		<script src="../js/index1.js"></script>


	</div>
</div>
<!-- main content end-->

<?php include '../template/footer.php'; ?>