<?php

namespace Cerberus\Core;

class DebugMenu
{
	public function __construct()
	{
//		add_action( 'wp_footer', [ &$this, 'load_debug_menu' ], 10 );
	}

	public function load_debug_menu(): void
	{
		?>
        <div class="debug"
             style="position: fixed;bottom: 0;width: 100%;border-radius: 5px;z-index: 99;border: 2px solid black;height: 30vh;background: antiquewhite;">
            <table style="width: 100%;">
                <tbody style="">
                <tr>
                    <td style="background: aliceblue;">test</td>
                </tr>
                </tbody>
            </table>
        </div>
		<?php
	}
}
