<?php

class ContactUs extends WP_Widget {

	function __construct() {
		parent::__construct(
			'contact-us',
			esc_html__( 'Contact Us', 'text_domain' ),
			array( 'description' => esc_html__( 'The Same Contact Us', 'text_domain' ), )
		);
	}


	public function widget( $args, $instance ) {
		if ( ! empty( $instance['title'] || [ 'phone' ] || [ 'email' ] || [ 'address' ] ) ) {
			?>
            <div class="box contact-us">
                <h1><?php echo $instance['title'] ?></h1>
                <ul class="list_contact page_text">
                    <li class="phone"><?php echo $instance['phone'] ?></li>
                    <li class="email"><a href="#"><?php echo $instance['email'] ?></a></li>
                    <li class="address"><?php echo $instance['address'] ?></li>
                </ul>
            </div>
			<?php
		}
	}

	public function form( $instance ) {
		extract( $instance );
		?>
        <p>
        <div><?php esc_attr_e( 'Title', 'text_domain' ); ?></div>
        <input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
               value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
        <p>
        <div><?php esc_attr_e( 'Phone', 'text_domain' ); ?></div>
        <input id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="tel"
               value="<?php echo esc_attr( $instance['phone'] ); ?>">
        </p>
        <p>
        <div><?php esc_attr_e( 'Email', 'text_domain' ); ?></div>
        <input id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="email"
               value="<?php echo esc_attr( $instance['email'] ); ?>">
        </p>
        <p>
        <div><?php esc_attr_e( 'Address', 'text_domain' ); ?></div>
        <input id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text"
               value="<?php echo esc_attr( $instance['address'] ); ?>">
        </p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance            = array();
		$instance['title']   = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['phone']   = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
		$instance['email']   = ( ! empty( $new_instance['email'] ) ) ? sanitize_text_field( $new_instance['email'] ) : '';
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? sanitize_text_field( $new_instance['address'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', 'register_contact_us' );
function register_contact_us() {
	register_widget( 'ContactUs' );
}