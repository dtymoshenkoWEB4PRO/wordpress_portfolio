<?php

get_header();
?>

    <!-- BEGIN TOP -->
    <section id="top">
        <div class="wrapper">
            <div id="top_slide" class="flexslider">
                <ul class="slides">
					<?php
					$args        = array(
						'posts_per_page' => 5,
					);
					$most_recent = new WP_Query( $args );
					?>
					<?php
					if ( $most_recent->have_posts() ) :
						while ( $most_recent->have_posts() ) :
							$most_recent->the_post(); ?>
                            <li>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
                                <p class="flex-caption">
                                    <strong><?php the_title(); ?></strong>
                                    <span> <?php the_content(); ?></span>
                                </p>
                            </li>
						<?php endwhile;
					endif;
					?>
                </ul>
            </div>
        </div>
    </section>

    <section id="content">
        <div class="wrapper page_text page_home">
			<?php
			$args  = [
				'post_type'      => 'post',
				'posts_per_page' => 1
			];
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();
					?>
                    <div class="introduction">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>
                        <p><?php the_content() ?></p>
                        <a class="button button_big button_orange float_left" href="<?php the_permalink(); ?>"><span
                                    class="inside">Read more</span></a>
                    </div>
				<?php
				endwhile;
			endif; ?>
            <ul class="columns dropcap">
				<?php $args = [
					'post_type'      => 'post',
					'posts_per_page' => 6
				];
				$query      = new WP_Query( $args );
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						?>
                        <li class="column column33">
                            <div class="inside">
                                <h1><?php the_title() ?></h1>
                                <p><?php the_content() ?></p>
                                <p class="read_more"><a href="<?php the_permalink(); ?>">Read more</a></p>
                            </div>
                        </li>
					<?php
					endwhile;
				endif; ?>
            </ul>
            <div class="underline"></div>
            <div class="portfolio">

                <p class="all_projects">
                    <a href="">View all projects</a></p>
                <h1>Portfolio</h1>
                <div class="columns">
					<?php
					$args        = array(
						'post_type'      => 'portfolio',
						'post_status'    => 'publish',
						'posts_per_page' => 4,
					);
					$recent_post = new WP_Query( $args );
					?>
					<?php if ( $recent_post->have_posts() ): ?>

						<?php while ( $recent_post->have_posts() ) : $recent_post->the_post() ?>

                            <div class="column column25">
								<?php $image = get_field( 'pretty_photo', get_the_ID() );
								$small_image = get_field( 'small_image', get_the_ID() ); ?>
                                <a href="<?php echo $image['url'] ?>" class="image lightbox"
                                   data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="<?php echo $image['url'] ?>" alt=""/>
									<span class="caption"><?php the_title() ?></span>
								</span>
                                    <span class="image_shadow"></span>
                                </a>
                            </div>
						<?php endwhile;
					endif ?>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </section>


<?php
get_footer();
