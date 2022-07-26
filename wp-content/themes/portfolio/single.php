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

        <div class="columns">


            <div class="column column33">
                <h1><?php echo get_field( 'photo_title', get_the_ID() ); ?></h1>
                <p><?php the_content(); ?></p>
                <h1><?php _e( 'Client:' ) ?></h1>
                <p> <?php echo get_field( 'client', get_the_ID() ); ?></p>
                <h1><?php _e( 'Model & Photographer:' ) ?></h1>
                <p><a href="#"><?php echo get_field( 'model', get_the_ID() ); ?></a>
					<?php _e( '//' ) ?><?php echo get_field( 'photografer', get_the_ID() ); ?></p>
            </div>
			<?php $image = get_field( 'pretty_photo', get_the_ID() );
			$small_image = get_field( 'small_image', get_the_ID() );
			if ( $small_image && $image ): ?>
                <div class="column column66">
                    <div id="content_slide">
                        <div class="flexslider">
                            <ul class="slides">
                                <li><a href="<?php echo $image['url'] ?>" class="lightbox"
                                       data-rel="prettyPhoto[gallery]"><img
                                                src="<?php echo $small_image['url'] ?>"
                                                alt="1"/></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
			<?php endif; ?>
        </div>
    </div>
</section>
<!-- END CONTENT -->
</div>
</div>


<?php get_footer(); ?>
