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
            if(!empty($banner_src))
                echo '<img src="' . $banner_src . '" alt="" />';
            ?>

            </div><!-- .banner-photo -->

            <h1>Practice Areas</h1>

            <ul class="menu practice-areas"><?php

                wp_list_pages( array(
                    'post_type' => 'practice-area',
                    'title_li' => ''
                ) );

            ?></ul>
            <!-- Spaces removed for inline-block -->

        </div><!-- .wrapper -->

    </div><!-- #content -->
<?php get_footer() ?>