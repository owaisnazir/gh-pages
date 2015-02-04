<?php
get_header();
?>
 <div id="content">

        <div class="wrapper">

            <div class="banner-photo">

            <?php
            $banner_src = get_field('news_header_image', 'options');
            if(strlen($banner_src) == 0)
                $banner_src = get_field('default_page_header_image', 'options');
            ?>
                <img src="<?php echo $banner_src; ?>" alt="" />

            </div><!-- .banner-photo -->

            <div class="primary-content">

                <?php

                //determine page title
                
                if(is_category())
                    $title = single_cat_title('', false);
                elseif(is_month())
                    $title = get_the_date('F Y');

                echo "<h1>$title</h1>";

                while(have_posts()){
                    the_post();
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
                ?>
            </div>

            <div class="secondary-content">

                <ul class="sidebar menu">
                    <?php dynamic_sidebar( 'general-sidebar' ); ?>
                </ul>

            </div><!-- .secondary-content -->

        </div><!-- .wrapper -->

    </div><!-- #content -->
<?php get_footer() ?>