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
                                <h1 class="rating-title">Игровой автомат <?php the_title(); ?> онлайн</h1>

                                <div class="post-content">
	                                <?php the_field('top_text'); ?>
                                    <div class="main-game-frame">
                                        <iframe src="<?php the_field('iframe') ?>" width="100%" height="477"></iframe>
										<script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div class="pluso" data-background="#ebebeb" data-options="medium,square,line,horizontal,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print"></div>
                                        <div class="slot-rating">
	                                        <?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings(); endif; ?>
                                        </div>
                                        <a href="<?php the_field('game_link') ?>" class="btn btn-green btn-fullwidth"><i class="fa fa-usd" aria-hidden="true"></i> Играть на деньги</a>
										
                                    </div>
                                    <?php the_field('bottom_text'); ?>
                                </div>

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

