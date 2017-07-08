<?php
/**
 * Date picker
 */

class DMOF_Fields_Datepicker {

	public static function get_datepicker( $id, $name, $desc, $options, $get_value){

		$dateFormat 	= (isset($options['dateFormat'])) ? $options['dateFormat'] : 'mm/dd/yy';
		$changeMonth 	= (isset($options['changeMonth'])) ? $options['changeMonth'] : '';
		$changeYear 	= (isset($options['changeYear'])) ? $options['changeYear'] : '';
		$minDate 		= (isset($options['minDate'])) ? $options['minDate'] : '';
		$maxDate 		= (isset($options['maxDate'])) ? $options['maxDate'] : '';
		$minDateByopt 	= (isset($options['minDateByOpt'])) ? $options['minDateByOpt'] : $minDate;
		//$maxDateByopt 		= (isset($options['maxDateByOpt'])) ? $options['maxDateByOpt'] : $maxDate;

		//$minDateByopt 		= (isset($options['minDateByOpt'])) ? $options['minDateByOpt'] : $minDate;
		


	    ?>
	    	<script type="text/javascript">
			jQuery(document).ready(function($) {
				jQuery('#dmof_date_p_<?php echo $id; ?>').datepicker({
					dateFormat 	: '<?php echo $dateFormat ?>', //"mm/dd/yy","yy-mm-dd","d M, y","d MM, y","DD, d MM, yy"
				    changeMonth : <?php echo ($changeMonth) ? $changeMonth : "''" ?>,
				    changeYear 	: <?php echo ($changeYear) ? $changeYear : "''" ?>,
					minDate  	: <?php echo ($minDate) ? $minDate : "''" ?>,
				    maxDate 	: "<?php echo $maxDate; ?>",
				    onSelect: function(dateText) {
				        $("#dmof_date_p_<?php echo $minDateByopt; ?>").datepicker('option', 'minDate', dateText);
				    }
				});
			});
			</script>
	    <?php
	    
	    echo '<th class="dmof_title">'.$name.'</th>';

	    echo '<td class="dmof_content">';
	    echo '<input type="text" id="dmof_date_p_'.$id.'" class="dmof_date_picker" name="'.$id.'">';
	    echo $desc;

	    echo '</td>';

	}
}