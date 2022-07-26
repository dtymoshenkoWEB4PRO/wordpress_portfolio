<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>

<?php get_header(); ?>

    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?php echo get_the_title( $page->ID ) ?></h1>
            <div class="breadcrumbs">
                <div class="inside">
					<?php if ( function_exists( 'bcn_display' ) ) {
						bcn_display();
					} ?>

                </div>
            </div>

            <div class="columns">
                <div class="column column75">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <article class="article">
                            <div class="article_image nomargin">
                                <div class="inside">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>"/>
                                </div>
                            </div>
                            <div class="article_details">
                                <ul class="article_author_date">
                                    <li><em><?php _e( 'Add:' ) ?></em> <?php the_date() ?></li>
                                    <li><em><?php _e( 'Author:' ) ?></em> <a href="#"><?php the_author() ?></a></li>
                                </ul>
                                <p class="article_comments"><em><?php _e( 'Comment:' ) ?></em><?php the_comment() ?></p>
                            </div>
                            <h1><?php the_title() ?></h1>
                            <p><?php the_content(); ?></p>
                            <a class="button button_small button_orange float_left"
                               href="<?php get_permalink(); ?>"><span
                                        class="inside"><?php _e( 'read more' ) ?></span></a>
                        </article>
					<?php endwhile; ?>
					<?php endif;
					wp_reset_postdata(); ?>
                </div>
                <div class="column column25">
                    <div class="padd16bot">
						<?php ( get_sidebar( 'left' ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>


<?php
get_footer();
