<?php /**
 * Template name: Portfolio
 **/
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
            <div id="workwrapper">
                <div class="row-bg-white">
                    <div class="container">
                        <div id="portfolio-filter" class="text-center">
					        <?php get_work_filters(); ?>
                        </div>
                        <div class="portfolio-results">
					        <?php ajax_filter_get_posts(""); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>