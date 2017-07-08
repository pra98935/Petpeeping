<?php
/**
 * Fields type password
 */

class DMOF_Fields_Hidden{

	public static function hidden_fields( $id, $get_value ){

		echo '<td class="dmof_content hidden screen-reader-text"><input type="hidden" name="'.$id.'" value="'.$get_value.'"></td>';

	}

}