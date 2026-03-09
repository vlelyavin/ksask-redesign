<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <link rel="icon" href="<?php echo site_url(); ?>/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" sizes="180x180" href="https://ksask.profitsoft.dev/apple-touch-icon.png">

  <link rel="preconnect" href="<?php echo site_url(); ?>" crossorigin="anonymous">
  <link rel="dns-prefetch" href="<?php echo site_url(); ?>" crossorigin="anonymous">

  <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/style/fonts/inter/inter_variable.woff2" as="font" crossorigin="anonymous">

  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/style/fonts/fonts.css?v=2.0" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/style/fontawesome/fontawesome.min.css?v=2.0" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/style/redesign.css?v=2.0" type="text/css" />

  <!-- Scripts -->
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/general.js?v=2.0" defer></script>

  <?php wp_head(); ?>
  <?= get_field('google_analytics_code', 'option') ?>
</head>

<body>

  <?php
  $current_lang = pll_current_language();
  $langs_array = pll_the_languages(array('dropdown' => 1, 'hide_current' => 1, 'raw' => 1));
  $site_logo = get_field("site_logo", 'option');
  $site_email = get_field("site_email", "option");
  $site_phone = get_field("site_phone", "option");
  $instagram_link = get_field("instagram_link", "option");
  $youtube_link = get_field("youtube_link", "option");
  $linkedin_link = get_field("linkedin_link", "option");
  $telegram_link = get_field("telegram_link", "option");

  // Banner fields (per-language)
  $banner_enabled = get_field("banner_enabled", $current_lang);
  $banner_text = get_field("banner_text", $current_lang);
  $banner_link_text = get_field("banner_link_text", $current_lang);
  $banner_link_url = get_field("banner_link_url", $current_lang);

  // Header CTA (per-language)
  $header_cta_text = get_field("header_cta_text", $current_lang) ?: 'Замовити демо';
  $header_cta_url = get_field("header_cta_url", $current_lang);

  // Slide menu (per-language)
  $slide_menu_quick_title = get_field("slide_menu_quick_actions_title", $current_lang) ?: 'Швидкі дії';
  $slide_menu_demo_text = get_field("slide_menu_demo_text", $current_lang) ?: 'Замовити демо';
  $slide_menu_contact_text = get_field("slide_menu_contact_text", $current_lang) ?: 'Зв\'язатись';
  ?>

  <!-- Top Banner (always visible, not dismissible) -->
  <?php if ($banner_enabled && $banner_text) { ?>
  <div class="top-banner" id="topBanner">
    <div class="top-banner-content">
      <div class="top-banner-icon">
        <i class="fas fa-envelope"></i>
      </div>
      <span class="top-banner-text">
        <?= esc_html($banner_text); ?>
        <?php if ($banner_link_text && $banner_link_url) { ?>
          — <a href="<?= esc_url($banner_link_url); ?>" class="top-banner-link"><?= esc_html($banner_link_text); ?></a>
        <?php } ?>
      </span>
    </div>
  </div>
  <?php } ?>

  <!-- Header -->
  <header class="header <?php echo ($banner_enabled && $banner_text) ? 'with-banner' : ''; ?>" id="header">
    <div class="container">
      <div class="header-inner">
        <!-- Burger Menu -->
        <button class="burger-menu-btn" id="burgerBtn" aria-label="Open menu">
          <span class="burger-line"></span>
          <span class="burger-line"></span>
          <span class="burger-line"></span>
        </button>

        <!-- Logo (center) -->
        <a href="<?= is_front_page() ? '#hero' : '/' ?>" class="logo">
          <img src="<?php echo esc_url($site_logo); ?>" alt="ProfITsoft" class="logo-img" />
        </a>

        <!-- Header Actions (right) -->
        <div class="header-actions">
          <!-- Language Switcher (simple text links) -->
          <div class="lang-switcher" id="langSwitcher">
            <a href="<?= esc_url(pll_home_url('uk')); ?>" class="lang-btn <?= ($current_lang === 'uk' || $current_lang === 'ua') ? 'active' : ''; ?>">UA</a>
            <a href="<?= esc_url(pll_home_url('en')); ?>" class="lang-btn <?= ($current_lang === 'en') ? 'active' : ''; ?>">EN</a>
            <a href="<?= esc_url(pll_home_url('de')); ?>" class="lang-btn <?= ($current_lang === 'de') ? 'active' : ''; ?>">DE</a>
          </div>
        </div>
      </div>
    </div>
    <?php if ( is_singular( 'post' ) ) : ?>
      <div class="header__progress__bar" id="progress-bar" style="position:absolute;bottom:0;left:0;height:3px;width:0%;background:var(--royal-blue);transition:width .1s ease-out;"></div>
    <?php endif; ?>
  </header>

  <!-- Slide-out Menu Overlay -->
  <div class="slide-menu-overlay" id="slideMenuOverlay"></div>

  <!-- Slide-out Menu -->
  <nav class="slide-menu" id="slideMenu">
    <div class="slide-menu-header">
      <img src="<?php echo esc_url($site_logo); ?>" alt="ProfITsoft" class="slide-menu-logo" />
      <button class="slide-menu-close" id="slideMenuClose" aria-label="Close menu">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="slide-menu-content">
      <?php
      if (has_nav_menu('primary')) {
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'slide-menu-nav',
        ));
      }
      ?>

      <div class="slide-menu-section">
        <div class="slide-menu-section-title"><?= esc_html($slide_menu_quick_title); ?></div>
        <nav class="slide-menu-nav">
          <a href="#form-popup" class="slide-menu-link">
            <i class="fas fa-play-circle"></i>
            <?= esc_html($slide_menu_demo_text); ?>
          </a>
          <a href="<?= is_front_page() ? '#contacts' : '/#contacts' ?>" class="slide-menu-link">
            <i class="fas fa-envelope"></i>
            <?= esc_html($slide_menu_contact_text); ?>
          </a>
        </nav>
      </div>
    </div>
    <div class="slide-menu-footer">
      <?php if ($site_email) { ?>
      <div class="slide-menu-contact">
        <i class="fas fa-envelope"></i>
        <a href="mailto:<?= esc_attr($site_email); ?>"><?= esc_html($site_email); ?></a>
      </div>
      <?php } ?>
      <?php if ($site_phone) { ?>
      <div class="slide-menu-contact">
        <i class="fas fa-phone"></i>
        <a href="tel:<?= esc_attr($site_phone); ?>"><?= esc_html($site_phone); ?></a>
      </div>
      <?php } ?>
      <div class="slide-menu-social">
        <?php if ($instagram_link) { ?><a href="<?= esc_url($instagram_link); ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a><?php } ?>
        <?php if ($youtube_link) { ?><a href="<?= esc_url($youtube_link); ?>" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a><?php } ?>
        <?php if ($telegram_link) { ?><a href="<?= esc_url($telegram_link); ?>" target="_blank" rel="noopener"><i class="fab fa-telegram"></i></a><?php } ?>
        <?php if ($linkedin_link) { ?><a href="<?= esc_url($linkedin_link); ?>" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a><?php } ?>
      </div>
    </div>
  </nav>

  <!-- Contact Form Popup (preserved from original) -->
  <div class="contact__form">
    <div class="contact__form__inner">
      <svg class="contact__form__icon__close" viewBox="0 0 78 78" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="39" cy="39" r="39" fill="#1B4177" />
        <path d="M57.0154 52.3785C58.3282 53.6926 58.3282 55.7368 57.0154 57.0509C56.3589 57.708 55.5566 58 54.6814 58C53.8061 58 53.0038 57.708 52.3474 57.0509L39 43.6907L25.6526 57.0509C24.9962 57.708 24.1939 58 23.3186 58C22.4434 58 21.6411 57.708 20.9846 57.0509C19.6718 55.7368 19.6718 53.6926 20.9846 52.3785L34.3321 39.0183L20.9846 25.658C19.6718 24.3439 19.6718 22.2997 20.9846 20.9856C22.2975 19.6715 24.3397 19.6715 25.6526 20.9856L39 34.3458L52.3474 20.9856C53.6603 19.6715 55.7025 19.6715 57.0154 20.9856C58.3282 22.2997 58.3282 24.3439 57.0154 25.658L43.6679 39.0183L57.0154 52.3785Z" fill="white" />
      </svg>

      <?= do_shortcode(get_field("contact_form_shortcode", pll_current_language('slug'))) ?>
    </div>
  </div>
