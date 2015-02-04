<?php get_header() ?>
    <div id="content">

        <div class="wrapper">

           <div class="banner-photo">

            <?php
            $banner_src = get_field('attorneys_header_image', 'options');
            if(strlen($banner_src) == 0)
                $banner_src = get_field('default_page_header_image', 'options');
            ?>
                <img src="<?php echo $banner_src; ?>" alt="" />

            </div><!-- .banner-photo -->

            <h1>Our Attorneys</h1>

            <ul class="bio-thumb-list menu"><?php

                while(have_posts()){
                    the_post();
                    ?><li>
                        <a href="<?php the_permalink() ?>">
                            <img src="<?php the_field('photos') ?>" alt="<?php the_title() ?>" />
                            <h4><?php the_title() ?></h4>
                            <p><em><?php the_field('title') ?></em></p>
                        </a>
                    </li><?php
                }
                
            ?></ul>
            <!-- Spaces removed for inline-block -->

        </div><!-- .wrapper -->

    </div><!-- #content -->
<?php get_footer() ?>