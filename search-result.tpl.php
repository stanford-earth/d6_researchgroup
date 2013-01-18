<?

/**
	* $url: URL of the result.
	* $title: Title of the result.
	* $snippet: A small preview of the result. Does not apply to user searches.
	* $info: String of all the meta information ready for print. Does not apply to user searches.
	* $info_split: Contains same data as $info, split into a keyed array.
	* $type: The type of search, e.g.,
***/

switch ( strtolower($info_split['type']) ) {
		case 'news clip': $search_result_icon = '<img src="'. base_path() . path_to_theme() .'/images/news_icon.png" alt="" />'; break;
		case 'award': $search_result_icon = '<img src="'. base_path() . path_to_theme() .'/images/award_icon.png" alt="" />'; break;		
		case 'profile': $search_result_icon = '<img src="'. base_path() . path_to_theme() .'/images/user_icon.png" alt="" />'; break;
		case 'cv publication': $search_result_icon = '<img src="'. base_path() . path_to_theme() .'/images/publication_icon.png" alt="" />'; break;
		case '': $search_result_icon = '<img src="'. base_path() . path_to_theme() .'/images/pagelink_icon.png" alt="" />'; break;		
		case 'page': $search_result_icon = '<img src="'. base_path() . path_to_theme() .'/images/pagelink_icon.png" alt="" />'; break;		
		case 'research profile': $search_result_icon = '<img src="'. base_path() . path_to_theme() .'/images/research_icon.png" alt="" />'; break;		
		case 'event': $search_result_icon = '<img src="'. base_path() . path_to_theme() .'/images/event_icon.png" alt="" />'; break;		

}

$info_split_index = count($info_split);

?>
<ul class="result-item">
	<li class="result-icon"><?= $search_result_icon ?></li>
	<li class="result-title"<a href="<?= $url ?>"><?= $title ?></a></li>
	<li class="result-text"><?= $snippet ?></li>
	<li class="result-url"><a href="<?= $url ?>"><?= $url ?></a></li>
</ul> 
