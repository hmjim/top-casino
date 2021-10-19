<?php get_header(); ?>

<div class="wrapper">
    <div class="container">

        <div class="row">
            <div class="col-md-9">
                <div class="main">
                    <div class="breadcrumbs">
						<?php if ( function_exists( 'kama_breadcrumbs' ) ) {
							kama_breadcrumbs( ' / ' );
						} ?>
                    </div>

                    <div class="post">
                        <h1 class="rating-title">Игровые автоматы</h1>
                    </div>

                    <div class="row slots-loop">

						<?php if ( have_posts() ) {
							while ( have_posts() ) : the_post(); // старт цикла ?>

								<?php
								$thumb     = get_post( get_post_thumbnail_id() );
								$image_alt = get_post_meta( $thumb->ID, '_wp_attachment_image_alt', true );
								?>
                                <div class="col-md-4">
                                    <div class="slots-loop-item">
                                        <a href="<?php the_permalink(); ?>" class="loop-title">
                                            <img src="<?php echo kama_thumb_src( "w=262 &h=170" ); ?>" title="<?php echo $thumb->post_title; ?>" alt="<?php echo $image_alt; ?>">
                                            <div class="slot-rating">
		                                        <?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings(); endif; ?>
                                            </div>
                                            <div class="slots-loop-item-title"> <?php the_title(); ?></div>
                                        </a>
                                    </div>
                                </div>
							<?php endwhile;
						} else {
							echo "<div class='no-posts'>Пока тут ничего нет. Извините</div>";
						} ?>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="paginator">
	                            <?php wp_pagenavi(); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="sidebar">
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

