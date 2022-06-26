<?php /**
 * Template name: Gallery
 **/
?>
<?php get_header(); ?>

    <!-- BEGIN CONTENT -->
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

            <div class="page_gallery">
                <div class="columns">
					<?php
					$current        = absint(
						max(
							1,
							get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' )
						)
					);
					$posts_per_page = 4;
					$query          = new WP_Query(
						[
							'post_type'      => 'portfolio',
							'posts_per_page' => $posts_per_page,
							'paged'          => $current,
						]
					);
					if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post(); ?>
                        <div class="column column50">
                            <div class="image">
								<?php $image = get_field( 'pretty_photo', get_the_ID() );
								$small_image = get_field( 'small_image', get_the_ID() ); ?>
                                <img src="<?php echo( $small_image['url'] ) ?>" alt=""/>
                                <p class="caption">
                                    <strong><?php the_title() ?></strong>
                                    <span><?php the_content() ?></span>
                                    <a href="<?php echo( $image['url'] ) ?>" data-rel="prettyPhoto[gallery]"
                                       class="button button_small button_orange float_right lightbox"><span
                                                class="inside">zoom</span></a>
                                </p>
                            </div>
                        </div>
					<?php }
					wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        <ul class="pagenav">
			<?php
			echo wp_kses_post(
				paginate_links(
					[
						'total'   => $query->max_num_pages,
						'current' => $current,
						'prev_text'          => __( '&laquo;' ),
						'next_text'          => __( '&raquo;' ),
					]
				)
			);
			} else {
				global $wp_query;
				$wp_query->set_404();
				status_header( 404 );
				nocache_headers();
				require get_404_template();
			} ?>
        </ul>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>

<?php get_footer(); ?>