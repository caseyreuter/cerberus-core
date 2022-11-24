<?php

namespace Cerberus\Core;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ClassInitializer
{
	public function __construct( $plugin_dir )
	{
		$this->load_classes_in_dir( $plugin_dir . 'app/src/' );
		$this->load_classes_in_dir( $plugin_dir . 'admin/src/' );
	}

	public function load_classes_in_dir( $dir ): void
	{
		if ( ! is_dir( $dir ) ) {
			return;
		}
		$dir = new RecursiveDirectoryIterator( $dir );
		foreach ( new RecursiveIteratorIterator( $dir ) as $filename => $file ) {

			if ( ! is_file( $file->getPathname() ) ) {
				continue;
			}

			$content = file_get_contents( $file->getPathname() );
			if ( empty( $content ) ) {
				continue;
			}

			if ( ! preg_match( '/namespace[\s]*([\S]*);/m', $content, $match_namespace ) ) {
				continue;
			}

			if ( ! preg_match( '/class[\s]*([\S]*)/m', $content, $match_classname ) ) {
				continue;
			}

			$class_name = '\\' . $match_namespace[1] . '\\' . $match_classname[1];
			$new_class  = new $class_name;
		}
	}
}
