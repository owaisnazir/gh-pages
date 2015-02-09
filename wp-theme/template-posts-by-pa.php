<?php
/*
Template Name: Posts by Practice Area
*/

$pa_slug = $_GET['practice-area-filter'];
$pa_details = new WP_Query(array(
	'name' => $pa_slug,
	'post_type' => 'practice-area'
));
$pa_details->the_post();
$pa_title = get_the_title();
$GLOBALS['title_override'] = $pa_title . ' Posts | ' . get_bloginfo('name');

get_header();

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$pa_posts = new WP_Query(array(
	'connected_type' => 'post_practice-area',
	'connected_items' => $pa_details->get_queried_object(),
	'nopaging' => false,
	'paged' => $paged
));
?>
<div id="content">

        <div class="wrapper">

            <div class="banner-photo">

            <?php
            $banner_src = get_field('news_header_image', 'options');
            if(strlen($banner_src) == 0)
                $banner_src = get_field('default_page_header_image', 'options');
            if(!empty($banner_src))
                echo '<img src="' . $banner_src . '" alt="" />';
            ?>

            </div><!-- .banner-photo -->

            <div class="primary-content">

                <?php

                //determine page title

                echo "<h1>$pa_title Posts</h1>";

                while($pa_posts->have_posts()){
                    $pa_posts->the_post();
                    ?>

                    <div class="post">

                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                        <p class="meta">Posted <?php echo get_the_date() ?></p>

                        <?php the_post_thumbnail() ?>

                        <?php the_excerpt() ?>

                        <p><a class="button" href="<?php the_permalink() ?>">Read More&hellip;</a></p>

                    </div>

                    <?php
                }

                // pagination links
                $big = 999999999; // need an unlikely integer

                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => $paged,
                    'total' => $pa_posts->max_num_pages
                ) );

                ?>
            </div>

            <div class="secondary-content">

                <?php include('partial-blog-section-sidebar-stuff.php'); ?>
                
                <ul class="sidebar menu">
                    <?php dynamic_sidebar( 'general-sidebar' ); ?>
                </ul>

            </div><!-- .secondary-content -->

        </div><!-- .wrapper -->

    </div><!-- #content -->
<?php get_footer() ?>