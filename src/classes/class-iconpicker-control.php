<?php

namespace ThanksToIT\WPFAIPC;

if ( class_exists( 'WP_Customize_Control' ) && !class_exists( 'ThanksToIT\WPFAIPC\IconPicker_Control' ) ) {

	class IconPicker_Control extends \WP_Customize_Control {

		protected $base_url='';
		protected $directory_name='iconpicker_control';

		public function __construct( \WP_Customize_Manager $manager, $id, array $args = array() ) {
			if ( isset( $args['directory_name'] ) ) {
				$this->directory_name = $args['directory_name'];
			}
			if ( isset( $args['base_url'] ) ) {
				$this->base_url = $args['base_url'] . "/" . $this->directory_name;
			} else {
				$this->base_url = plugin_dir_url( __FILE__ );
			}
			parent::__construct( $manager, $id, $args );
		}

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<div class="input-group icp-container">
					<input data-placement="bottomRight" class="icp icp-auto" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" type="text">
					<span class="input-group-addon"></span>
				</div>
			</label>
			<?php
		}

		/**
		 * Enqueue required scripts and styles.
		 */
		public function enqueue() {
			wp_enqueue_script( 'tm-fontawesome-iconpicker', $this->base_url . '/assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'tm-iconpicker-control', $this->base_url . '/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'tm-fontawesome-iconpicker', $this->base_url . '/assets/css/fontawesome-iconpicker.min.css' );
			wp_enqueue_style( 'tm-fontawesome', $this->base_url . '/assets/css/font-awesome.min.css' );
		}

	}

}