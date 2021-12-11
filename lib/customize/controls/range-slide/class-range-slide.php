<?php
/**
 * Range Slide Customizer Control
 *
 * @package Ravon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Exit if WP_Customize_Control does not exsist.
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * This class is for the range control in the Customizer.
 *
 * @access public
 */

class Ravon_Range_Control extends WP_Customize_Control {

	/**
	 * The type of customize control.
	 *
	 * @access public
	 * @since  1.0.5
	 * @var    string
	 */

	public $type = 'range';

	/**
	 * Enqueue scripts and styles.
	 *
	 * @access public
	 * @since  1.0.5
	 * @return void
	 */

	public function enqueue() {

		$theme_version = wp_get_theme()->get( 'Version' );
		
		wp_enqueue_style(
			'ravon-range-control-styles',
			get_parent_theme_file_uri( 'lib/customize/controls/range-slide/range-control.css' ),
			false,
			$theme_version,
			'all'
		);

		wp_enqueue_script(
			'ravon-range-control-scripts',
			get_parent_theme_file_uri( 'lib/customize/controls/range-slide/range-control.js' ),
			array( 'jquery' ),
			$theme_version,
			true
		);	
	}

	public function render_content() {
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<input class="ravon-range-value-input" data-input-type="range" type="range" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
			<div class="ravon-range-value"><?php echo esc_html( $this->value() ); ?></div>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
}
