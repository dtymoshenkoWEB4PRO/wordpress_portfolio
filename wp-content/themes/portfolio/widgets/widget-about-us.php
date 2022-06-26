<?php

class AboutUs extends WP_Widget {

	function __construct() {
		parent::__construct(
			'about-us-widget',
			esc_html__( 'About Us', 'text_domain' ),
			array( 'description' => esc_html__( 'The Same About Us', 'text_domain' ), )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget']; ?>
         <div class="box about-us">
		<?php if ( ! empty( $instance['title'] || [ 'text' ] ) ) {
			?>
            <h1><?php echo $instance['title'] ?></h1>
            <p><?php echo $instance['text'] ?></p>
            </div>
			<?php
		}
	}

	public function form( $instance ) {
		extract( $instance );
		?>
        <p>
        <div><?php esc_attr_e( 'Title', 'text_domain' ); ?></div>
        <input name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
               id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
               value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
        <p>
        <div><?php esc_attr_e( 'Text', 'text_domain' ); ?></div>
        <input name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text"
               id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
               value="<?php echo esc_attr( $instance['text'] ); ?>">
        </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['text']  = ( ! empty( $new_instance['text'] ) ) ? sanitize_text_field( $new_instance['text'] ) : '';

		return $instance;
	}

}

add_action( 'widgets_init', 'register_about_us' );
function register_about_us() {
	register_widget( 'AboutUs' );
}