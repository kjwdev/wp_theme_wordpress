    </div>
    <footer>
        <div class="wrapper row">
            <div class="col box-logo">
                <div class="col-content first-col">
                    <h1 class="logo">  
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo-header.png" />
                        </a>
                        <div class="logo-part">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                Développement
                            </a>
                        </div>
                    </h1>
                    <div class="sep"></div>
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="sidebar">
                                <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div><!-- #secondary -->
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <div class="col-content">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <div class="sidebar">
                                <?php dynamic_sidebar( 'footer-2' ); ?>
                        </div><!-- #secondary -->
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <div class="col-content">
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <div class="sidebar">
                                <?php dynamic_sidebar( 'footer-3' ); ?>
                        </div><!-- #secondary -->
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <div class="col-content">
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                        <div class="sidebar">
                                <?php dynamic_sidebar( 'footer-4' ); ?>
                        </div><!-- #secondary -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>
</div>
<script type="text/javascript">
    /*
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-59470992-1', 'auto');
    ga('send', 'pageview');
    */
</script>
<?php wp_footer(); ?>
</body>

</html>	