<?php
/**
 * Template Name: All Posts
 */
get_template_part("template-parts/header");

$paged = max(1, get_query_var('paged'));
$posts_per_page = (int) get_option('posts_per_page', 10);
$args = [
  'post_type' => 'post',
  'posts_per_page' => $posts_per_page,
  'paged' => $paged,
];

$all_posts = new WP_Query($args);
?>

<main class="main">
  <div class="blog-archive-wrapper">
    <?php
      $posts_page_id = get_option('page_for_posts');
      $posts_page_title = esc_html(get_the_title($posts_page_id));

      $data = [
        "active_item_title" => $posts_page_title
      ];

      get_template_part("template-parts/breadcrumbs", null, $data);
    ?>

    <h1 class="blog-archive-title"><?= $posts_page_title; ?></h1>

    <div class="blog-archive-grid">
      <?php if ($all_posts->have_posts()) { ?>
        <?php while ($all_posts->have_posts()) : $all_posts->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="blog-post-card">
            <?php if (has_post_thumbnail()) { ?>
              <div class="blog-post-card-image">
                <?php the_post_thumbnail('medium_large', ['alt' => get_the_title()]); ?>
              </div>
            <?php } ?>
            <div class="blog-post-card-content">
              <div class="blog-post-card-date"><?php echo get_the_date(); ?></div>
              <h3 class="blog-post-card-title"><?php the_title(); ?></h3>
              <?php
              $excerpt = wp_strip_all_tags(get_the_excerpt());
              if (mb_strlen($excerpt) > 120) {
                $excerpt = mb_substr($excerpt, 0, 117) . '...';
              }
              ?>
              <p class="blog-post-card-excerpt"><?= $excerpt; ?></p>
            </div>
          </a>
        <?php endwhile; ?>
      <?php } ?>
    </div>

    <?php if ($all_posts->max_num_pages > 1) { ?>
      <nav class="blog-pagination">
        <?php
        echo paginate_links([
          'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
          'format' => '?paged=%#%',
          'current' => $paged,
          'total' => $all_posts->max_num_pages,
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;',
        ]);
        ?>
      </nav>
    <?php } ?>

    <?php wp_reset_postdata(); ?>
  </div>
</main>

<?php get_template_part("template-parts/footer"); ?>
