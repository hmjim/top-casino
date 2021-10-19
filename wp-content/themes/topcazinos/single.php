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
					<?php if ( have_posts() ) {
						while ( have_posts() ) : the_post(); // старт цикла ?>
                            <div class="post">
                                <h1 class="rating-title"><?php the_title(); ?></h1>

                                <div class="post-content">
									<?php the_content(); ?>
                                </div>

                            </div>
                            <div class="comments-wrapper">
								<?php if ( comments_open() || get_comments_number() ) {
									comments_template( '', true );
								} ?>
                            </div>
						<?php endwhile;
					} // конец цикла ?>
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

