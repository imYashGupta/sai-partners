<?php 

/**
 * 
 */
function ifFieldErr($bool)
{
	if ($bool) {
		return "err_field";
	}
	
	return false;
}

function ifErr($bool,$msg)
{
	if ($bool) {
		return '<span class="err_text">'.$msg.'</span>';
	}
	
	return false;
}
?>