<? if (!$is_front) { ?>
<?
$teaser_img = ($field_page_image[0]['view'] != '' ? $field_page_image[0]['view'] : false );		
?>
<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
		
	<div class="media-block">
		<? if ($teaser_img) { ?>
		<div class="photo img">
			<?= $teaser_img ?>
		</div>
		<? } ?>
		<div class="description bd">
				<h4><a href="<?= base_path() . $node->path ?>"><?= $title ?></a> <?= edit_link($node->nid) ?></h4>
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

<? } else { // Build homepage blocks ?>
<? global $node_counter;	if( !$node_counter ) { $node_counter = 0; }	$node_counter++; ?>

	<? if ( $node_counter < 3 ) { ?>
 	
		<div class="bottom-features">
		  <div class="photo"><a href="<?= $node->path ?>"><?= '<img src="'. base_path() . 'sites/default/files/imagecache/feature_tier3/' . $field_page_image[0]['filename'] .'" alt="'. $field_page_image[0]['data']['title'] .'" />' ?></a></div>
		  <div class="description">
		    
		    <h5><a href="<?= $node->path ?>"><?= $title ?></a></h5>

		    <?= substr($node->field_summary[0]['view'], 0, '200') . '...' ?>
		
<!--
		    <ul class="topics">
		      <li>Tags:</li>
					<?// for ($i = 0; $i <= sizeof($field_keywords); $i++) { $separator = ($i < sizeof($field_keywords)-1 ? ', ' : ''); print '<li>' .$field_keywords[$i]['view'].'</li>'; } ?>
		    </ul>
-->
		  </div>
		</div>
		
	<? } else { ?>
		
		<div class="clearfix"></div>

		<div class="bottom-features-full">		
		  <div class="excerpt">
		    <h5><a href="<?= $node->path ?>"><?= $title ?></a></h5>
		    <?= $node->field_summary[0]['view'] ?>
		
<!--
		    <ul class="topics">
		      <li>Tags:</li>
					<? //for ($i = 0; $i <= sizeof($field_keywords); $i++) { $separator = ($i < sizeof($field_keywords)-1 ? ', ' : ''); print '<li>' .$field_keywords[$i]['view'].'</li>'; } ?>
		    </ul>
-->
		  </div>
		</div><!-- end bottom-features-full -->

	<? } ?>
<? } ?>

