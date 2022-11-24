<?php

namespace Cerberus\Core;

if ( class_exists( 'Cerberus\Core\PluginCore' ) ) {
	return;
}

class PluginCore
{
	public function __construct( string $plugin_dir, string $plugin_url, string $lang_domain )
	{
		require_once 'PathProvider.php';
		require_once 'DebugMenu.php';
		require_once 'Pre.php';
		require_once 'Language.php';
		require_once 'ClassInitializer.php';
		require_once 'Settings.php';

		$paths        = new PathProvider( $plugin_url );
		$debug        = new DebugMenu();
		$language     = new Language( $plugin_dir, $lang_domain );
		$settings     = new Settings();
		$class_loader = new ClassInitializer( $plugin_dir );

	}
}
