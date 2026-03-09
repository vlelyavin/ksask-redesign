<?php
$excerpt = wp_strip_all_tags( get_the_excerpt() );
$max_len = 100; // number of characters
if ( mb_strlen( $excerpt ) > $max_len ) {
    $excerpt = mb_substr( $excerpt, 0, $max_len - 3 ) . '...';
}

?>

<div class="posts__list__item" id="post-<?php the_ID(); ?>">

              <!-- Featured Image -->
              
                <a class="posts__list__item__image" href="<?php the_permalink(); ?>">
                  <?php 
                  if ( has_post_thumbnail() ) {
                    // Use 'medium' or any registered image size
                    the_post_thumbnail( 'medium', [ 'alt' => get_the_title() ] );
                  } else {
                    // Fallback placeholder
                    echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/placeholder.png' ) . '" alt="No image">';
                  }
                  ?>
                </a>
              

              <div class="posts__list__item__content">
				<!-- Title -->
				  <div class="posts__list__item__title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				  </div>

				  <!-- Excerpt -->
				  <div class="posts__list__item__description">
					<?= $excerpt; ?>
				  </div>  
				  
				  <div class="posts__list__item__meta">
					<?php echo get_the_date(); ?>
				  </div>	
			  </div>

            </div>