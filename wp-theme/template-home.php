<?php
/*
Template Name: Homepage
*/

get_header();

?>
   <div id="content">

        <div class="hero-banner">

            <div class="slideshow">

                <ul class="slides">
                <?php
                // loop through the rows of data
                while ( have_rows('slides') ) : the_row();
                    ?>
                    <li>
                        <div class="caption">

                            <h1><?php the_sub_field('title') ?></h1>

                            <?php the_sub_field('blurb') ?>

                            <p class="more-link"><a class="button" href="<?php the_sub_field('button_link_url') ?>"><?php the_sub_field('button_label') ?></a></p>

                        </div><!-- .caption -->

                    </li>
                    <?php

                endwhile;
                ?>
                </ul>

            </div><!-- .slideshow -->

        </div><!-- .hero-banner -->

        <div class="text-banner">

            <div class="wrapper">

                <?php echo apply_filters('the_content', get_field('video_highlight')); ?>
                <h2><?php the_field('elevator_pitch') ?></h2>

            </div><!-- .wrapper -->

        </div><!-- .text-banner -->

        <div class="icon-callouts">

            <ul class="menu">
                <?php

                $practice_areas = get_field('highlighted_practice_areas');

                foreach($practice_areas as $p_area){
                    ?><li>
                        <a href="<?php echo get_permalink($p_area->ID) ?>">
                            <div class="icon">
                                <img src="<?php the_field('icon', $p_area->ID) ?>" alt="<?php echo $p_area->post_title ?>" />
                            </div>
                            <div class="caption">
                                <h3><?php echo $p_area->post_title ?></h3>
                                <p><?php the_field('short_description', $p_area->ID); ?></p>
                            </div>
                        </a>
                    </li><?php
                }
                ?>
                </ul>
            <!-- Spaces removed for inline-block -->

        </div><!-- .icon-callouts -->

        <div class="text-banner">

            <div class="wrapper">

                <h1>Call Us</h1>

                <ul class="phone-callouts">
                    <?php

                    $locs = new WP_Query(array(
                        'post_type' => 'office'
                    ));

                    while($locs->have_posts()){
                        $locs->the_post();
                        ?>
                        <li>
                            <h3>
                                <?php the_title() ?><br />
                                <?php the_field('phone') ?>
                            </h3>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

            </div><!-- .wrapper -->

        </div><!-- .text-banner -->

        <div class="home-featured">

            <div class="news-feature">

                <h1>Recent News &amp; Events</h1>

                <?php

                $news = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                ));

                while($news->have_posts()){
                    $news->the_post();
                    ?>
                    <div class="post">

                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        <?php the_excerpt() ?>
                        <p class="meta">Posted <?php echo get_the_date() ?></p>

                    </div><!-- .post -->
                    <?php
                }
                ?>

                <p><a class="button" href="<?php bloginfo('url') ?>/news/">Learn More&hellip;</a></p>

            </div><!-- .news-feature --><div class="bio-feature">
            <!-- Spaces removed for inline-block -->

                <?php

                $featured_att = new WP_Query(array(
                    'post_type' => 'attorney',
                    'posts_per_page' => 1,
                    'orderby' => 'rand'
                ));

                while($featured_att->have_posts()){
                    $featured_att->the_post();
                    ?>
                    <img src="<?php the_field('photos') ?>" alt="<?php the_title() ?>" />

                    <h5>Attorney Spotlight</h5>

                    <h1>
                        <?php the_title() ?>
                        <em><?php the_field('title') ?></em>
                    </h1>

                    <p><?php the_field("short_intro_bio") ?></p>

                    <p><a class="button" href="<?php the_permalink() ?>">Learn More&hellip;</a></p>
                    <?php
                }
                ?>

            </div><!-- .bio-feature -->


        </div><!-- .home-featured -->

    </div><!-- #content -->
<?php get_footer() ?>