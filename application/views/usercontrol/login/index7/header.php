<!doctype html>
<html lang="en">
<head>
<?php
    if($SiteSetting['google_analytics']){ echo $SiteSetting['google_analytics']; }
    if($SiteSetting['faceboook_pixel']){ echo $SiteSetting['faceboook_pixel']; }
    $logo = $SiteSetting['front-side-themes-logo'] ? 'assets/images/site/'.$SiteSetting['front-side-themes-logo'] : 'assets/login/index1/img/logo.png';
    echo '<link rel="icon" href="'. base_url('assets/images/' . ($SiteSetting['favicon'] ? 'site/'.$SiteSetting['favicon'] : 'fav.png')) .'" type="image/*" sizes="16x16">';
    $global_script_status = (array)json_decode($SiteSetting['global_script_status'],1);
    if(in_array('front', $global_script_status)){ echo $SiteSetting['global_script']; }
    $db =& get_instance();
    $products = $db->Product_model;
    $googlerecaptcha =$db->Product_model->getSettings('googlerecaptcha');
    $front_side_font =$db->Product_model->getSettings('site','front_side_font');
    $front_side_font_value = $front_side_font['front_side_font'] ?? '';
    $cookies_menu_setting = $db->Product_model->getSettings('site');
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <meta name="author" content="<?= $meta_author ?>">
    <meta name="keywords" content="<?= $meta_keywords ?>">
    <meta name="description" content="<?= $meta_description ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/common.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index7/css/custom.css') ?>?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index7/css/style.css') ?>?v=<?= av() ?>" rel="stylesheet">
    
    <script src="<?= base_url('assets/js/jquery.min.js') ?>?v=<?= av() ?>"></script>

    <?php if($SiteSetting['front_custom_logo_size']): ?>
        <style type="text/css">
            .customLogoClass{
                width: auto;
                height: <?= (int) $SiteSetting['front_log_custom_height'] ?>px !important;
            }
        </style>
    <?php endif ?>
    
    <?php if (is_rtl()) { ?>
      <!-- place here your RTL css code -->
    <?php } ?>

    <style type="text/css">
        .forny-container {
            font-family: <?= $front_side_font['front_side_font'] ?> !important;
        }
        h1, h3 {
            font-family: <?= $front_side_font['front_side_font'] ?> !important;
        }
    </style>
</head>

<body style="font-family: <?= $front_side_font['front_side_font'] ?> !important;">
    <?php if($store['language_status']){ ?>
        <div class="language-changer"> <?= $LanguageHtml ?></div>
    <?php } ?>
    <div class="forny-container">
        <div class="forny-inner">
            <div class="forny-two-pane">
                <div class="forny-form-wrapper">
                    <div class="container py-3">
                        <div class="login-card-wrapper">
                            <div class="row">
                                <div class="affiliate-description col-lg-6">
                                    <div class="w-100 paragraph-container">
                                        <div class="forny-logo">
                                            <a href="<?= base_url() ?>">
                                                <img src="<?= base_url($logo) ?>" <?= ($SiteSetting['front_custom_logo_size']) ? 'class="customLogoClass"' : '' ?> alt="<?= __('front.logo') ?>">
                                            </a>
                                        </div>
                                        <br>
                                        <h3><?= $setting['heading'] ?></h3>
                                        <br>
                                        <?= $setting['content'] ?>
                                        <br>
                                    </div>
                                </div>