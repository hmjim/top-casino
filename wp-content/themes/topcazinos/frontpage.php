<?php
/*
Template Name: Главная
*/
get_header(); ?>

    <div class="wrapper">
        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="main">
                        <div class="post">
                            <h1 class="rating-title">ТОП лучших казино на реальные деньги</h1>
                            <table class="rating-table">
                                <tr>
                                    <th class="tbl_number">№</th>
                                    <th>Онлайн казино</th>
                                    <th>Выплаты</th>
                                    <th>Автоматы</th>
                                    <th>Программы лояльности</th>
                                    <th>Обзор</th>
                                    <th>Играть</th>
                                </tr>
								<?php $i = 1;
								foreach ( get_field( 'top' ) as $casino ): ?>
                                    <tr>
                                        <td class="tbl_number">
											<?php if ( $i <= 3 ) { ?>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/<?= $i; ?>star.png" alt="Призовое место в рейтинге" title="Призовое место в рейтинге">
											<?php } else {
												if ( $i < 10 ) {
													echo "<span class='number'>0";
												}
												echo $i . "</span>";
											}; ?>

                                        </td>
                                        <td class="tbl_img">
                                            <a href="<?php echo get_post_permalink( $casino['item'] ); ?>">
												<?php $thumb = get_post( get_post_thumbnail_id( $casino['item'] ) ); ?>
                                                <img src="<?php echo kama_thumb_src( 'w=148 &h=102', $thumb->guid ); ?>" title="<?php echo $thumb->post_title; ?>" alt="<?php echo get_post_meta( $thumb->ID, '_wp_attachment_image_alt', true ); ?>">
                                            </a>
                                        </td>
                                        <td class="tbl_payments">
                                            <div class="payments">
												<?php foreach ( get_field( 'payments', $casino['item'] ) as $item ): ?>
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/payments/<?php echo $item['item']['value']; ?>.png" alt="<?php echo $item['item']['label']; ?>" title="<?php echo $item['item']['label']; ?>">
												<?php endforeach; ?>
                                            </div>
                                        </td>
                                        <td class="tbl_soft">
											<?php the_field( 'soft', $casino['item'] ); ?>
                                        </td>
                                        <td class="tbl_bonuses">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/<?php echo get_field( 'bonuses', $casino['item'] )['value']; ?>r.png" alt="<?php echo get_field( 'bonuses', $casino['item'] )['label']; ?>" title="<?php echo get_field( 'bonuses', $casino['item'] )['label']; ?>">

                                        </td>
                                        <td class="tbl_reviews">
                                            <a href="<?php echo get_post_permalink( $casino['item'] ); ?>" title="Обзор и отзывы о казино">Обзор</a>
                                        </td>
                                        <td class="tbl_play">
                                            <a href="<?php the_field( 'link', $casino['item'] ); ?>" title="Официальный сайт казино" target="_blank">Играть</a>
                                        </td>
                                    </tr>
                                  
									<?php $i ++; endforeach; ?>

                            </table>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
                            <div class="home-text post-content">
                                <h2><?php the_title(); ?></h2>
								<?php the_content(); ?>
                            </div>
<?php endwhile; ?>
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

<?php get_footer(); // подключаем footer.php ?>