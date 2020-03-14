<?php

/**
 * The footer for our theme
 * 
 * @since   1.0.0
 * @package Horus
 * @author  Omar Ali <OmarXcoder@gmail.com>
 */
?>
</main><!-- End of the main content area -->

<footer id="site-footer" class="site-footer">
    <div class="site-footer__widgets">
        <div class="container">
            <div class="row footer-widgets-row">

                <?php if (dynamic_sidebar('ox_widgets_footer_area')); ?>

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .site-footer__widgets -->
</footer>

<?php wp_footer(); ?>

</body>

</html>