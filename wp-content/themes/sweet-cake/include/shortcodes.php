<?php

//pricing_table shortcode
add_shortcode('pricing_table', 'shortcode_pricing_table');
function shortcode_pricing_table($atts, $content = null)
{
	$atts = shortcode_atts(
		array(
			'price' => '',
			'title' => '',
			'description' => '',
			'btntext' => '',
			'btnlink' => '',
			'btncolor' => '#A5DCE1'
			
		), $atts);
		
	$str = '<div class="ribbon">';
	$str .= '<h2>'.$atts['price'].' - <span>'.$atts['title'].'</span></h2>';
	$str .= '</div>';
	$str .= '<div class="price">';
	$str .= '<p>'.$atts['description'].'</p>';
	$str .= '<ul>';
	$str .= do_shortcode($content);
	$str .= '</ul>';
	$str .= '<p class="btn"><a style="background-color:'.$atts['btncolor'].'" href="'.$atts['btnlink'].'">'.$atts['btntext'].'</a></p>';
	$str .= '</div>';
	$str .= '<div class="triangle"></div>';
	
	return $str;

}

//pricing_row
add_shortcode('pricing_row', 'shortcode_pricing_row');
function shortcode_pricing_row($atts)
{
	$atts = shortcode_atts(
		array(
			'last' => '',
			'content' => ''
		), $atts);
		
	if ($atts['last'] == 'yes'){
		$str = '<li><p class="noborder">'.$atts['content'].'</p></li>';
	}else{
		$str = '<li><p>'.$atts['content'].'</p></li>';
	}
	
	return $str;
}


//person_team shortcode
add_shortcode('person_team', 'shortcode_person_team');
function shortcode_person_team($atts, $content = null)
{
	$atts = shortcode_atts(
		array(
			'title' => '',
			'description' => ''
		), $atts);
		
	$str = '<div class="team">';
	$str .= '<div class="bordertopteam"></div>';
	$str .= '<h2>'.$atts['title'].'</h2>';
	$str .= '<p>'.$atts['description'].'</p>';
	$str .= '</div>';
	$str .= '<div class="socialteam">';
	$str .= do_shortcode($content);
	$str .= '</div>';
	
	return $str;

}


//social_team shortcode
add_shortcode('social_team', 'shortcode_social_team');
function shortcode_social_team($atts)
{
	$atts = shortcode_atts(
		array(
			'facebook' => 'none',
			'twitter' => 'none',
			'instagram' => 'none',
			'pinterest' => 'none',
			'flickr' => 'none',
			'dribble' => 'none',
			'behance' => 'none',
			'github' => 'none',
			'linkedin' => 'none',
			'tumblr' => 'none',
			'skype' => 'none',
			'youtube' => 'none',
			'vimeo' => 'none',
			'deviantart' => 'none',
			'google' => 'none'
		), $atts);
		
	$template_url = get_template_directory_uri();
	global $data;
	$str = "";
	
	//start facebook
	if ($atts['facebook'] != 'none'){ 
		$str .= '<a href="'.$atts['facebook'].'"><img class="rotate" alt="" src="';
		
		if($data['facebook_team_icon']){ 
			$str .= $data['facebook_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/facebookicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end facebook
	
	//start twitter
	if ($atts['twitter'] != 'none'){ 
		$str .= '<a href="'.$atts['twitter'].'"><img class="rotate" alt="" src="';
		
		if($data['twitter_team_icon']){ 
			$str .= $data['twitter_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/twittericon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end twitter
	
	//start instagram
	if ($atts['instagram'] != 'none'){ 
		$str .= '<a href="'.$atts['instagram'].'"><img class="rotate" alt="" src="';
		
		if($data['instagram_team_icon']){ 
			$str .= $data['instagram_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/instagramicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end instagram
	
	//start pinterest
	if ($atts['pinterest'] != 'none'){ 
		$str .= '<a href="'.$atts['pinterest'].'"><img class="rotate" alt="" src="';
		
		if($data['pinterest_team_icon']){ 
			$str .= $data['pinterest_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/pinteresticon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end pinterest
	
	//start flickr
	if ($atts['flickr'] != 'none'){ 
		$str .= '<a href="'.$atts['flickr'].'"><img class="rotate" alt="" src="';
		
		if($data['flickr_team_icon']){ 
			$str .= $data['flickr_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/flickricon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end flickr
	
	//start dribble
	if ($atts['dribble'] != 'none'){ 
		$str .= '<a href="'.$atts['dribble'].'"><img class="rotate" alt="" src="';
		
		if($data['dribble_team_icon']){ 
			$str .= $data['dribble_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/dribbleicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end dribble
	
	//start behance
	if ($atts['behance'] != 'none'){ 
		$str .= '<a href="'.$atts['behance'].'"><img class="rotate" alt="" src="';
		
		if($data['behance_team_icon']){ 
			$str .= $data['behance_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/behanceicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end behance
	
	//start github
	if ($atts['github'] != 'none'){ 
		$str .= '<a href="'.$atts['github'].'"><img class="rotate" alt="" src="';
		
		if($data['github_team_icon']){ 
			$str .= $data['github_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/githubicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end github
	
	//start linkedin
	if ($atts['linkedin'] != 'none'){ 
		$str .= '<a href="'.$atts['linkedin'].'"><img class="rotate" alt="" src="';
		
		if($data['linkedin_team_icon']){ 
			$str .= $data['linkedin_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/linkedinicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end linkedin
	
	//start tumblr
	if ($atts['tumblr'] != 'none'){ 
		$str .= '<a href="'.$atts['tumblr'].'"><img class="rotate" alt="" src="';
		
		if($data['tumblr_team_icon']){ 
			$str .= $data['tumblr_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/tumblricon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end tumblr
	
	//start skype
	if ($atts['skype'] != 'none'){ 
		$str .= '<a href="'.$atts['skype'].'"><img class="rotate" alt="" src="';
		
		if($data['skype_team_icon']){ 
			$str .= $data['skype_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/skypeicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end skype
	
	//start youtube
	if ($atts['youtube'] != 'none'){ 
		$str .= '<a href="'.$atts['youtube'].'"><img class="rotate" alt="" src="';
		
		if($data['youtube_team_icon']){ 
			$str .= $data['youtube_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/youtubeicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end youtube
	
	//start vimeo
	if ($atts['vimeo'] != 'none'){ 
		$str .= '<a href="'.$atts['vimeo'].'"><img class="rotate" alt="" src="';
		
		if($data['vimeo_team_icon']){ 
			$str .= $data['vimeo_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/vimeoicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end vimeo
	
	//start deviantart
	if ($atts['deviantart'] != 'none'){ 
		$str .= '<a href="'.$atts['deviantart'].'"><img class="rotate" alt="" src="';
		
		if($data['deviantart_team_icon']){ 
			$str .= $data['deviantart_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/deviantarticon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end deviantart
	
	//start google
	if ($atts['google'] != 'none'){ 
		$str .= '<a href="'.$atts['google'].'"><img class="rotate" alt="" src="';
		
		if($data['google_team_icon']){ 
			$str .= $data['google_team_icon']; 
		}else{ 
			$str .= $template_url.'/img/section-team/googleicon.png'; 
		}
		
		$str .= '" /></a>'; 
	}
	//end google
	
	return $str;
}

//skills_bar shortcode
add_shortcode('skills_bar', 'shortcode_skills_bar');
function shortcode_skills_bar($atts)
{
	$atts = shortcode_atts(
		array(
			'title' => '',
			'bar' => '',
			'number' => ''
		), $atts);
		
	$str = '<div class="progresbar">';
	$str .= '<p>'.$atts['title'].'</p>';
	$str .= '<p class="numberbar">'.$atts['number'].'</p>';
	$str .= '<div><span style="width:'.$atts['bar'].'%"></span></div>';
	$str .= '</div>';
	
	return $str;

}

?>