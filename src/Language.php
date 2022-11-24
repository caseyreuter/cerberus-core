<?php

namespace Cerberus\Core;

class Language
{
	private string $plugin_dir;
	private string $text_domain;

	public function __construct( string $plugin_dir, string $text_domain )
	{
		$this->plugin_dir  = $plugin_dir;
		$this->text_domain = $text_domain;
		add_action( 'plugins_loaded', array( &$this, 'load_text_domain' ) );
	}


	public function load_text_domain(): void
	{
		$locale = determine_locale();
		$locale = apply_filters( 'plugin_locale', $locale, 'woocommerce' );

		unload_textdomain( $this->text_domain );
		load_textdomain( $this->text_domain, $this->plugin_dir . 'languages/' . $this->text_domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $this->text_domain, false, $this->plugin_dir . 'languages' );
	}
}
