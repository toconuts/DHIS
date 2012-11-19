/* 
 * jQuery Multi HierSelect plugin 2.0
 *
 * Copyright (c) 2012 @muuri_cat
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) 
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * $LastChangedDate: 2012-04-03 12:00:00 +0900 $
 * $Rev: 0010 $
 *
 * Version 2.0
 *
 *
 * Use sample:
 *
 * -------------------------------------------------------
 * HTML:
 * -------------------------------------------------------
 * <select id="branch" name="branch">
 * 		<option value="1">Sapporo</option>
 * 		<option value="2">Tokyo</option>
 * </select>
 * <select id="office" name="office">
 * 		<option class=":1:" value="1">Maruyama</option>
 * 		<option class=":1:" value="2">Kotoni</option>
 * 		<option class=":2:" value="3">Ueno</option>
 * 		<option class=":2:" value="4">Shibuya</option>
 * </select>
 * <select id="section" name="section">
 * 		<option class=":1_1:" value="1">President</option>
 * 		<option class=":1_1:2_2:" value="2">Sales</option>
 * 		<option class=":1_2:" value="3">Factory</option>
 * 		<option class=":1_2:2_1:2_2:" value="4">Maintenance</option>
 * </select>
 * 
 * -------------------------------------------------------
 * jQuery:
 * -------------------------------------------------------
 * $(function() {
 * 		$('#branch').change(function() {
 * 			parents = new Array('#branch');
 * 			$('#office').hselect(parents);
 * 			$('#office').trigger('change');
 * 		});
 * 		$('#office').change(function() {
 * 			parents = new Array('#branch', '#office');
 * 			$('#section').hselect(parents);
 * 		});
 * });
 * 
 * // Make list when load/reload.
 * $('#branch').trigger('change');
 *
 */

(function($) {
	$.fn.hselect = function(parents) {
		isnull = false;
		keystr = '';
		for (i=0;i<parents.length;i++) {
			if ($(parents[i]).val().length > 0) {
				keystr += $(parents[i]).val() + '_';
			}
		}
		keystr = keystr.substr(0, keystr.length - 1);
		this_val = $(this).val();
		return this.each(function() {
			myid = $(this).attr('id');
			if ($('#clone_list_' + myid).children().length < 1) {
				$('body').append('<select style="display:none" id="clone_list_' + myid + '"></select>');
				$('#clone_list_' + myid).html($('#' + $(this).attr('id') + ' option'));
			}
			$(this).html($('#clone_list_' + myid + ' option[class*=":' + keystr + ':"]').clone());
			$(this).prepend('<option value="" label=""></option>');
			$(this).val(this_val);
		});
	};
})($);