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
