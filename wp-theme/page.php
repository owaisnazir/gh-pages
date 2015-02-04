<?php get_header() ?>
 <div id="content">

        <div class="wrapper">

            <div class="banner-photo">

            <?php
            $banner_src = get_field('header_image');
            if(strlen($banner_src) == 0)
                $banner_src = get_field('default_page_header_image', 'options');
            ?>
                <img src="<?php echo $banner_src; ?>" alt="" />

            </div><!-- .banner-photo -->

            <h1><?php the_title()) ?></h1>

            <?php the_content() ?>

            </div><!-- .primary-content -->

            <div class="secondary-content">

                <div class="accordion-tabs">

                    <h4 class="accordion-toggle open">Practice Areas</h4>

                    <div class="accordion-content open">

                        <ul class="menu">
                            <li><a href="#">Closely Held and Family Businesses</a></li>
                            <li><a href="#">Business and Corporate Law</a></li>
                            <li><a href="#">Estate and Business Succession Planning</a></li>
                            <li><a href="#">Non-Profit &amp; Charitable Organization Law</a></li>
                            <li><a href="#">Real Estate and Construction Law</a></li>
                        </ul>

                    </div>

                    <h4 class="accordion-toggle">Education</h4>

                    <div class="accordion-content">

                        <p>Villanova University School of Law</p>
                        <p>Grove City College <br /><em>Philosophy</em></p>

                    </div>

                    <h4 class="accordion-toggle">Admissions</h4>

                    <div class="accordion-content">

                        <p>Something Here</p>

                    </div>

                    <h4 class="accordion-toggle">Top Lawyers</h4>

                    <div class="accordion-content">

                        <p>Something Here</p>

                    </div>

                    <h4 class="accordion-toggle">Super Lawyers</h4>

                    <div class="accordion-content">

                        <p>Something Here</p>

                    </div>

                </div><!-- .accordian-tabs -->

                <img src="http://placehold.it/140x240/CCCCCC/969696.png" alt="" />

                <ul class="menu">
                    <li><a href="#">Newsletter Signup</a></li>
                    <li><a href="#">Download Attorney Bio</a></li>
                </ul>

            </div><!-- .secondary-content -->

        </div><!-- .wrapper -->

    </div><!-- #content -->
<?php get_footer() ?>