<?php
$current_lang = pll_current_language();
$site_logo = get_field("site_logo", 'option');
$site_email = get_field("site_email", "option");
$site_phone = get_field("site_phone", "option");
$footer_address = get_field("footer_address", pll_current_language('slug'));
$footer_copyright = get_field("footer_copyright_text", pll_current_language('slug'));
$footer_description = get_field("footer_description", pll_current_language('slug'));
$instagram_link = get_field("instagram_link", "option");
$youtube_link = get_field("youtube_link", "option");
$linkedin_link = get_field("linkedin_link", "option");
$telegram_link = get_field("telegram_link", "option");
?>

<?php if ($current_lang == "ua" && get_the_ID() != 1002) { ?>
<div class="file-banner">
  <div class="container">
    <div class="file-banner-inner">
      <div class="file-banner-icon">
        <svg viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M45 54.167H30C28.159 54.167 26.667 55.659 26.667 57.5C26.667 59.341 28.16 60.833 30 60.833H45C46.841 60.833 48.333 59.341 48.333 57.5C48.333 55.659 46.841 54.167 45 54.167ZM60 41.667H30C28.159 41.667 26.667 43.16 26.667 45C26.667 46.84 28.16 48.333 30 48.333H60C61.841 48.333 63.333 46.841 63.333 45C63.333 43.159 61.841 41.667 60 41.667ZM60 16.667H30C28.159 16.667 26.667 18.16 26.667 20C26.667 21.84 28.16 23.333 30 23.333H60C61.841 23.333 63.333 21.84 63.333 20C63.333 18.16 61.841 16.667 60 16.667ZM60 29.167H30C28.159 29.167 26.667 30.66 26.667 32.5C26.667 34.34 28.16 35.833 30 35.833H60C61.841 35.833 63.333 34.34 63.333 32.5C63.333 30.66 61.841 29.167 60 29.167ZM86.667 66.667H73.333V11.667C73.333 5.233 68.1 0 61.667 0H11.667C5.233 0 0 5.233 0 11.667V20C0 21.841 1.493 23.333 3.333 23.333H16.666V78.854C16.667 85 21.667 90 27.813 90C28.009 90 78.334 90 78.334 90C84.766 90 90 84.766 90 78.333V70C90 68.159 88.508 66.667 86.667 66.667ZM16.667 16.667H6.667V11.667C6.667 8.91 8.91 6.667 11.667 6.667C14.424 6.667 16.667 8.91 16.667 11.667V16.667ZM32.292 70V78.854C32.292 81.324 30.283 83.333 27.813 83.333C25.343 83.333 23.334 81.323 23.334 78.854V11.667C23.334 9.875 22.917 8.184 22.192 6.667H61.668C64.425 6.667 66.668 8.91 66.668 11.667V66.667H35.625C33.784 66.667 32.292 68.159 32.292 70ZM83.334 78.333C83.333 81.091 81.091 83.333 78.333 83.333H38.019C38.623 81.961 38.959 80.445 38.959 78.854V73.333H83.334V78.333Z" />
        </svg>
      </div>
      <a href="/vidkritij-list-strahovomu-rinku-ukraїni">Відкритий лист страховому ринку України</a>
    </div>
  </div>
</div>
<?php } ?>

<footer class="footer" id="contacts">
  <div class="container">
    <div class="footer-grid">
      <!-- Brand Column -->
      <div class="footer-brand">
        <div class="footer-logo">
          <img src="<?= esc_url($site_logo); ?>" alt="ProfITsoft" class="footer-logo-img" />
        </div>
        <p class="footer-description">
          <?= $footer_description ?: 'Комплексна система автоматизації страхової компанії. Понад 18 років досвіду автоматизації страхового бізнесу в Україні.'; ?>
        </p>
        <div class="footer-social">
          <?php if ($instagram_link) { ?>
            <a href="<?= esc_url($instagram_link); ?>" class="footer-social-link" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
          <?php } ?>
          <?php if ($youtube_link) { ?>
            <a href="<?= esc_url($youtube_link); ?>" class="footer-social-link" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a>
          <?php } ?>
          <?php if ($telegram_link) { ?>
            <a href="<?= esc_url($telegram_link); ?>" class="footer-social-link" target="_blank" rel="noopener"><i class="fab fa-telegram"></i></a>
          <?php } ?>
          <?php if ($linkedin_link) { ?>
            <a href="<?= esc_url($linkedin_link); ?>" class="footer-social-link" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a>
          <?php } ?>
        </div>
      </div>

      <!-- Nav Column 1 -->
      <div class="footer-column">
        <h4>Навігація</h4>
        <?php
        if (has_nav_menu('footer_1')) {
          wp_nav_menu(array(
            'theme_location' => 'footer_1',
            'container' => false,
          ));
        }
        ?>
      </div>

      <!-- Nav Column 2 -->
      <div class="footer-column">
        <h4>Продукт</h4>
        <?php
        if (has_nav_menu('footer_2')) {
          wp_nav_menu(array(
            'theme_location' => 'footer_2',
            'container' => false,
          ));
        }
        ?>
      </div>

      <!-- Nav Column 3 (Resources) -->
      <div class="footer-column">
        <h4>Ресурси</h4>
        <?php
        if (has_nav_menu('footer_3')) {
          wp_nav_menu(array(
            'theme_location' => 'footer_3',
            'container' => false,
          ));
        }
        ?>
      </div>

      <!-- Contacts Column -->
      <div class="footer-column">
        <h4>Контакти</h4>
        <?php if ($footer_address) { ?>
          <div class="footer-contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <span><?= $footer_address; ?></span>
          </div>
        <?php } ?>
        <?php if ($site_email) { ?>
          <div class="footer-contact-item">
            <i class="fas fa-envelope"></i>
            <a href="mailto:<?= esc_attr($site_email); ?>"><?= esc_html($site_email); ?></a>
          </div>
        <?php } ?>
        <?php if ($site_phone) { ?>
          <div class="footer-contact-item">
            <i class="fas fa-phone"></i>
            <a href="tel:<?= esc_attr($site_phone); ?>"><?= esc_html($site_phone); ?></a>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="footer-bottom">
      <p class="footer-copyright"><?= $footer_copyright; ?> <?= date("Y"); ?></p>
      <div class="footer-bottom-links">
        <a href="#">Політика конфіденційності</a>
      </div>
    </div>
  </div>
</footer>

<!-- Scroll to Top Button -->
<button class="scroll-top" id="scrollTop" aria-label="Scroll to top">
  <i class="fas fa-arrow-up"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>
