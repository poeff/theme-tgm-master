<?php
/**
 * Template Name: Home Page
 */

get_header();

$display            = get_field('slider_display');
$slide              = get_field('slide');
$timeout            = get_field('timeout');
$fx                 = get_field('fx');
$speed              = get_field('speed');
$navigation         = get_field('slider_navigation');
$pager              = get_field('slider_pager');
$wrap               = get_field('allow_wrap');
$random             = get_field('random');

$sliderClass = ( $display == 'on' ) ? 'slider-on' : 'slider-off';

?>
    <div class="container <?php echo $sliderClass; ?>">
        <div class="row">
            <div class="col-sm-12">
                <?php
                if ( $display == 'on' ) {
                    if ( $slide ) :
                        echo '<div class="cycle-slideshow"
                                    data-cycle-log="false"
                                    data-cycle-pause-on-hover="true"
                                    data-cycle-timeout="' . $timeout . '"
                                    data-cycle-fx="' . $fx . '"
                                    data-cycle-speed="' . $speed . '"
                                    data-cycle-allow-wrap="' . $wrap . '"
                                    data-cycle-random="' . $random . '"
                                    data-cycle-slides=".slide">';
                        foreach ($slide as $s) :
                            $caption = $s['slide_caption'];
                            $image   = $s['slide_image'];
                            $link    = $s['slide_link'];

                            echo '<div class="slide">';
                            if ( $link ) echo '<a href="' . $link . '">';
                            if ( $caption ) echo '<div class="caption">' . $caption . '</div>';
                            if ( ! empty( $image ) ) {
                                echo '<img class="img-responsive" src="' . $image['url'] . '" alt="' . $image['alt'] . '"/>';
                            }
                            if ( $link ) echo '</a>';
                            echo '</div>';
                        endforeach;
                        if ( $navigation === 'on' ) {
                            echo '<div class="cycle-prev"><i class="fa fa-chevron-left"></i></div>';
                            echo '<div class="cycle-next"><i class="fa fa-chevron-right"></i></div>';
                        }
                        if ( $pager === 'on' ) {
                            echo '<div class="cycle-pager"></div>';
                        }
                        echo '</div>';
                    endif;
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <?php while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>
-->
                            <div class="entry-content">

                               <?php the_content(); ?>

                                <?php
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'upbootwp' ),
                                        'after'  => '</div>',
                                    ));
                                ?>
                            </div><!-- .entry-content -->
                            <?php edit_post_link( __( 'Edit', 'upbootwp' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                        </article><!-- #post-## -->

                        <?php endwhile; // end of the loop. ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div><!-- .col-md-8 -->

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div><!-- .col-md-4 -->
        </div><!-- .row -->
    </div><!-- .container -->
<?php get_footer(); ?>
