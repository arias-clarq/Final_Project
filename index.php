<?php
session_start();
$_SESSION['title'] = "Login Page";
?>
<!DOCTYPE HTML>
<html>

<head>
    <title><?= $_SESSION['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="template/css/bootstrap.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="template/css/style.css" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS -->
    <link href="template/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons CSS-->

    <!-- side nav css file -->
    <link href='template/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
    <!-- //side nav css file -->

    <!-- js-->
    <script src="template/js/jquery-1.11.1.min.js"></script>
    <script src="template/js/modernizr.custom.js"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
        rel="stylesheet">
    <!--//webfonts-->

    <!-- chart -->
    <script src="template/js/Chart.js"></script>
    <!-- //chart -->

    <!-- Metis Menu -->
    <script src="template/js/metisMenu.min.js"></script>
    <script src="template/js/custom.js"></script>
    <link href="template/css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
    <style>
        #chartdiv {
            width: 100%;
            height: 295px;
        }
    </style>
    <!--pie-chart --><!-- index page sales reviews visitors pie chart -->
    <script src="template/js/pie-chart.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });

    </script>
    <!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

    <!-- requried-jsfiles-for owl -->
    <link href="template/css/owl.carousel.css" rel="stylesheet">
    <script src="template/js/owl.carousel.js"></script>
    <script>
        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                items: 3,
                lazyLoad: true,
                autoPlay: true,
                pagination: true,
                nav: true,
            });
        });
    </script>
    <!-- //requried-jsfiles-for owl -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" rel="stylesheet">
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">
        <div id="page-wrapper">
            <div class="main-page login-page">
                <h2 class="title1">Login</h2>
                <div class="widget-shadow">
                    <div class="login-body">
                        <!-- action msg here -->
                        <?php
                        if (isset($_SESSION['error_msg'])) {
                            ?>
                            <div class="alert alert-danger  alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>
                                    <?= $_SESSION['error_msg'] ?>
                                </strong>
                            </div>
                            <?php
                        } ?>
                        <?php
                        if (isset($_SESSION['success_msg'])) {
                            ?>
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>
                                    <?= $_SESSION['success_msg'] ?>
                                </strong>
                            </div>
                            <?php
                        } ?>
                        <form action="config/login.php" method="post">
                            <div class="mb-3 mt-3">
                                <label for="">Enter Username/Email:</label>
                                <input type="text" class="form-control" name="username" placeholder="      Username/Email" required>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="">Enter Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <input type="submit" name="Sign In" value="LogIn">
                            <div class="registration">
                                Don't have an account ?
                                <a class="" href="signup.php">
                                    Create an account
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Classie --><!-- for toggle left push menu script -->
    <script src="../js/classie.js"></script>
    <script>
        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

        showLeftPush.onclick = function () {
            classie.toggle(this, 'active');
            classie.toggle(body, 'cbp-spmenu-push-toright');
            classie.toggle(menuLeft, 'cbp-spmenu-open');
            disableOther('showLeftPush');
        };


        function disableOther(button) {
            if (button !== 'showLeftPush') {
                classie.toggle(showLeftPush, 'disabled');
            }
        }
    </script>
    <!-- //Classie --><!-- //for toggle left push menu script -->

    <!-- side nav js -->
    <script src='../js/SidebarNav.min.js' type='text/javascript'></script>
    <script>
        $('.sidebar-menu').SidebarNav()
    </script>
    <!-- //side nav js -->
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.js"> </script>
    <!-- //Bootstrap Core JavaScript -->
</body>

</html>

<?php
session_unset();
?>