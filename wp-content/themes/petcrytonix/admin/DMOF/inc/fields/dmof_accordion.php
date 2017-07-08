<?php
/**
 * Email Fields
 */

class DMOF_Fields_Accordion{
	public static function accordion( $id, $name, $subtitle, $desc, $position ){
		// close table
		echo '</tbody>';
		echo '</table>';

		if ($position == 'end') {
			echo '</div>';
			echo '</li>';
			echo '</ul>';
			echo '</div>';

			// open table
			echo '<table class="widefat striped">';
			echo '<tbody>';
		}else{

		$subtitle = ( $subtitle ) ? '<p>'.$subtitle.'</p>' : '';

		echo '<div class="dmof_accordion_wrap">';
			echo '<ul class="dmof_accordion">';
    			echo '<li>';
    			echo '<input type="checkbox" checked><i></i>';
    			echo '<div class="dmof_accordion_title"><h2>'.$name.'</h2>'.$subtitle.'</div>';
    			echo '<div class="dmof_accordion_content">';
				
				// open table
				echo '<table class="widefat striped dmof_accordion_table">';
				echo '<tbody>';
		}

	}
}