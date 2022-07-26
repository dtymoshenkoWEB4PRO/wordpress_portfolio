<?php
/**
 * A Simple Category Template
 */

get_header(); ?>
    <section id="content">
        <div class="wrapper page_text">
            <div class="columns">

                <div class="column column75">
					<?php if ( have_posts() ) : ?>
                        <header class="archive-header">
                            <h1 class="archive-title"><?php single_cat_title( '', false ); ?></h1>
                        </header>
						<?php while ( have_posts() ) : the_post(); ?>
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
                                    <p class="article_comments"><em><?php _e( 'Comment:' ) ?></em><?php the_comment() ?>
                                    </p>
                                </div>
                                <h1><?php the_title() ?></h1>
                                <p><?php the_content(); ?></p>
                                <a class="button button_small button_orange float_left"
                                   href="<?php get_permalink(); ?>"><span
                                            class="inside"><?php _e( 'read more' ) ?></span></a>
                            </article>
						<?php endwhile;
					else: ?>
                        <p><?php _e( 'Sorry, no posts to display.' ) ?></p>
					<?php endif;
					wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>