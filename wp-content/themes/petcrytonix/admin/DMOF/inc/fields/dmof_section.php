<?php
/**
 * Email Fields
 */

class DMOF_Fields_Section{
	public static function section( $id, $name, $subtitle, $desc, $position ){
		

		$subtitle = ($subtitle) ? '<span>'.$subtitle.'</span>' : '';

		// close table
		echo '</tbody>';
		echo '</table>';

		if ($position == 'end') {
			echo '</div>';
		}else{

		echo '<div class="dmof_section_content">';
		echo '<div class="dmof_section">';
			echo '<p>'.$name.'</p>';
			echo $subtitle;
		echo '</div>';
		}
		// open table
		echo '<table class="widefat striped dmof_table_nth">';
		echo '<tbody>';

	}
}