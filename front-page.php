<?php get_template_part('template-parts/header') ?>

<main class="main">

  <!-- ========================================
       Hero Section
     ======================================== -->
  <section class="hero" id="hero">
    <div class="hero-bg">
      <div class="hero-bg-shape hero-bg-shape-1"></div>
      <div class="hero-bg-shape hero-bg-shape-2"></div>
    </div>

    <?php
    $intro_section = get_field('intro_section');
    $intro_title = $intro_section['title'];
    $intro_text = $intro_section['text'];
    $slides = $intro_section['slides'];
    $first_slide = $slides[0] ?? null;

    $hero_badge_text = !empty($intro_section['badge_text']) ? $intro_section['badge_text'] : 'Спеціальна пропозиція';
    $hero_cta_primary_text = !empty($intro_section['cta_primary_text']) ? $intro_section['cta_primary_text'] : 'Дізнатись ціну';
    $hero_cta_primary_url = !empty($intro_section['cta_primary_url']) ? $intro_section['cta_primary_url'] : '#pricing';
    $hero_cta_secondary_text = !empty($intro_section['cta_secondary_text']) ? $intro_section['cta_secondary_text'] : 'Переглянути демо';
    $hero_cta_secondary_url = !empty($intro_section['cta_secondary_url']) ? $intro_section['cta_secondary_url'] : '#form-popup';
    $hero_stats = !empty($intro_section['stats']) ? $intro_section['stats'] : [
      ['value' => '18+', 'label' => 'років на ринку'],
      ['value' => '11+', 'label' => 'страхових компаній'],
      ['value' => '6.0', 'label' => 'версія системи'],
    ];
    $hero_floating_cards = !empty($intro_section['floating_cards']) ? $intro_section['floating_cards'] : [
      ['icon_class' => 'fas fa-shield-alt', 'value' => '100%', 'label' => 'Відповідність НБУ'],
      ['icon_class' => 'fas fa-code', 'value' => 'Open', 'label' => 'Вихідний код'],
    ];
    ?>

    <div class="container hero-content">
      <div class="hero-grid">
        <div class="hero-text">
          <div class="hero-badge">
            <div class="hero-badge-dot"></div>
            <span class="hero-badge-text"><?= esc_html($hero_badge_text); ?></span>
          </div>

          <h1 class="hero-title">
            <?= $intro_title; ?>
          </h1>

          <p class="hero-description">
            <?= $intro_text; ?>
          </p>

          <div class="hero-buttons">
            <a href="<?= esc_url($hero_cta_primary_url); ?>" class="btn btn-primary">
              <i class="fas fa-tag"></i>
              <?= esc_html($hero_cta_primary_text); ?>
            </a>
            <a href="<?= esc_url($hero_cta_secondary_url); ?>" class="btn btn-secondary">
              <i class="fas fa-play"></i>
              <?= esc_html($hero_cta_secondary_text); ?>
            </a>
          </div>

          <div class="hero-stats">
            <?php foreach ($hero_stats as $stat) { ?>
              <div class="hero-stat">
                <div class="hero-stat-value"><?= esc_html($stat['value']); ?></div>
                <div class="hero-stat-label"><?= esc_html($stat['label']); ?></div>
              </div>
            <?php } ?>
          </div>
        </div>

        <div class="hero-visual">
          <?php if ($first_slide) { ?>
          <div class="hero-image-wrapper">
            <?php echo wp_get_attachment_image($first_slide['slide_image_url'], 'large', false, ['class' => 'hero-image']); ?>
            <div class="hero-image-overlay"></div>
          </div>
          <?php } ?>

          <?php foreach ($hero_floating_cards as $i => $card) { ?>
            <div class="hero-floating-card hero-floating-card-<?= $i + 1; ?>">
              <div class="hero-card-icon">
                <i class="<?= esc_attr($card['icon_class']); ?>"></i>
              </div>
              <div class="hero-card-value"><?= esc_html($card['value']); ?></div>
              <div class="hero-card-label"><?= esc_html($card['label']); ?></div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================
       Modules Section
     ======================================== -->
  <section class="modules-section section" id="modules">
    <?php
    $modules_group = get_field('modules_section');
    $modules_title = $modules_group['title'];
    $module_tiles = $modules_group['tiles'];
    $stagger = 1;

    // Fallback descriptions for module tiles
    $module_desc_defaults = [
      'Управління продажами, калькулятори, оформлення договорів',
      'Оцінка ризиків, затвердження умов, управління тарифами',
      'Автоматичний розрахунок та виплата комісій агентам',
      'Обробка збитків, виплати, регресні вимоги',
      'Контроль фінансових операцій відповідно до законодавства',
      'Добровільне медичне страхування та управління полісами',
      'Управління договорами перестрахування та розрахунками',
      'Бухгалтерський облік, звітність, управління фінансами',
    ];
    ?>
    <div class="container">
      <h2 class="section-title animate-on-scroll"><?= $modules_title; ?></h2>
      <div class="section-subtitle animate-on-scroll">
        <?= !empty($modules_group['subtitle']) ? esc_html($modules_group['subtitle']) : 'Повний набір інструментів для автоматизації всіх бізнес-процесів страхової компанії'; ?>
      </div>

      <div class="modules-grid">
        <?php $tile_index = 0; foreach ($module_tiles as $tile) { ?>
          <?php
          $tag = !empty($tile['destination_page']) ? 'a' : 'div';
          $href = !empty($tile['destination_page']) ? ' href="' . esc_url($tile['destination_page']) . '"' : '';
          $tile_desc = !empty($tile['description']) ? $tile['description'] : (isset($module_desc_defaults[$tile_index]) ? $module_desc_defaults[$tile_index] : '');
          ?>
          <<?= $tag; ?><?= $href; ?> class="module-card animate-on-scroll stagger-<?= $stagger; ?>" style="text-decoration:none;">
            <div class="module-icon">
              <?= $tile['icon']; ?>
            </div>
            <h3 class="module-title"><?= $tile['name']; ?></h3>
            <?php if ($tile_desc) { ?>
              <p class="module-description"><?= esc_html($tile_desc); ?></p>
            <?php } ?>
          </<?= $tag; ?>>
        <?php
          $stagger++;
          $tile_index++;
        } ?>
      </div>
    </div>
  </section>

  <!-- ========================================
       YouTube Section
     ======================================== -->
  <section class="youtube-section section" id="youtube">
    <?php
    $youtube_section = get_field('youtube_section');
    $youtube_title = $youtube_section['title'];
    $youtube_text = $youtube_section['text'];
    $youtube_videos = $youtube_section['youtube_videos'];
    $button_text = $youtube_section['button_text'];
    $button_link = $youtube_section['button_link'];
    $yt_stagger = 1;
    ?>
    <div class="container">
      <h2 class="section-title animate-on-scroll"><?= $youtube_title; ?></h2>
      <div class="section-subtitle animate-on-scroll"><?= $youtube_text; ?></div>

      <div class="youtube-grid">
        <?php foreach ($youtube_videos as $video) { ?>
          <a href="<?= esc_url($video['youtube_video_link']); ?>" target="_blank" rel="noopener" class="video-card animate-on-scroll stagger-<?= $yt_stagger; ?>">
            <div class="video-thumbnail">
              <img src="<?= esc_url($video['preview_image_url']); ?>" alt="<?= esc_attr($video['title']); ?>" />
              <div class="video-play-btn">
                <i class="fas fa-play"></i>
              </div>
            </div>
            <div class="video-content">
              <h3 class="video-title"><?= $video['title']; ?></h3>
              <p class="video-description"><?= $video['description']; ?></p>
            </div>
          </a>
        <?php
          $yt_stagger++;
        } ?>
      </div>

      <div class="youtube-cta animate-on-scroll">
        <a href="<?= esc_url($button_link); ?>" target="_blank" class="btn btn-primary">
          <i class="fab fa-youtube"></i>
          <?= $button_text; ?>
        </a>
      </div>
    </div>
  </section>

  <!-- ========================================
       Characteristics / Features Section
     ======================================== -->
  <section class="features-section section" id="features">
    <?php
    $characteristics_section = get_field('characteristics_section');
    $characteristics_title = $characteristics_section['title'];
    $characteristics_blocks = $characteristics_section['section_blocks'];
    $feature_index = 0;
    ?>
    <div class="container">
      <h2 class="section-title animate-on-scroll"><?= $characteristics_title; ?></h2>
      <div class="section-subtitle animate-on-scroll"><?= !empty($characteristics_section['subtitle']) ? esc_html($characteristics_section['subtitle']) : 'Функціонал, що відповідає найвищим стандартам страхової галузі'; ?></div>

      <?php
      // Fallback badge icons (inline SVG), texts and checklists for each feature block
      $feature_defaults = [
        [
          'badge_icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M6.5 2.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm5 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM4 6.5A1.5 1.5 0 1 1 2.5 5 1.5 1.5 0 0 1 4 6.5zm2.5 0A1.5 1.5 0 1 1 5 5a1.5 1.5 0 0 1 1.5 1.5zm5 0A1.5 1.5 0 1 1 10 5a1.5 1.5 0 0 1 1.5 1.5zM6.5 13.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm5 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM14 6.5A1.5 1.5 0 1 1 12.5 5 1.5 1.5 0 0 1 14 6.5z"/></svg>',
          'badge_text' => 'Гнучкість',
          'checklist' => ['Налаштування без програмування', 'Візуальний редактор бізнес-процесів', 'Гнучка система ролей та прав доступу'],
        ],
        [
          'badge_icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M1 14h2V6H1v8zm4 0h2V2H5v12zm4 0h2V8H9v6zm4 0h2V4h-2v10z"/></svg>',
          'badge_text' => 'Аналітика',
          'checklist' => ['Дашборди в реальному часі', 'Звіти для НБУ та внутрішні', 'Аналіз збитковості портфеля'],
        ],
        [
          'badge_icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M4.7 8.7l-2-2a1 1 0 0 0-1.4 1.4l2.7 2.7a1 1 0 0 0 1.4 0l2.7-2.7a1 1 0 0 0-1.4-1.4l-2 2zM11.3 7.3l2 2a1 1 0 0 1-1.4 1.4L9.2 8a1 1 0 0 1 0-1.4l2.7-2.7a1 1 0 0 1 1.4 1.4l-2 2z"/></svg>',
          'badge_text' => 'Інтеграції',
          'checklist' => ['API для зовнішніх систем', 'Імпорт/експорт даних', 'Інтеграція з ЦБД МТСБУ'],
        ],
        [
          'badge_icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 1L2 4.5v4c0 3.5 2.6 6.4 6 7.5 3.4-1.1 6-4 6-7.5v-4L8 1zm0 2.2l4 2.3v3c0 2.6-1.9 4.8-4 5.7-2.1-.9-4-3.1-4-5.7v-3l4-2.3z"/></svg>',
          'badge_text' => 'Безпека',
          'checklist' => ['Відповідність вимогам НБУ', 'Шифрування даних', 'Аудит усіх операцій'],
        ],
      ];
      ?>
      <div class="features-grid">
        <?php foreach ($characteristics_blocks as $block) { ?>
          <?php
          $fb = isset($feature_defaults[$feature_index]) ? $feature_defaults[$feature_index] : ['badge_icon' => '', 'badge_text' => '', 'checklist' => []];
          $badge_icon = !empty($block['badge_icon']) ? $block['badge_icon'] : $fb['badge_icon'];
          $badge_text = !empty($block['badge_text']) ? $block['badge_text'] : $fb['badge_text'];
          $checklist = !empty($block['checklist_items']) ? $block['checklist_items'] : array_map(function($t) { return ['text' => $t]; }, $fb['checklist']);
          ?>
          <div class="feature-row <?= ($feature_index % 2 !== 0) ? 'reverse' : ''; ?>">
            <div class="feature-content animate-on-scroll <?= ($feature_index % 2 !== 0) ? 'from-right' : 'from-left'; ?>">
              <?php if ($badge_text) { ?>
                <div class="feature-badge">
                  <?php if ($badge_icon) { ?>
                    <span class="feature-badge-icon"><?= $badge_icon; ?></span>
                  <?php } ?>
                  <?= esc_html($badge_text); ?>
                </div>
              <?php } ?>
              <h3 class="feature-title"><?= $block['title']; ?></h3>
              <div class="feature-description">
                <?= $block['text']; ?>
              </div>
              <?php if (!empty($checklist)) { ?>
                <ul class="feature-checklist">
                  <?php foreach ($checklist as $item) { ?>
                    <li><span class="check-icon"><i class="fas fa-check"></i></span> <?= esc_html(is_array($item) ? $item['text'] : $item); ?></li>
                  <?php } ?>
                </ul>
              <?php } ?>
            </div>
            <div class="feature-visual animate-on-scroll <?= ($feature_index % 2 !== 0) ? 'from-left' : 'from-right'; ?>">
              <div class="feature-decoration feature-decoration-<?= ($feature_index % 2 === 0) ? '1' : '2'; ?>"></div>
              <img src="<?= esc_url($block['image']); ?>" alt="<?= esc_attr($block['title']); ?>" class="feature-image" />
            </div>
          </div>
        <?php
          $feature_index++;
        } ?>
      </div>
    </div>
  </section>

  <!-- ========================================
       Web Shop / ІМКД Section
     ======================================== -->
  <section class="fund-exchange-section section" id="shop">
    <?php
    $shop_section = get_field('web_shop_section');
    $shop_title = $shop_section['title'];
    $shop_text = $shop_section['text'];
    $shop_image_url = $shop_section['image'];
    $shop_button_url = $shop_section['button_url'];
    $shop_button_text = $shop_section['button_text'];
    ?>
    <div class="container">
      <div class="fund-exchange-grid">
        <div class="animate-on-scroll from-left">
          <div class="feature-badge">
            <span class="feature-badge-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M5.5 13a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm7 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM1 1a1 1 0 0 0 0 2h1.2l1.6 7.2A2 2 0 0 0 5.7 12h6.6a2 2 0 0 0 1.9-1.4L16 5H4.1l-.4-1.8A2 2 0 0 0 1.8 1H1z"/></svg></span>
            Онлайн-продажі
          </div>
          <h2 class="section-title" style="text-align: left"><?= $shop_title; ?></h2>
          <div class="feature-description" style="max-width: 520px;">
            <?= $shop_text; ?>
          </div>
          <?php if (!empty($shop_button_url)) { ?>
            <a class="btn btn-primary" href="<?= esc_url($shop_button_url); ?>" style="margin-top: 20px;">
              <?= $shop_button_text; ?>
            </a>
          <?php } ?>
        </div>
        <div class="feature-visual animate-on-scroll from-right">
          <div class="feature-decoration feature-decoration-2"></div>
          <img src="<?= esc_url($shop_image_url); ?>" alt="<?= esc_attr($shop_title); ?>" class="feature-image" />
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================
       Architecture Section
     ======================================== -->
  <section class="architecture-section section" id="architecture">
    <?php
    $architecture_section = get_field('architecture_section');
    $architecture_title = $architecture_section['title'];
    $architecture_text = $architecture_section['text'];
    $architecture_main = $architecture_section['main_content'];
    $architecture_content_text = $architecture_main['text'];
    $architecture_image = $architecture_main['image'];
    ?>
    <div class="container">
      <div class="architecture-grid">
        <div class="architecture-content animate-on-scroll from-left">
          <h2 class="section-title"><?= $architecture_title; ?></h2>
          <div class="section-subtitle"><?= $architecture_text; ?></div>

          <?php
          // TODO: Register ACF field 'architecture_features' (repeater with icon_class, text) in architecture_section
          $arch_features = !empty($architecture_section['architecture_features']) ? $architecture_section['architecture_features'] : [
            ['icon_class' => 'fas fa-globe', 'text' => 'Web-інтерфейс'],
            ['icon_class' => 'fas fa-cogs', 'text' => 'Java-сервіси на Spring Boot'],
            ['icon_class' => 'fas fa-database', 'text' => 'MS SQL Server'],
            ['icon_class' => 'fas fa-expand-arrows-alt', 'text' => 'Горизонтальна масштабованість'],
          ];
          ?>
          <div class="architecture-features">
            <?php foreach ($arch_features as $feat) { ?>
              <div class="architecture-feature">
                <div class="architecture-feature-icon">
                  <i class="<?= esc_attr($feat['icon_class']); ?>"></i>
                </div>
                <div class="architecture-feature-text"><?= esc_html($feat['text']); ?></div>
              </div>
            <?php } ?>
          </div>

          <?php
          $arch_tech_tags = !empty($architecture_section['tech_tags']) ? $architecture_section['tech_tags'] : ['Java', 'Spring Boot', 'MS SQL', 'REST API', 'Docker'];
          ?>
          <div class="tech-tags">
            <?php foreach ($arch_tech_tags as $tag) { ?>
              <span class="tech-tag"><?= esc_html(is_array($tag) ? $tag['name'] : $tag); ?></span>
            <?php } ?>
          </div>

          <?php
          // TODO: Register ACF field 'tech_requirements_url' in architecture_section
          $tech_req_url = !empty($architecture_section['tech_requirements_url']) ? $architecture_section['tech_requirements_url'] : '';
          $tech_req_text = !empty($architecture_section['tech_requirements_text']) ? $architecture_section['tech_requirements_text'] : 'Технічні вимоги (PDF)';
          ?>
          <?php if ($tech_req_url) { ?>
            <a href="<?= esc_url($tech_req_url); ?>" class="btn btn-outline" style="margin-top: 20px;" target="_blank">
              <i class="fas fa-file-pdf"></i>
              <?= esc_html($tech_req_text); ?>
            </a>
          <?php } ?>
        </div>

        <div class="feature-visual animate-on-scroll from-right">
          <img src="<?= esc_url($architecture_image); ?>" alt="<?= esc_attr($architecture_title); ?>" class="feature-image" />
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================
       History Timeline Section (Horizontal)
     ======================================== -->
  <section class="history-section section" id="history">
    <?php
    $history_section = get_field('history_section');
    $history_title = $history_section['title'];
    $history_versions = $history_section['history_versions'];
    ?>
    <div class="container">
      <h2 class="section-title animate-on-scroll"><?= $history_title; ?></h2>
      <div class="section-subtitle animate-on-scroll"><?= !empty($history_section['subtitle']) ? esc_html($history_section['subtitle']) : 'Хронологія розвитку системи КСАСК ProfITsoft'; ?></div>

      <div class="history-vertical animate-on-scroll">
        <?php foreach ($history_versions as $version) { ?>
          <div class="history-v-item">
            <div class="history-v-year"><?= esc_html($version['year']); ?></div>
            <div class="history-v-line">
              <div class="history-v-dot"></div>
            </div>
            <div class="history-v-card">
              <span class="history-v-version">Версія <?= esc_html($version['version']); ?></span>
              <h4 class="history-v-title"><?= esc_html($version['title']); ?></h4>
              <div class="history-v-description"><?= $version['text']; ?></div>
              <?php if (!empty($version['features'])) { ?>
                <div class="history-v-tags">
                  <?php foreach (array_filter(array_map('trim', preg_split('/[\n,]+/', $version['features']))) as $tag) { ?>
                    <span class="history-v-tag"><?= esc_html($tag); ?></span>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- ========================================
       Pricing Section
     ======================================== -->
  <section class="pricing-section section" id="pricing">
    <?php
    $prices_section = get_field('prices_section');
    $prices_title = $prices_section['title'];
    $prices_list = $prices_section['prices_list'];
    $prices_title_dev = $prices_section['title_dev'];
    $prices_text_dev = $prices_section['text_dev'];
    $prices_list_for_dev = $prices_section['prices_list_for_dev'];
    ?>
    <?php
    $prices_subtitle = !empty($prices_section['subtitle']) ? $prices_section['subtitle'] : 'Спеціальна пропозиція для страхових компаній України';
    $prices_badge = !empty($prices_section['badge_text']) ? $prices_section['badge_text'] : 'АКЦІЯ';
    $current_lang = pll_current_language();

    // Get first license card and first dev support card
    $license_card = $prices_list[0] ?? null;
    $dev_card = $prices_list_for_dev[0] ?? null;

    // License card features (from ACF or fallback)
    $license_features = [];
    if (!empty($license_card['features_list'])) {
      $license_features = array_filter(array_map('trim', explode("\n", $license_card['features_list'])));
    }
    if (empty($license_features)) {
      $license_features = ['Повний доступ до вихідного коду', 'Всі модулі системи', 'Необмежена кількість користувачів', 'Безстрокова ліцензія'];
    }

    $license_btn_text = !empty($license_card['button_text']) ? $license_card['button_text'] : 'Дізнатись умови';
    $license_btn_url = !empty($license_card['button_url']) ? $license_card['button_url'] : '/licence-1-uah';
    $license_period = !empty($license_card['period']) ? $license_card['period'] : 'одноразовий платіж';

    // Dev card features (from ACF or fallback)
    $dev_features = [];
    if (!empty($dev_card['features_list'])) {
      $dev_features = array_filter(array_map('trim', explode("\n", $dev_card['features_list'])));
    }
    if (empty($dev_features)) {
      $dev_features = ['Команда фахівців', 'Доопрацювання під ваші потреби', 'Технічна підтримка', 'Оновлення системи'];
    }

    $dev_btn_text = !empty($dev_card['button_text']) ? $dev_card['button_text'] : 'Замовити консультацію';
    $dev_btn_url = !empty($dev_card['button_url']) ? $dev_card['button_url'] : '#form-popup';
    $dev_period = !empty($dev_card['period']) ? $dev_card['period'] : 'на місяць';
    ?>
    <div class="container">
      <h2 class="section-title animate-on-scroll"><?= $prices_title; ?></h2>
      <div class="section-subtitle animate-on-scroll"><?= esc_html($prices_subtitle); ?></div>

      <div class="pricing-grid">
        <!-- Card 1: License (featured) -->
        <?php if ($license_card) { ?>
          <div class="pricing-card featured animate-on-scroll stagger-1">
            <div class="pricing-badge"><?= esc_html($prices_badge); ?></div>
            <h3 class="pricing-title"><?= $license_card['title']; ?></h3>
            <p class="pricing-subtitle"><?= $license_card['text'] ?? ''; ?></p>

            <?php if ($current_lang == "ua") { ?>
              <div class="pricing-old"><?= $license_card['fixed_price']; ?></div>
              <div class="pricing-price">
                <span class="pricing-price-value">1</span>
                <span class="pricing-price-unit">грн</span>
              </div>
              <p class="pricing-period"><?= esc_html($license_period); ?></p>
            <?php } else { ?>
              <div class="pricing-old" style="visibility: hidden;">-</div>
              <div class="pricing-price">
                <span class="pricing-price-value"><?= $license_card['fixed_price']; ?></span>
              </div>
              <p class="pricing-period">&nbsp;</p>
            <?php } ?>

            <ul class="pricing-features">
              <?php foreach ($license_features as $feat) { ?>
                <li><i class="fas fa-check"></i> <?= esc_html($feat); ?></li>
              <?php } ?>
            </ul>

            <a class="btn btn-primary" href="<?= esc_url($license_btn_url); ?>" style="width: 100%;"><?= esc_html($license_btn_text); ?></a>
          </div>
        <?php } ?>

        <!-- Card 2: Dev Support -->
        <?php if ($dev_card) { ?>
          <div class="pricing-card animate-on-scroll stagger-2">
            <h3 class="pricing-title"><?= $dev_card['title']; ?></h3>
            <p class="pricing-subtitle"><?= $dev_card['text'] ?? ''; ?></p>
            <div class="pricing-old" style="visibility: hidden;">-</div>
            <div class="pricing-price">
              <span class="pricing-price-value"><?= $dev_card['fixed_price']; ?></span>
            </div>
            <p class="pricing-period"><?= esc_html($dev_period); ?></p>

            <ul class="pricing-features">
              <?php foreach ($dev_features as $feat) { ?>
                <li><i class="fas fa-check"></i> <?= esc_html($feat); ?></li>
              <?php } ?>
            </ul>

            <a href="<?= esc_url($dev_btn_url); ?>" class="btn btn-outline" style="width: 100%;"><?= esc_html($dev_btn_text); ?></a>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- ========================================
       Exchange Fund Section (UA only)
     ======================================== -->
  <?php if (pll_current_language() == "ua") { ?>
  <section class="fund-exchange-section section" id="exchange">
    <?php
    $exchange_section = get_field('exchange_section');
    $exchange_title = $exchange_section['title'];
    $exchange_description = $exchange_section['description'];
    $exchange_benefits = !empty($exchange_section['benefits']) ? $exchange_section['benefits'] : [];
    $exchange_image = !empty($exchange_section['image']) ? $exchange_section['image'] : '';
    $exchange_btn_text = !empty($exchange_section['button_text']) ? $exchange_section['button_text'] : '';
    $exchange_btn_url = !empty($exchange_section['button_url']) ? $exchange_section['button_url'] : '';

    // Fallback: override wall-of-text description with short subtitle
    if (empty($exchange_description) || strlen(strip_tags($exchange_description)) > 200) {
      $exchange_description = 'Унікальна можливість для страхових компаній спільно розвивати систему та обмінюватись напрацюваннями';
    }

    // Fallback: benefit cards
    if (empty($exchange_benefits)) {
      $exchange_benefits = [
        ['icon_class' => 'fas fa-user-tie', 'title' => 'Персональний менеджер', 'description' => 'Призначення персонального менеджера для вашої компанії'],
        ['icon_class' => 'fas fa-tasks', 'title' => 'Реєстр задач', 'description' => 'Участь у спільному реєстрі задач на доопрацювання системи'],
        ['icon_class' => 'fas fa-coins', 'title' => 'Накопичення балансу', 'description' => 'Ваші напрацювання конвертуються в баланс для майбутніх доопрацювань'],
      ];
    }

    // Fallback: image
    if (empty($exchange_image)) {
      $exchange_image = 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&h=500&fit=crop';
    }

    // Fallback: button
    if (empty($exchange_btn_text)) {
      $exchange_btn_text = 'Докладніше про Фонд';
      $exchange_btn_url = '#';
    }
    ?>
    <div class="container">
      <div class="fund-exchange-grid">
        <div class="animate-on-scroll from-left">
          <h2 class="section-title" style="text-align: left"><?= $exchange_title; ?></h2>
          <div class="feature-description" style="max-width: 520px;">
            <?= $exchange_description; ?>
          </div>

          <?php if ($exchange_benefits) { ?>
            <div class="fund-benefits">
              <?php foreach ($exchange_benefits as $benefit) { ?>
                <div class="fund-benefit">
                  <div class="fund-benefit-icon">
                    <i class="<?= esc_attr($benefit['icon_class']); ?>"></i>
                  </div>
                  <div class="fund-benefit-content">
                    <h4><?= esc_html($benefit['title']); ?></h4>
                    <p><?= esc_html($benefit['description']); ?></p>
                  </div>
                </div>
              <?php } ?>
            </div>
          <?php } ?>

          <?php if ($exchange_btn_text && $exchange_btn_url) { ?>
            <a href="<?= esc_url($exchange_btn_url); ?>" class="btn btn-outline" style="margin-top: 30px;">
              <?= esc_html($exchange_btn_text); ?>
            </a>
          <?php } ?>
        </div>

        <?php if ($exchange_image) { ?>
          <div class="feature-visual animate-on-scroll from-right">
            <div class="feature-decoration feature-decoration-2"></div>
            <img src="<?= esc_url($exchange_image); ?>" alt="<?= esc_attr($exchange_title); ?>" class="feature-image" />
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>

  <!-- ========================================
       Certificates Section
     ======================================== -->
  <section class="certificates-section section" id="certificates">
    <?php
    $certificates_section = get_field('certificates_section');
    $certificates_title = $certificates_section['title_1'];
    $certificates_text = $certificates_section['text'];
    $certificates_list = $certificates_section['certificates_list_1'];
    $cert_stagger = 1;
    ?>
    <div class="container">
      <h2 class="section-title animate-on-scroll"><?= $certificates_title; ?></h2>
      <div class="section-subtitle animate-on-scroll"><?= $certificates_text; ?></div>

      <div class="certificates-grid">
        <?php foreach ($certificates_list as $certificate) { ?>
          <div class="certificate-card animate-on-scroll stagger-<?= $cert_stagger; ?>">
            <div class="certificate-image">
              <img src="<?= esc_url($certificate['image_url']); ?>" alt="<?= esc_attr($certificate['title']); ?>" />
            </div>
            <div class="certificate-content">
              <div class="certificate-title"><?= $certificate['title']; ?></div>
            </div>
          </div>
        <?php $cert_stagger++; } ?>
      </div>
    </div>
  </section>

  <!-- ========================================
       Education / Training Section
     ======================================== -->
  <section class="training-section section" id="training">
    <?php
    $education_section = get_field('education_section');
    $education_title = $education_section['title'];
    $education_text = !empty($education_section['text']) ? $education_section['text'] : 'Комплексний курс навчання для адміністраторів та користувачів системи з видачею офіційного сертифіката.';
    $education_button_text = !empty($education_section['button_text']) ? $education_section['button_text'] : 'Записатись на курс';
    $education_button_url = $education_section['button_url'];
    $education_image_url = $education_section['image_url'];
    ?>
    <div class="container">
      <div class="training-grid">
        <div class="training-content animate-on-scroll from-left">
          <h2 class="section-title"><?= $education_title; ?></h2>
          <p class="training-description"><?= $education_text; ?></p>

          <?php
          $edu_stats = !empty($education_section['stats']) ? $education_section['stats'] : [
            ['value' => '20+', 'label' => 'Лекцій'],
            ['value' => '40+', 'label' => 'Годин практики'],
            ['value' => '100%', 'label' => 'Сертифікація'],
          ];
          ?>
          <div class="training-stats">
            <?php foreach ($edu_stats as $stat) { ?>
              <div class="training-stat">
                <div class="training-stat-value"><?= esc_html($stat['value']); ?></div>
                <div class="training-stat-label"><?= esc_html($stat['label']); ?></div>
              </div>
            <?php } ?>
          </div>

          <a href="<?= esc_url($education_button_url); ?>" class="btn btn-primary">
            <i class="fas fa-graduation-cap"></i>
            <?= $education_button_text; ?>
          </a>
        </div>

        <div class="training-image animate-on-scroll from-right">
          <img src="<?= esc_url($education_image_url); ?>" alt="<?= esc_attr($education_title); ?>" />
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================
       News / Posts Section (UA only)
     ======================================== -->
  <?php if (pll_current_language() == "ua") { ?>
  <?php
  $args = [
    'post_type' => 'post',
    'posts_per_page' => 3,
  ];

  $posts_section = get_field("posts_section");
  $posts_section_title = $posts_section['title'];
  $posts_section_button_text = $posts_section['button_text'];
  $posts_section_button_link = $posts_section['button_link'];

  $all_posts = new WP_Query($args);
  ?>

  <section class="news-section section" id="news">
    <div class="container">
      <?php $posts_subtitle = !empty($posts_section['subtitle']) ? $posts_section['subtitle'] : 'Останні оновлення та новини про розвиток системи'; ?>
      <?php $read_more_text = !empty($posts_section['read_more_text']) ? $posts_section['read_more_text'] : 'Читати далі'; ?>
      <h2 class="section-title animate-on-scroll"><?= $posts_section_title; ?></h2>
      <div class="section-subtitle animate-on-scroll"><?= esc_html($posts_subtitle); ?></div>

      <div class="news-grid">
        <?php $news_stagger = 1; ?>
        <?php if ($all_posts->have_posts()) { ?>
          <?php while ($all_posts->have_posts()) : $all_posts->the_post(); ?>
            <?php
            $excerpt = wp_strip_all_tags(get_the_excerpt());
            $max_len = 120;
            if (mb_strlen($excerpt) > $max_len) {
              $excerpt = mb_substr($excerpt, 0, $max_len - 3) . '...';
            }
            ?>
            <div class="news-card animate-on-scroll stagger-<?= $news_stagger; ?>">
              <a href="<?php the_permalink(); ?>" class="news-image">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                  echo '<div class="news-badge">' . esc_html($categories[0]->name) . '</div>';
                }
                ?>
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('medium', ['alt' => get_the_title()]);
                } ?>
              </a>
              <div class="news-content">
                <div class="news-date"><?php echo get_the_date(); ?></div>
                <h3 class="news-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="news-excerpt"><?= $excerpt; ?></p>
                <a href="<?php the_permalink(); ?>" class="news-link">
                  <?= esc_html($read_more_text); ?> <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          <?php $news_stagger++; endwhile; ?>
        <?php } ?>
      </div>

      <?php wp_reset_postdata(); ?>

      <div class="news-cta animate-on-scroll">
        <a href="<?= esc_url($posts_section_button_link); ?>" class="btn btn-outline">
          <?= $posts_section_button_text; ?>
        </a>
      </div>
    </div>
  </section>
  <?php } ?>

  <!-- ========================================
       Clients Section
     ======================================== -->
  <section class="clients-section section" id="clients">
    <?php
    $clients_section = get_field('clients_section');
    $clients_title = $clients_section['title'];
    $client_logos = $clients_section['client_logos'];
    ?>
    <div class="container">
      <h2 class="section-title animate-on-scroll"><?= $clients_title; ?></h2>
      <div class="section-subtitle animate-on-scroll"><?= !empty($clients_section['subtitle']) ? esc_html($clients_section['subtitle']) : 'Провідні страхові компанії України довіряють КСАСК ProfITsoft'; ?></div>

      <div class="clients-slider">
        <div class="clients-track">
          <?php foreach ($client_logos as $client_logo) { ?>
            <img
              src="<?= esc_url($client_logo['logo']); ?>"
              alt="Client"
              class="client-logo"
              style="height: <?= intval($client_logo['height']); ?>px;"
            />
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('template-parts/footer') ?>
