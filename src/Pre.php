<?php

### function to give more accurate data about variable
if ( ! function_exists( 'pre' ) ) {
	function pre( $data, $header = "", $backtrace = false, $hidden = false )
	{
		if ( $hidden ) {
			echo '<div style="display: none !important;">';
		}
		$bt     = debug_backtrace();
		$caller = array_shift( $bt );

		echo "<pre>";
		echo "Filename: " . $caller['file'] . "<br>";
		echo "Line: " . $caller['line'] . "<br>";
		if ( $header != "" ) {
			echo "$header: ";
		}
		var_dump( $data );
		if ( $backtrace ) {
			echo "Backtrace: ";
			print_r( wp_debug_backtrace_summary( null, 0, false ) );
		}
		echo "</pre>";
		if ( $hidden ) {
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'prel' ) ) {
	function prel( $data )
	{
		// add $data to a log file
		// display the log file on the frontend page like the dev tools
		// make it persistent but show only the last like 500 lines
	}
}
