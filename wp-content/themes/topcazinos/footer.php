<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="footer-menu">
                    <ul>
	                    <?php wp_nav_menu( array( 'theme_location' => 'bottom' ) ); ?>
                    </ul>
                </nav>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-logo">
                        <a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/footer-logo.png" alt=""></a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="copyright">
                        © 2022. <?= $_SERVER['HTTP_HOST'] ?> Только проверенные онлайн клубы.
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>