<?php
$this_file = "all_func_loader.php";

if(file_exists("./func/")){
	$files_ = scandir("./func/");
		
	foreach($files_ as &$file)
	{
		$temp = explode(".",$file);
		if($temp[count($temp)-1] == "php")
		{
			if($file != "gen_menu.php")
			if($file != ".app.php")
			if($file != "meta.php")
			if($file != "setup.php")
			if($file != "js_load.php")
			if($file != "admin_stat.php")
			if($file != "statuses.php")
			if($file != "icons.php")
			if($file != $this_file)
				include("./func/$file");
		}
	}
	include("./func/admin_stat.php");
	include("./func/statuses.php");
}

?>