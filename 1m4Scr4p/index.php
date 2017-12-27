<?php
	include('scrap.php');
	include('wpClient.php');

	mb_internal_encoding('UTF-8');
	mb_http_output('UTF-8');
	mb_http_input('UTF-8');

//	echo'<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />';
	$page=1;
	$continue = true;
	while($continue == true and $page <= 5){
	set_time_limit(600);			
		$scrap = new Scrap;
		$scraped_page = $scrap->curl('http://hobimasak.info/page/'.$page.'/');
		$scraped_data = $scrap->scrape_between($scraped_page,'class="block-home-right-full">','class="block-home-left">');
		$separate_results = explode('id="post', $scraped_data);
		//print_r($scraped_data);

		foreach ($separate_results as $result) {
			if($result!=''){
				$thumbnail = $scrap->scrape_between($result,'height="190" src="','?resize=290,190"');
				$contentLink= $scrap->scrape_between($result,'class="rmore" href="','">Resep');
				if($contentLink!=''){
					$detail_page = $scrap->curl($contentLink);
					$content = $scrap->scrape_between($detail_page,'property="description">','</span><div');				
					$source = $scrap->scrape_between($detail_page,'itemprop="description">','</span>');				
					$title = $scrap->scrape_between($detail_page,'property="name"><h1>','</h1></div><div');
					$categories = $scrap->scrape_between($detail_page,'"post-category">','</span></div>');
					$cat = explode(',', strip_tags($categories));
					/*$source = explode(' - ', $source);
					$ingredients = $scrap->scrape_between($detail_page, '<p style="text-transform:capitalize;">','</p>');
					$title = $source[0];
					isset($source[1]) ? $sourceLink = $source[1] : $sourceLink = 'hobimasak.info'; 
					echo '<strong>'.trim(str_replace('-','',$title)).'</strong> </br><img src='.$thumbnail."'></br>".trim($content).$sourceLink."</br>".$ingredients;
					*/
					//echo $sourceLink[max(array_keys($sourceLink))]; // mengambil nilai value array maksimum dari hasil explode $sourcelink
					//die($content);
					//$content = iconv(mb_detect_encoding($content, mb_detect_order(), true), "UTF-8", $content);
					$content = preg_replace('/[^(\x20-\x7F)\x0A\x0D]*/','', $content);					
					$content = preg_replace( "/\r|\n/", "", $content );
					//$content = str_replace('<br\n/>','</br>', $content);							
					//$content = preg_replace('\r','', $content);					
					echo $content = $title.'</br></br><img alignright" src="'.$thumbnail.'"</br>'.$content."</br> Source : ".$contentLink." Di Akses ".date("Y-m-d")."</br></br>";
				        $wpClient = new WPClient("http://www.imacakes.com/ImaCakes/xmlrpc.php", "admin", "zakeruga");
					$wpClient->createPost($title,utf8_decode($content),'Resep',$cat);
				}
			}
		}	
		
		if(strpos($scraped_data,'nextpostslink')){
			$continue = true;
		}else{
			$continue = false;
		}
		$page++;
	}

?>