<?php 

	function to_money($number)
	{
		return number_format($number , 2);
	}
	function getLink()
	{
		return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}";
	}
	
	function anchor($link , $text = null, $title = null , $extras = null)
	{
		$domain = getLink().'/'.$link;

		$link  = '<a href ="'.$domain.'"';
		$link .= ' title = "' .$title .'"';

		if($extras != null)
		{
			if(is_array($extras))
			{
				foreach($extras as $extra)
				{
					$link .= parseExtras($extra);
				}
			}else
			{
				$link .= parseExtras($extras);
			}
		}
		

		$link .= '>'.$text;
		$link .= '</a>';

		echo $link;
	}

	//css , id , target , attribute
	//second parameter is for attributes only
	function parseExtras($extra)
	{
		$first = $extra[0];

		if(is_array($extra))
		{
			$data = '';

			foreach($extra as $key=>$attr)
			{
				if(is_array($attr))
				{
					foreach($attr as $key=>$arAttr)
					{
						$data .= ' data-'.$key.'="'.$arAttr.'" ';
					}
				}
				else{
					$data .= ' data-'.$key.'="'.$attr.'" ';
				}
			}

			return $data;
		}
		switch($first)
		{
			//id
			case '#':
				return ' id = "'.substr($extra, 1 , strlen($extra)).'"';
			break;
			//css
			case '.';
				return ' class = "'.substr($extra, 1 , strlen($extra)).'"';
			break;
			//target
			case '_';
				return ' target = "'.substr($extra, 1 , strlen($extra)).'"';
			break;
			default:

			return '';
		}
	}

	function cropSentence($sentence , $length = 50)
	{
		if(strlen($sentence) > $length)
			return substr($sentence, 0 , $length) .'...';
		return substr($sentence, 0 , $length);
	}