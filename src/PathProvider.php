<?php

namespace Cerberus\Core;

class PathProvider
{
	private static PathProvider $path_provider;
	private string $plugin_url;

	public function __construct( $plugin_url )
	{
		PathProvider::$path_provider = $this;
		$this->plugin_url            = $plugin_url;
	}

	public static function get_assets_url(): string
	{
		return PathProvider::$path_provider->plugin_url . 'app/assets';
	}

	public static function get_assets_url_admin(): string
	{
		return PathProvider::$path_provider->plugin_url . 'admin/assets';
	}
}
