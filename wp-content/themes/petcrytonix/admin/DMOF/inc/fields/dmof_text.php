<?php
/**
 * Meta Text fields
 */
class DMOF_Fields_Text{

	public function get_textbox( $id, $name, $desc, $plcholdr, $default, $get_value = '') {
		
		echo '<th class="dmof_title">'.$name.'</th>';

		$get_value = ($get_value) ? $get_value : $default;

		echo '<td class="dmof_content"><div class="dmof_content"><input type="text" name="'.$id.'" value="'.$get_value.'" placeholder="'.$plcholdr.'">'.$desc.'</div></td>';
	}
}