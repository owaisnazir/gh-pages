

    <footer id="footer">

        <div  class="wrapper">

            <div class="footer-col">

                <h4>Locations</h4>

                <?php

                $locs = new WP_Query(array(
                    'post_type' => 'office'
                ));

                while($locs->have_posts()){
                    $locs->the_post();

                    echo '<h5>' . get_the_title() . '</h5>';
                    echo '<p>' . get_field('address') . '<br/>';
                    echo get_field('phone') . '<br/>';
                    echo '<a href="mailto:' . get_field('email') . '">' . get_field('email') . '</a></p>';
                }
                ?>

            </div><!-- .footer-col -->

            <div class="footer-col">

                <h4><a href="<?php bloginfo('url') ?>/practice-area/">Practice Areas</a></h4>

                <ul class="menu">
                    <?php

                    wp_list_pages( array(
                        'post_type' => 'practice-area',
                        'title_li' => ''
                    ) );

                    ?>
                </ul>


            </div><!-- .footer-col -->

            <div class="footer-col">

                <nav class="footer-nav">

                    <?php wp_nav_menu( array('theme_location' => 'footer' )); ?>

                </nav>

                <nav class="disclaimer-nav">

                    <ul class="menu">
                        <li><a href="<?php bloginfo('url') ?>/terms-of-use/">Terms of Use</a></li>
                        <li><a href="<?php bloginfo('url') ?>/disclaimer/">Disclaimer</a></li>
                        <li><a href="<?php bloginfo('url') ?>/privacy-policy/">Privacy Policy</a></li>
                    </ul>

                </nav>

                <nav class="social-nav">

                    <ul class="menu">
                        <li class="sn-facebook"><a href="<?php the_field('facebook_url', 'option') ?>">Facebook</a></li>
                        <li class="sn-twitter"><a href="<?php the_field('twitter_url', 'option') ?>">Twitter</a></li>
                        <li class="sn-linkedin"><a href="<?php the_field('linkedin_url', 'option') ?>">Linked In</a></li>
                        <li class="sn-youtube"><a href="<?php the_field('youtube_url', 'option') ?>">You Tube</a></li>
                    </ul>

                </nav>

            </div><!-- .footer-col -->

        </div><!-- .wrapper -->

    </footer><!-- #footer -->

</div><!-- #top -->

    <?php wp_footer(); ?>
    <script src="<?php bloginfo('template_directory') ?>/assets/js/plugins.js"></script>
    <script src="<?php bloginfo('template_directory') ?>/assets/js/main.js"></script>


</body>
</html>