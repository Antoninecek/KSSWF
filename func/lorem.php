<?php

/*------------------------------------------------*/
/*												  */
/*		Nikola Nejedlý, Matěj Kománek (c) 2018	  */
/*										  		  */
/*------------------------------------------------*/

function lorem_p($lines, $minW, $maxW, $start_w_lipsum)
{
	if(empty($start_w_lipsum) || !$start_w_lipsum)
		$start_w_lipsum = false;
	
	
		$words = array();
        $dictPath = dirname(__FILE__) . '/loremipsum.wordbase';
        $doctWords = file($dictPath);
		$final_output = "<p>";
		
		$totalwords = rand($minW, $maxW);
		
		if($start_w_lipsum)
		{
			if($totalwords > 0)
			{
				$totalwords = $totalwords-1;
				$final_output .= "Lorem ";
			}
			if($totalwords > 0)
			{
				$totalwords = $totalwords-1;
				$final_output .= "Ipsum ";
			}
			if($totalwords > 0)
			{
				$totalwords = $totalwords-1;
				$final_output .= "Dolor ";
			}
			if($totalwords > 0)
			{
				$totalwords = $totalwords-1;
				$final_output .= "Sit ";
			}
			if($totalwords > 0)
			{
				$totalwords = $totalwords-1;
				$final_output .= "Amet ";
			}
		}
		
        for ($odstavce = 0; $odstavce < $lines; $odstavce++)
		{
		
			for ($i = 0; $i < $totalwords; $i++)
			{
				$index = array_rand($doctWords);
				$word = lcfirst($doctWords[$index]);
				
				if($i==0)
				{
					$word = ucfirst($doctWords[$index]);
				}
				

				if ($i > 0 && $words[$i-1] == $word)
				{
					$i--;
				}
				else
				{
					$words[$i] = trim(preg_replace('/\s+/', ' ', $word));
					
					$final_output .= $word;
				}
			
			}
			//ucwords($final_output);
			$final_output = trim(preg_replace('/\s+/', ' ', $final_output));
			
			if(substr($final_output,strlen($final_output)-1) == " ")
				$final_output = substr($final_output,0,strlen($final_output)-1);
						
			$final_output .= ". ";
			$totalwords = rand($minW, $maxW);
		}
		return $final_output."</p>";

}

function lorem($paragraphs, $lines, $minW, $maxW, $start_w_lipsum)
{
	global $lorem_id;
	
	if(!empty($lorem_id))
		$lorem_id++;
	else
		$lorem_id = 1;
	
	$ww = "home";
	if(isset($_GET['w']))
		if(!empty($_GET['w']))
			$ww = $_GET['w'];
	
	$this_lorem = "";
	if(!empty($ww))
		$target_name = trim(str_replace("+","_",str_replace(" ","_",$ww)))."_lorem".$lorem_id;
	else
		return 0;
	
	//CACHE CHECK:
	if(file_exists("./cache/lorem/$target_name.html"))
	{
		include("./cache/lorem/$target_name.html");
		return 1;
	}
	//-----------
	
	for($i = 0; $i < $paragraphs; $i++)
	{
		$this_lorem .= lorem_p($lines, $minW, $maxW, $start_w_lipsum);
		
		if($i == 0)
			$start_w_lipsum = false;
	}
	
	//CACHING HERE:
	if (!file_exists('./cache/')) {
		mkdir('./cache/', 0777, true);
	}
	
	if (!file_exists('./cache/lorem/')) {
		mkdir('./cache/lorem/', 0777, true);
	}
	
	if(!file_exists("./cache/lorem/$target_name.html"))
		file_put_contents("./cache/lorem/$target_name.html" , $this_lorem);

	include("./cache/lorem/$target_name.html");
	
	//-----------
	
	return 1;
}

//lorem(7,5,10,10, true);
?>