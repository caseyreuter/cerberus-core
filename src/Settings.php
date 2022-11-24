<?php

namespace Cerberus\Core;

class Settings
{
	private string $name;

	public function __construct()
	{
		$this->name = self::get_name();
		add_filter( 'woocommerce_settings_tabs_array', [ &$this, 'add_settings_tab' ], 50 );
		add_filter( 'woocommerce_sections_' . $this->name, [ &$this, 'display_sections' ] );
	}

	public static function get_name()
	{
		return "tab_cerberus";
	}

	public function add_settings_tab( $settings_tabs )
	{
		$settings_tabs[ $this->name ] = __( 'Cerberus Settings', 'cerberus-product-page' );

		return $settings_tabs;
	}

	public function display_sections()
	{
		global $current_section;
		$sections = apply_filters( 'woocommerce_get_sections_' . $this->name, [] );
		echo '<ul class="subsubsub">';
		$array_keys = array_keys( $sections );
		foreach ( $sections as $id => $label ) {
			echo '<li><a href="' . admin_url( 'admin.php?page=wc-settings&tab=' . $this->name . '&section=' . sanitize_title( $id ) ) . '" class="' . ( $current_section == $id ? 'current' : '' ) . '">' . $label . '</a> ' . ( end( $array_keys ) == $id ? '' : '|' ) . ' </li>';
		}
		echo '</ul><br class="clear" />';
	}
}
