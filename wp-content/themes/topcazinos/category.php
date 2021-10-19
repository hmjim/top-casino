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
                        <h1 class="rating-title"><?php single_cat_title(); ?></h1>
                        <?php if(category_description()): ?>
                        <div class="category-description">
		                    <?php echo category_description();  ?>
                        </div>
                        <?php endif; ?>
                    </div>
					<?php if ( have_posts() ) {
						while ( have_posts() ) : the_post(); // старт цикла ?>
                            <div class="loop-post">
                                <a href="<?php the_permalink(); ?>" class="loop-title"><?php the_title(); ?></a>
                            </div>
						<?php endwhile;
					}  else {echo "<div class='no-posts'>Пока тут ничего нет. Извините</div>";} ?>
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

