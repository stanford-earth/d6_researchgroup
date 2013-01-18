<? if (!$is_front) { ?>
<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	
	<div class="news-teaser">

		<div class="photo">
			<?= $teaser_img = ($field_page_image[0]['view'] != '' ? $field_page_image[0]['view'] : '' ); ?>			
		</div>

		<div class="description">

		  <? 	
				if (in_array('webmaster', array_values($user->roles))) { print '<h5><a href="'. base_path() . $node->path .'">'. $title .'</a> <span><a href="'. base_path() . 'node/' . $node->nid . '/edit"><img src="'. base_path() . path_to_theme() . '/images/edit_btn.png" alt="edit" /></a></span></h5>'; }
				else { print '<h5><a href="'. base_path() . $node->path .'">'. $title .'</a></h5>'; }
			?>

			<div class="excerpt">
				<span class="small"><?= $field_source[0]['view'] ?> <?= $authored_by = ($field_authored_by[0]['view'] != '' ? '<em>by '.$field_authored_by[0]['view'] .'</em>' : '' ) ?></span>			
				<?= $node->field_summary[0]['view'] ?>


				<? if ($field_description[0]['view'] != '') : ?>
					<p><?= substr($field_description[0]['view'], -(strlen($field_description[0]['view'])), 217) ?>...</p>
				<? endif; ?>
				

	
			</div>

		</div>
	
	</div>
	
</div>
<? } else { //Build homepage blocks ?>

  <ul class="blogs-homepage-listing">
    <li class="excerpt"><?= $teaser_img = ($field_page_image[0]['view'] != '' ? $field_page_image[0]['view'] : '' ); ?>
      <h5><a href="<?= $node->path ?>"><?= $title ?></a></h5>
      <?= substr($node->field_summary[0]['view'], -(strlen($node->field_summary[0]['view'])), 210) ?>...
      <br /><cite>Tags: <? for ($i = 0; $i <= sizeof($field_keywords); $i++) { $separator = ($i < sizeof($field_keywords)-1 ? ', ' : ''); print $field_keywords[$i]['view'] . $separator; } ?></cite>
    </li>
  </ul>  


<? } ?>