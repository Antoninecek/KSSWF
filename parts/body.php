<div class="text_area">

<div id="txt"><br><?php 

function convert_php_headers($s_input, $b_encode)
{
	$s_output = "";
	
	if($b_encode)//, ; (when ENT_NOQUOTES is not set),  (when ENT_QUOTES is set),  and ;.
		$s_output = str_replace("&quot;", "&!quot;", str_replace("&#039;", "&!#039;", str_replace("&lt;", "&!lt;", str_replace("&gt;", "&!gt;", str_replace("&amp;", "&!amp;", 
					str_replace("<?php", "<_php", str_replace("?>", "_>", $s_input)))))));
	else //b_decode
		$s_output = str_replace("&!quot;", "&quot;", str_replace("&!#039;", "&#039;", str_replace("&!lt;", "&lt;", str_replace("&!gt;", "&gt;", str_replace("&!amp;", "&amp;", 
					htmlspecialchars_decode(str_replace("<_php", "<?php", str_replace("_>", "?>", $s_input))))))));
	
	return $s_output;
}

$content_ = "";
$er404r = "";
if(!empty($_GET['w']))
	$content_ = $_GET['w'];

$getA = 0;
if(!empty($_GET['a']))
	$getA = $_GET['a'];

if($content_ == "index" )
$content_ = "home";

if(empty($_GET['er']))
	if(empty($content_) && empty($_GET['c']))
	{
		$addr = $after_link;
		$content_ = "home";
		//header('location:'.$addr."?w=".$content_);
		
		$this_w = "home";
		if(file_exists("./pages/".$content_.".php"))
		{
			if(isset($_SESSION["login_admin".md5($_SERVER['HTTP_HOST'].trim($_SERVER['PHP_SELF']))]))
			if($getA == 3)
			{
				echo "<form id='edit_form'><textarea class='to_edit' name='editor_field'>";
				echo file_get_contents("./pages/".$content_.".php");
				echo "</textarea></form>";
			}
			else
			include("./pages/".$content_.".php");
		
			if(!isset($_SESSION["login_admin".md5($_SERVER['HTTP_HOST'].trim($_SERVER['PHP_SELF']))]))
			include("./pages/".$content_.".php");
		}
	}
	else
	if(!empty($content_) || !empty($_GET['c']))
	{
		if(!empty($_GET['c']))
		{
			$content_ = "home";
		}
		
		$content_ = str_replace(' ', '+', $content_);
		$content_ = str_replace('+', '/', $content_);
		if(file_exists("./pages/".$content_.".php"))
		{
			if(isset($_SESSION["login_admin".md5($_SERVER['HTTP_HOST'].trim($_SERVER['PHP_SELF']))]))
			if($getA == 3)
			{	
				$w_t = "";
				$gray[1] = true;
				$gray[4] = false;
				$gray[5] = false;
				
				if(!empty($_GET['w']))
					$w_t_ = "?w=".$_GET['w'];
				else
					$w_t_="?w="."home";
				
				echo "<form id='edit_form' action='"."$actual_link$after_link$w_t_"."&a=6"."' method='post'><textarea class='to_edit' id='editor_field' name='editor_field'>";
				echo convert_php_headers(file_get_contents("./pages/".$content_.".php"), true);
				echo "</textarea>";
				echo "</form>";
			}
			else
			include("./pages/".$content_.".php");
			
			if(!isset($_SESSION["login_admin".md5($_SERVER['HTTP_HOST'].trim($_SERVER['PHP_SELF']))]))
			include("./pages/".$content_.".php");
		}else
		{
			$er404r = $content_;
			include("./error/error.php");
		}
	}

if(!empty($_GET['er']))
	include("./error/error.php");



?></div>
</div>