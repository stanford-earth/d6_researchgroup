<?
$url = ($field_url[0]['display_url'] != '') ? $field_url[0]['display_url'] : false;
?>
<? if (!$is_front) : ?>
  <div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>"> 		
  	<div class="media-block">
  		<h5>
		<? if ($url) { ?>
		<a href="<?= $url ?>"><?= $title ?></a>
		<? } else { ?>
		<?= $title ?>
		<? } ?>
		 <?= edit_link($node->nid) ?>
		</h5>	
  		
  		<div class="excerpt">
  			<span class="small">Submitted on <?= date('M d, Y', strtotime($date)) ?></span>
  			
  			<? if ($field_description[0]['value'] != '') : ?>
				<?= $field_description[0]['value'] ?>
  			<? endif; ?>
  			
  		</div>
  	</div>
  </div>


<? else : // Create block view for homepage ?>
<div class="date"><?= date('M d, Y', strtotime($date)) ?></div>
  <?= edit_link($node->nid) ?>
  <h4 class="heading">
  <? if ($url) { ?>
  <a href="<?= $url ?>"><?= $title ?></a>
  <? } else { ?>
  <?= $title ?>
  <? } ?>
  </h4>
  <?= $field_description[0]['value'] ?>
<? endif; ?>
