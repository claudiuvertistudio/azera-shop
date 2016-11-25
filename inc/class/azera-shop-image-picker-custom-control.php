<?php
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}
class Azera_Shop_Image_Picker extends WP_Customize_Control {

	private $options = array();
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		$this->options = $args;
	}

	/**
	 * Render the content on the theme customizer page
	 */
	public function render_content() {
		$options = $this->options;
?>
		 <label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		 </label>
		 <ul class="azera-shop-image-picker">
			<?php
			foreach ( $options['azera-shop-image-picker-options'] as $image_name ) {
				echo '<li id="' . $image_name . '">';
				echo '<img src="' . azera_shop_get_file( '/images/' . $image_name . '.png' ) . '">';
				echo '</li>';
			}
			?>
		 </ul>
		 <input type="hidden" <?php $this->link(); ?> class="azera-shop-layout" value="<?php echo esc_textarea( $this->value() ); ?>" />
<?php
	}
}
