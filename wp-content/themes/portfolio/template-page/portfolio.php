<?php /**
 * Template name: Portfolio
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
			<?php
			$categories = get_categories();
			?>
            <ul id="portfolio_categories" class="portfolio_categories">

				<?php
				foreach ( $categories as $category ) {
					echo '<li class="segment-1"><a href="#" class="' . $category->name . '" href="' . '">' . $category->name . '</a></li>';
				}
				?>
            </ul>

            <div class="portfolio_items_container">
                <ul class="portfolio_items columns">
					<?php $args = array(
						'post_type' => 'portfolio',
					);
					$query      = new WP_Query( $args );
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							?>

                            <li data-type="branding" data-id="id-6" class="column column33">
								<?php $image = get_field( 'pretty_photo', get_the_ID() );
								$small_image = get_field( 'small_image', get_the_ID() ); ?>

                                <a href="<?php echo( $image['url'] ) ?>" data-rel="prettyPhoto[gallery]"
                                   class="portfolio_image lightbox">
                                    <div class="inside">
                                        <img alt="" src="<?php echo $small_image['url'] ?>">
                                        <div class="mask"></div>
                                    </div>
                                </a>
                                <h1><?php the_title() ?></h1>
                                <p><?php the_content() ?></p>
                                <a class="button button_small button_orange" href="<?php echo get_permalink(); ?>"><span
                                            class="inside">read more</span></a>
                            </li>
						<?php }
					}
					wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>

<?php get_footer(); ?>