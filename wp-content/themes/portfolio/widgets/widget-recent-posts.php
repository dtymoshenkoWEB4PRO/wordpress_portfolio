<?php

class RecentPosts extends WP_Widget {

	function __construct() {
		parent::__construct(
			'posts_widget',
			esc_html__( 'Resent Posts', 'text_domain' ),
			array( 'description' => esc_html__( 'Thw Same recent posts', 'text_domain' ), )
		);
	}


	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
        echo '<div class="box recent-posts">';
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . '<h1>' . $title . '</h1>' . $args['after_title'];
		}
		echo $args['before_widget'];
		$args         = [
			'posts_per_page' => $instance['number']
		];
		$recent_posts = new WP_Query( $args ); ?>

            <ul class="recent_posts">
				<?php
				if ( $recent_posts->have_posts() ) :
					while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
						?>
                        <li class="item">
                            <a class="thumbnail" href="<?php the_permalink(); ?>"><img alt="<?php the_title() ?>"
                                                                                       src="<?php the_post_thumbnail_url(); ?>"></a>
                            <div class="text">
                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
                                <p class="data">
                                    <span class="date"><?php echo get_the_date() ?></span>
                                </p>
                            </div>
                        </li>
					<?php
					endwhile;
				endif;
				?>
            </ul>
        </div>

		<?php
		wp_reset_query();
	}


	public function form( $instance ) {
		extract( $instance );
		?>
        <p>
        <div><?php _e( 'Title', '' ); ?></div>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>"
               name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
               value="<?php echo $instance['title']; ?>"/>
        </p>
        <p>
        <div><?php _e( 'Quantity', 'text_domain' ); ?></div>
        <input name="<?php echo $this->get_field_name( 'number' ) ?>"
               type="number"
               value="<?php echo intval( $instance['number'] ) ?>"/>
        </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance           = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';

		return $instance;
	}

}

add_action( 'widgets_init', 'register_recent_posts' );
function register_recent_posts() {
	register_widget( 'RecentPosts' );
}