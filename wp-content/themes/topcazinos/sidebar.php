<div class="main-menu">
	<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
</div>

<div class="side-automats">
    <div class="widget-title">Автоматы</div>
    <div class="automats-wrapper">
	    <?php global $post;
	    $posts = get_posts( array( 'numberposts' => 9, 'post_type' => 'slots' ) );
	    foreach ( $posts as $post ) {
	    setup_postdata( $post ); ?>

            <?php
		    $thumb = get_post(get_post_thumbnail_id());
		    $image_alt = get_post_meta( $thumb->ID, '_wp_attachment_image_alt', true);
            ?>
        <div class="automat-item">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo kama_thumb_src("w=208 &h=129"); ?>" title="<?php echo $thumb->post_title; ?>" alt="<?php echo $image_alt; ?>">
            </a>
            <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
        </div>
	    <?php }
	    wp_reset_postdata(); ?>
    </div>
</div>



<div class="another_widgets">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div>
