<?php

class AllCategories extends WP_Widget {

	function __construct() {
		parent::__construct(
			'all_categories',
			esc_html__( 'Categories', 'text_domain' ),
			array( 'description' => esc_html__( 'The Same categories', 'text_domain' ), )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo '<div class="box categories">';
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . '<h1>' . $title . '</h1>' . $args['after_title'];
		}
		$args       = array(
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hierarchical' => true,
			'type'         => 'post',
		);
		$categories = get_categories( $args );
		echo '<ul class="menu categories page_text">';
		foreach ( $categories as $category ) {
			echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . ' (' . $category->category_count . ')' . '</a></li>';
		}
		echo '</ul>';
		echo '</div>';
	}

	public function form( $instance ) {
		extract( $instance );
		?>
        <div>
            <div><?php _e( 'Title', '' ); ?></div>
            <input name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   value="<?php echo $instance['title']; ?>"/>
        </div>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

}

add_action( 'widgets_init', 'register_all_categories' );
function register_all_categories() {
	register_widget( 'AllCategories' );
}