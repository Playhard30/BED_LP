<?php
include("./inc/connection.php");

$query = "CALL sp_getSchoolSettings";
$settings = $conn->execQuery($query);

foreach ($settings as $setting) {
    $schoolName = $setting['school_name'];
    $schoolAddress = $setting['school_address'];
    $schoolLogo = $setting['img'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font Api KEY-->
    <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
    <!-- Config Options -->
    <meta name="setting_options"
        content='{&quot;saveLocal&quot;:&quot;sessionStorage&quot;,&quot;storeKey&quot;:&quot;huisetting-html&quot;,&quot;setting&quot;:{&quot;app_name&quot;:{&quot;value&quot;:&quot; <?php echo (!empty($schoolName)) ? $schoolName : ""; ?>&quot;},&quot;theme_scheme_direction&quot;:{&quot;value&quot;:&quot;ltr&quot;},&quot;theme_scheme&quot;:{&quot;value&quot;:&quot;light&quot;},&quot;theme_style_appearance&quot;:{&quot;value&quot;:[&quot;theme-default&quot;]},&quot;theme_color&quot;:{&quot;colors&quot;:{&quot;--{{prefix}}primary&quot;:&quot;#8d1b1b&quot;,&quot;--{{prefix}}info&quot;:&quot;#5f5d5d&quot;},&quot;value&quot;:&quot;theme-color-default&quot;},&quot;theme_transition&quot;:{&quot;value&quot;:&quot;theme-with-animation&quot;},&quot;theme_font_size&quot;:{&quot;value&quot;:&quot;theme-fs-md&quot;},&quot;page_layout&quot;:{&quot;value&quot;:&quot;container-fluid&quot;},&quot;header_navbar&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;header_banner&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;sidebar_color&quot;:{&quot;value&quot;:&quot;sidebar-white&quot;},&quot;card_color&quot;:{&quot;value&quot;:&quot;card-default&quot;},&quot;sidebar_type&quot;:{&quot;value&quot;:[]},&quot;sidebar_menu_style&quot;:{&quot;value&quot;:&quot;left-bordered&quot;},&quot;footer&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;body_font_family&quot;:{&quot;value&quot;:null},&quot;heading_font_family&quot;:{&quot;value&quot;:null}}}'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo (!empty($schoolLogo)) ? "./assets/images/logo/" . $schoolLogo : ""; ?>"
        type="image/x-icon">
    <title>Login |
        <?php echo (!empty($schoolName)) ? $schoolName . " " . $schoolAddress : ""; ?>
    </title>

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="./assets/css/core/libs.min.css" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="./assets/css/hope-ui.min.css" />
    <link rel=" stylesheet" href="./assets/css/pro.min.css" />

    <!-- Custom Css -->
    <link rel=" stylesheet" href="./assets/css/custom.min.css" />

    <!-- Dark Css -->
    <link rel=" stylesheet" href="./assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel=" stylesheet" href="./assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="./assets/css/rtl.min.css" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body class="">
    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    <a href="./login" class="navbar-brand d-flex align-items-center mb-3">
                                        <!--Logo start-->
                                        <!--logo End-->

                                        <!--Logo start-->
                                        <div class="logo-main">
                                            <div class="logo-normal">
                                                <img src="<?php echo (!empty($schoolLogo)) ? "./assets/images/logo/" . $schoolLogo : ""; ?>"
                                                    alt="schoolLogo" width="50" height="50">
                                            </div>
                                            <div class="logo-mini">
                                                <img src="<?php echo (!empty($schoolLogo)) ? "./assets/images/logo/" . $schoolLogo : ""; ?>"
                                                    alt="schoolLogo" width="20" height="20">
                                            </div>
                                        </div>
                                        <!--logo End-->
                                        <h4 class="logo-title ms-3 mb-0" data-setting="app_name"></h4>
                                    </a>
                                    <h2 class="mb-2 text-center">Sign In</h2>
                                    <p class="text-center">Sign in to your account.</p>
                                    <form method="post" action="./pages/login/loginData/login">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text"
                                                        class="form-control text-black <?php echo (!empty($_SESSION['errorMessage']['username'])) ? $_SESSION['errorMessage']['username'][0] : '' ?>"
                                                        id="username" name="username" aria-describedby="username"
                                                        placeholder="Enter username"
                                                        value="<?php echo (!empty($_SESSION['errorMessage']['formData'])) ? $_SESSION['errorMessage']['formData'][0] : '' ?>">
                                                    <?php if (!empty($_SESSION['errorMessage']['username'])) {
                                                        echo '<div class="invalid-feedback">' . $_SESSION['errorMessage']['username'][1] . '</div>';
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password"
                                                        class="form-control text-black <?php echo (!empty($_SESSION['errorMessage']['password'])) ? $_SESSION['errorMessage']['password'][0] : '' ?>"
                                                        id="password" name="password" aria-describedby="password"
                                                        placeholder="Enter password"
                                                        value="<?php echo (!empty($_SESSION['errorMessage']['formData'])) ? $_SESSION['errorMessage']['formData'][1] : '' ?>">
                                                    <?php if (!empty($_SESSION['errorMessage']['password'])) {
                                                        echo '<div class="invalid-feedback">' . $_SESSION['errorMessage']['password'][1] . '</div>';
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 mt-2">
                                            <button type="submit" class="btn btn-primary" name="signin">Sign In</button>
                                        </div>


                                        <p class="mt-4 text-center">
                                            <a href="#" class="text-underline">Forgot password?</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sign-bg">
                        <!-- <svg width="280" height="230" viewBox="0 0 431 398" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.05">
                                <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
                                <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
                                <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857"
                                    transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
                                <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
                            </g>
                        </svg> -->
                        <img src="<?php echo (!empty($schoolLogo)) ? "./assets/images/logo/" . $schoolLogo : ""; ?>"
                            alt="" width="180" height="180" style="opacity: 0.1;">
                    </div>
                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="./assets/images/background/bg_signin2.jpg" class="img-fluid gradient-main animated-scaleX"
                        style="background-position-x: right;" alt="images">
                </div>
            </div>
        </section>
    </div>


    <!-- Library Bundle Script -->
    <script src="./assets/js/core/libs.min.js"></script>

    <!-- Slider-tab Script -->
    <script src="./assets/js/plugins/slider-tabs.js"></script>

    <!-- Lodash Utility -->
    <script src="./assets/vendor/lodash/lodash.min.js"></script>
    <!-- Utilities Functions -->
    <script src="./assets/js/iqonic-script/utility.min.js"></script>
    <!-- Settings Script -->
    <script src="./assets/js/iqonic-script/setting.min.js"></script>
    <!-- Settings Init Script -->
    <script src="./assets/js/setting-init.js"></script>
    <!-- External Library Bundle Script -->
    <script src="./assets/js/core/external.min.js"></script>
    <!-- Widgetchart Script -->
    <script src="./assets/js/charts/widgetcharts.js" defer></script>
    <!-- Dashboard Script -->
    <script src="./assets/js/charts/dashboard.js" defer></script>
    <script src="./assets/js/charts/alternate-dashboard.js" defer></script>
    <!-- Hopeui Script -->
    <script src="./assets/js/hope-ui.js" defer></script>
    <script src="./assets/js/hope-uipro.js" defer></script>
    <script src="./assets/js/sidebar.js" defer></script>

</body>



<?php session_destroy(); ?>

</html>