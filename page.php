<?php get_template_part('template-parts/header') ?>



<main class='main single__page'>
  <div class="text-container">
    <div class="single__page__inner">
		<?php get_template_part("template-parts/breadcrumbs"); ?>
      <div class="single__page__title title">
        <?php the_title() ?>
      </div>
<!--       <a href="/" class="single__page__back__button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 79 79" fill="none">
          <path d="M0 39.208C0 60.862 17.554 78.416 39.208 78.416C60.861 78.416 78.415 60.862 78.415 39.208C78.415 17.554 60.861 0 39.208 0C17.554 0 0 17.554 0 39.208ZM24.924 36.816L43.435 18.304C44.095 17.644 44.96 17.314 45.826 17.314C46.692 17.314 47.557 17.644 48.217 18.304C49.533 19.623 49.537 21.762 48.217 23.081L32.088 39.209L48.216 55.334C49.532 56.654 49.532 58.793 48.216 60.111C46.896 61.431 44.755 61.431 43.441 60.111L24.924 41.598C23.604 40.278 23.604 38.136 24.924 36.816Z" />
        </svg>
        <div class="single__page__back__button__text">
          <?= the_field("back_to_main_button_text", pll_current_language('slug')) ?>
        </div>
      </a> -->
	  <?php if (get_field("youtube_video_link")) { ?>
		  <div>
			<a class="single__page__button" target="_blank" href="<?php the_field("youtube_video_link") ?>">
			<img src="/wp-content/uploads/2025/04/play_v2.svg">
			<?= the_field("view_video_button_text", pll_current_language('slug')) ?></a>	  
		  </div>
	  <?php } ?>

      <div class="single__page__content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</main>

<?php get_template_part('template-parts/footer') ?>