<?

/////////////////////////////////////////////////////////////////////
//i3_html_forms_select_buildoptions
// builds the options rows for a <select> field..
/* example:
	$options=array(
		array(
			'data-showelement'=>'#helloworld',
			'value'=>'1',
			'_'=>'Hello World',
			),
		array(
			'data-hideelement'=>'#hello',
			'value'=>'0',
			'_'=>'Goodbye World',
			),
		);
	echo '<select name="test">'.build_select_options($options,$_REQUEST['test']).'</select>';
*/
function i3_html_forms_select_buildoptions($items,$selected){
	if(is_array($items)){
		foreach($items as $i){
			if(is_array($i)){
				$r.='<option';
				foreach($i as $ik=>$iv){
					if($ik=="_"){
						//ignore this..
					}else{
						$r.=' '.$ik.'="'.$iv.'"';
					}
				}
				if($i['_']!=""){
					$r.=($i['_']==$selected ? ' selected="selected"':'').'>'.$i['_'].'</option';
				}else{
					$r.=($i['value']==$selected ? ' selected="selected"':'').'>'.$i['value'].'</option';
				}
				$r.=">\n";
			}else{
				$r.='<option value="'.$i.'"'.($i==$selected ? ' selected="selected"':'').'>'.$i.'</option>'."\n";
			}
		}
		return $r;
	}else{
		// $items is not an array...
		return false;
	}
}

?>