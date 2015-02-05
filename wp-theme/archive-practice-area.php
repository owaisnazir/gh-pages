<?php
get_header();

// get all attorneys, not the wordpress limit per page default
global $query_string;
query_posts( $query_string . '&posts_per_page=-1&orderby=menu_order&order=asc' );
?>
    <div id="content">

        <div class="wrapper">

           <div class="banner-photo">

            <?php
            $banner_src = get_field('practice_areas_header_image', 'options');
            if(strlen($banner_src) == 0)
                $banner_src = get_field('default_page_header_image', 'options');
            ?>
                <img src="<?php echo $banner_src; ?>" alt="" />

            </div><!-- .banner-photo -->

            <h1>Practice Areas</h1>

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