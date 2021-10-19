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
                            <div class="post casino-review">
                                <h1 class="rating-title">Онлайн казино <?php the_title(); ?> на реальные деньги</h1>
                                <table class="rating-table">
                                    <tr>
                                        <th>Онлайн казино</th>
                                        <th>Методы выплаты</th>
                                        <th>Софт</th>
                                        <th>Бонусы и акции</th>
                                        <th>Играть</th>
                                    </tr>
                                    <tr>
                                        <td class="tbl_img">

											<?php $thumb = get_post( get_post_thumbnail_id( get_the_ID() ) ); ?>
                                            <img src="<?php echo kama_thumb_src( 'w=148 &h=102' ); ?>"
                                                 title="<?php echo $thumb->post_title; ?>"
                                                 alt="<?php echo get_post_meta( $thumb->ID, '_wp_attachment_image_alt', true ); ?>">

                                        </td>
                                        <td class="tbl_payments">
                                            <div class="payments">
												<?php foreach ( get_field( 'payments' ) as $item ): ?>
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/payments/<?php echo $item['item']['value']; ?>.png"
                                                         alt="<?php echo $item['item']['label']; ?>"
                                                         title="<?php echo $item['item']['label']; ?>">
												<?php endforeach; ?>
                                            </div>
                                        </td>
                                        <td class="tbl_soft">
											<?php the_field( 'soft' ); ?>
                                        </td>
                                        <td class="tbl_bonuses">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/<?php echo get_field( 'bonuses' )['value']; ?>r.png"
                                                 alt="<?php echo get_field( 'bonuses' )['label']; ?>"
                                                 title="<?php echo get_field( 'bonuses' )['label']; ?>">
                                        </td>
                                        <td class="tbl_play">
                                            <a href="<?php the_field( 'link' ); ?>" target="_blank">Играть в казино</a>
                                        </td>
                                    </tr>

                                </table>

                                <div class="row">
                                    <div class="casino-rows">
                                        <div class="col-md-6 nr">
                                            <div class="minuses">
                                                <div class="row-title"><span>Минусы казино</span></div>
                                                <div class="row-items">
                                                    <ul>
														<?php foreach ( get_field( 'minuses' ) as $item ): ?>
                                                            <li><?php echo $item['text']; ?></li>
														<?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 nl">
                                            <div class="pluses">
                                                <div class="row-title"><span>Плюсы казино</span></div>
                                                <div class="row-items">
                                                    <ul>
														<?php foreach ( get_field( 'pluses' ) as $item ): ?>
                                                            <li><?php echo $item['text']; ?></li>
														<?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <a href="<?php the_field( 'link' ); ?>" class="gobutton">Играть в казино</a>
                                    </div>
                                </div>

                                <div class="post-content">
									<?php the_content(); ?>
                                </div>

                                <a href="<?php the_field( 'link' ); ?>" class="gobutton">Играть в казино</a>
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
                                <div class="back"><a href="/">Вернуться в топ казино</a></div>

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

