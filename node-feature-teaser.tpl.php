<? if (!$is_front) { ?>

<?
$teaser_img = ($field_page_image[0]['view'] != '' ? $field_page_image[0]['view'] : false ); 
?>	
	<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

	
	<? $pathalias = explode('/', drupal_get_path_alias($_GET['q'])); ?>

<? if ( $pathalias[0] == 'alumni') { ?>
			
	<div id="featured-content-for-subpages">
		<?= $field_homepage_image[0]['view'] ?>
		<div id="caption">
			<h3><a href="<?= $node->path ?>"><?= $title ?></a></h3>
			<?= substr($node->field_summary[0]['view'], -(strlen($node->field_summary[0]['view'])), 250) ?>...<br />
			<a href="<?= $node->path ?>">Read more &raquo;</a>
			</div>
	</div>

<? } else { ?>	

	<div class="media-block">

		<? if($teaser_img) { ?>
		<div class="photo img">
		</div>
		<? } ?>
		<div class="description bd">

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
	<? } ?>
<? } else { // Create block view for homepage ?>

<div class="date"><?= date('M d, Y', strtotime($date)) ?></div>
<div class="photo"><?= $field_homepage_image[0]['view'] ?></div>
<div class="heading"><a href="<?= $node->path ?>"><?= $title ?></a> <?= substr($field_summary[0]['view'], 0, 215) ?></div>

<? } //end homepage block ?>

