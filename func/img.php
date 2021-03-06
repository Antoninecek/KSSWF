<?php

/*--------------------------------------*/
/*            Nikola Nejedlý            */
/*                 2018                 */
/*--------------------------------------*/

function img($source, $alt, $css_class, $cache_this, $click_big, $width, $only_echo = false, $caching_addon = "") //img("blabla1024x800", "I'm a dufus", "class_img", true, true) 
{
	global $imageid;
	global $this_w;
	
	$id = $imageid;
	$page = str_replace("+","/",$this_w);
	$class = "class=";
	
	if(!empty($css_class))
		$class .= "'$css_class'";
	else
		$class .="'img'";
	
	if(!file_exists($source) || empty($source))
		return false;
	
	$output_img = "";
	if(empty($id))
		$id = 0;
	
	$id++;
	
	if(empty($endclude))
		$endclude = "";
	
	if(empty($alt))
		$alt = "image_id$id";
	
	//cache setup, check & loadout
		if (!file_exists('./cache/')) 
			mkdir('./cache/', 0777, true);		
		if (!file_exists('./cache/img/')) 
			mkdir('./cache/img/', 0777, true);		
		if (!file_exists('./cache/img/'.$page)) 
			mkdir('./cache/img/'.$page, 0777, true);		
		
		if (file_exists('./cache/img/'.$page."/image".$id."$caching_addon.html")) 
		{
			$imageid = $id;
			if(!$only_echo)
				include('./cache/img/'.$page."/image".$id."$caching_addon.html");	
			else
				return file_get_contents('./cache/img/'.$page."/image".$id."$caching_addon.html");
			return true;
		}			
	//--------------------
	
	$forma_ = explode(".",$source);
	$format = $forma_[count($forma_)-1];
	
	if($click_big)
	{
		$output_img .= "<div class='canvas_bg' style='display: none;' name='bg_canvas$id'> <a href='#' name='bg_canvas$id' onclick=\"setDisplay('bg_canvas$id','none');return false;\"> </a></div>";
		$output_img .= "<a href='#' name='bg_canvas$id' onclick=\"setDisplay('bg_canvas$id','none');return false;\"> <img class='canvas_i' name='bg_canvas$id' style='display:none;' src='$source' alt='$alt'/></a>";
		$output_img .= "<a href='#' onclick=\"setDisplay('bg_canvas$id','block');return false;\">";
	}
	
	$src_i = "";
	
	if($cache_this)
	{
		$chk = mk_cache_img($source,$page."/image".$id."$caching_addon.".$format,$width);
		if(!$chk)
			return false;
		
		$src_i = "./cache/img/".$page."/image".$id."$caching_addon.".$format;
	}
	else
		$src_i = $source;
		
	
	$output_img .= "<img ".$class." src='$src_i' alt='$alt'/>";
	
	if($click_big)
		$output_img .= "</a>";
	
	$imageid = $id;
	
	//echo "$imageid:$id:$source:$alt:$css_class:$cache_this:$click_big:$width";
	
	if(!file_exists('./cache/img/'.$page."/image".$id."$caching_addon.html"))
		file_put_contents('./cache/img/'.$page."/image".$id."$caching_addon.html", $output_img);
	if(!$only_echo)
	include('./cache/img/'.$page."/image".$id."$caching_addon.html");	
	
	if(!$only_echo)
		return true;
	else
		return file_get_contents('./cache/img/'.$page."/image".$id."$caching_addon.html");
}

?>