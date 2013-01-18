<?
// $Id: template.php

/**
 * Initialize theme settings if needed
 */

if (variable_get('ses_client_feed_name','') == 'mantlepetrology') {
    drupal_add_js(drupal_get_path('theme','researchgroup') . '/javascripts/mantleprocesses.js');
}

function ses_main_homepage_tabs() {
  $image = variable_get('homepage_tabs','');
  return 'variables are: ' .$image;
}

function get_path() {
	$path = (drupal_get_path_alias($_GET['q']) != 'node') ? drupal_get_path_alias($_GET['q']) : '<front>';
	return $path;
}

// Edit links used in the UI
function edit_link($id,$type='') {
	if (!$type) {
		$type = node_load($id)->{'type'};
	}
	switch($type) {
		case 'block':
	 		$html = '<a href="' . base_path() . 'admin/build/block/configure/block/' . $id . '?destination=' . get_path() . '" class="edit-entry-tab">Edit block</a>';
			$html = user_access('administer blocks') ? $html : '';
			break;
		default:
			$html = '<span><a href="'. base_path() . 'node/' . $id . '/edit?destination=' . get_path()  . '"><img src="'. base_path() . path_to_theme() . '/images/edit_btn.png" alt="edit" /></a></span>';
			$html = user_access('edit any ' . $type . ' content') ? $html : '';
	}
	return $html;
}


/**
* Format the result page of a search query.
*
* Modules may implement hook_search_page() in order to override this default
* function to display search results. In that case it is expected they provide
* their own themeable functions.
*
* @param $results
*   All search result as returned by hook_search().
* @param $type
*   The type of item found, such as "user" or "node".
*
* @ingroup themeable
*/
function ses_main_search_page($results, $type) {
  $output = '<dl class="search-results">';

  foreach ($results as $entry) {
    $output .= theme('search_item', $entry, $type);
  }
  $output .= '</dl>';
  $output .= theme('pager', NULL, 10, 0);

  return $output;
}


function ses_main_search_item($item, $type) {
  $output = ' <dt class="title"><a href="'. check_url($item['link']) .'">'. check_plain($item['title']) .'</a></dt>';
  $info = array();
  if ($item['type']) {
    $info[] = check_plain($item['type']);
  }
  if ($item['user']) {
    $info[] = $item['user'];
  }
  if ($item['date']) {
    $info[] = format_date($item['date'], 'small');
  }
  if (is_array($item['extra'])) {
    $info = array_merge($info, $item['extra']);
  }
  $output .= ' <dd>'. ($item['snippet'] ? '<p>'. $item['snippet'] .'</p>' : '') .'<p class="search-info">'. implode(' - ', $info) .'</p></dd>';
  return $output;
}

/**
* Helper function for retrieving block code for insertion into templates.
*
* @see http://drupal.org/node/753516#comment-2769068
*/
function osc_block_retrieve($module, $delta) {
  $block = (object) module_invoke($module, 'block', 'view', $delta);
  $block->module = $module;
  $block->delta = $delta;
  return theme('block', $block);
}

/**
* Reduced text size and add elipsis if needed.
*/

function shorten_text($text, $length=1000, $elipsis='...') {
	if(strlen($text) > $length) {
		$text = substr($text, 0, $length) . $elipsis;
	}
	return $text;
}
