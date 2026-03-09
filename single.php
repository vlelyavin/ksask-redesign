<?php get_template_part('template-parts/header'); ?>

<main class="main">
  <div class="single-post-wrapper">
    <?php
      $posts_page_id = get_option('page_for_posts');
      $posts_page_title = esc_html(get_the_title($posts_page_id));
      $posts_page_link = get_permalink($posts_page_id);

      $data = [
        "posts_page_title" => $posts_page_title,
        "posts_page_link" => $posts_page_link,
        "active_item_title" => get_the_title()
      ];

      get_template_part("template-parts/breadcrumbs", null, $data);
    ?>

    <div class="single-post-header">
      <h1 class="single-post-title"><?php the_title(); ?></h1>

      <div class="single-post-meta">
        <?php
        $categories = get_the_category();
        if ($categories) {
          foreach ($categories as $cat) {
            echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" class="cat-badge">' . esc_html($cat->name) . '</a>';
          }
        }
        ?>
        <span><?php echo get_the_date(); ?></span>
      </div>

      <div class="single__page__share">
        <?php
          $url = urlencode(get_permalink());
          $title = urlencode(get_the_title());
        ?>
        <a class="share-btn share-instagram"
           href="https://www.instagram.com/?url=<?php echo $url; ?>"
           target="_blank" rel="noopener">
          <?php get_template_part("template-parts/instagram_icon"); ?>
        </a>
        <a class="share-btn share-linkedin"
           href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>"
           target="_blank" rel="noopener">
          <?php get_template_part("template-parts/linkedin_icon"); ?>
        </a>
        <a class="share-btn share-twitter"
           href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>"
           target="_blank" rel="noopener">
          <?php get_template_part("template-parts/twitter_icon"); ?>
        </a>
      </div>
    </div>

    <?php if (has_post_thumbnail()) : ?>
      <div class="single-post-thumbnail">
        <?php the_post_thumbnail('full', ['class' => 'main-post-image']); ?>
      </div>
    <?php endif; ?>

    <div class="single-post-content">
      <?php the_content(); ?>
    </div>
  </div>
</main>

<?php get_template_part('template-parts/footer'); ?>
