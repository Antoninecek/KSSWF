<?php
//Function that generates a predesigned button

function button($text, $url, $_new, $size_x, $size_y) // text = what's written on the button; url = href; _new = new window? (true/false) -- Target  || size_x, size_y = optional (if 0, then default)
{
	$button = "";
	$size = true;
	if($size_x == 0 || $size_y == 0)
		$size = false;
	
	$target = "_self";
	if($_new)
		$target="_blank";
	
	$siz_tmp = "";
	if($size)
		$siz_tmp = "width:".$size_x."px; height:".$size_y."px; ";
	
	$button .= "<div class='button' style='display: inline-block;".$siz_tmp."'>";
	$button .= "<div id='table'>";
	$button .= "<a href='$url' target='$target'>";
	$button .= "<div id='cell'>$text</div>";
	$button .= "</a>";
	$button .= "</div>";
	$button .= "</div>";
		
	return $button;
}
?>