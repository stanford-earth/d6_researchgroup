<? if ( !$teaser ) { ?>

<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<div class="news-clip">
		<span class="small"><?= $field_source[0]['view'] ?> <?= $authored_by = ($field_authored_by[0]['view'] != '' ? '<em>by '.$field_authored_by[0]['view'] .'</em>' : '' ) ?></span><br /><br />
		
		<div class="article-image">			
			<?= $related_image = ($field_page_image[0]['view'] != '' ? '<img src="'. base_path() . 'sites/default/files/imagecache/feature_tier3/' . $field_page_image[0]['filename'] .'" alt="" />' : '' ); ?>	
			<div class="caption"><span><?= $field_page_image[0]['data']['title'] ?></span></div>
		</div>
		<?
			$fullnode = node_load($node->nid);
			print check_markup($fullnode->body, $fullnode->format, FALSE);
		?>
		
		<div class="excerpt">

			<? if ($field_description[0]['view'] != '') : ?>
			<p><?= substr($field_description[0]['view'], -(strlen($field_description[0]['view'])), 217) ?>...</p>
			<? endif; ?>

		</div>
		
	</div>
	
</div>

<hr /><br />

  <? if ($page): ?>
    <div class="block-in-node">
      <?= osc_block_retrieve('featured_content', '1'); ?>
    </div>
  <? endif; ?>
  
<br />  

		
<ul class="inline">
	<li><a href="<?= base_path() . 'news/features' ?>"> &laquo; View all featured stories</a></li>

	<? if (in_array('webmaster', array_values($user->roles))) : ?>
		<li>|</li>
		<li><a href="<?= base_path() . '/node/add/feature' ?>">Add a feature story &raquo;</a></li>
	<? endif; ?>    

</ul>


<? } else { include 'node-feature-teaser.tpl.php'; } ?>
