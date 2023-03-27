<?php
include("../../inc/connection.php");
include("../../inc/session.php");

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
    <title>
        <?php
        echo $pageTitle . " | ";
        echo (!empty($schoolName)) ? " " . $schoolName . " " . $schoolAddress : ""; ?>
    </title>

    <!-- Google Font Api KEY-->
    <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
    <!-- Config Options -->
    <meta name="setting_options" content='{
    "saveLocal": "sessionStorage",
    "storeKey": "huisetting-html",
    "setting": {
        "app_name": {
            "value": " <?php echo (!empty($schoolName)) ? $schoolName : ""; ?>"
        },
        "theme_scheme_direction": {
            "value": "ltr"
        },
        "theme_scheme": {
            "value": "light"
        },
        "theme_style_appearance": {
            "value": [
                "theme-default"
            ]
        },
        "theme_color": {
            "colors": {
                "--{{prefix}}primary": "#8d1b1b",
                "--{{prefix}}info": "#5f5d5d"
            },
            "value": "custom"
        },
        "theme_transition": {
            "value": "theme-without-animation"
        },
        "theme_font_size": {
            "value": "theme-fs-md"
        },
        "page_layout": {
            "value": "container-fluid"
        },
        "header_navbar_show": {
            "value": []
        },
        "header_navbar": {
            "value": "default"
        },
        "header_banner": {
            "value": "default"
        },
        "card_color": {
            "value": "card-default"
        },
        "sidebar_show": {
            "value": []
        },
        "sidebar_color": {
            "value": "sidebar-white"
        },
        "sidebar_type": {
            "value": []
        },
        "sidebar_menu_style": {
            "value": "sidebar-default navs-full-width"
        },
        "footer": {
            "value": "default"
        },
        "body_font_family": {
            "value": null
        },
        "heading_font_family": {
            "value": null
        }
    }
}'>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/images/logo/sfacLogo.png" type="image/x-icon">

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../../assets/css/core/libs.min.css" />

    <!-- css extension -->
    <?php if (!empty($links)) {
        foreach ($links as $link) {
            echo $link;
        }

    } ?>

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="../../assets/css/hope-ui.min.css" />
    <link rel="stylesheet" href="../../assets/css/pro.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="../../assets/css/custom.min.css" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="../../assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="../../assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="../../assets/css/rtl.min.css" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">


</head>