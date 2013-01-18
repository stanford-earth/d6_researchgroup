<? if ( !$teaser ) { ?>

<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<div class="news-clip">
		<span class="small"><?= $field_source[0]['view'] ?> <?= $authored_by = ($field_authored_by[0]['view'] != '' ? '<em>by '.$field_authored_by[0]['view'] .'</em>' : '' ) ?></span>


		<div class="media-block">			
			<div class="photo img"><?= $field_page_image[0]['view']; ?></div>
			<div class="bd"><?= $field_page_image_caption[0]['view'] ?></div>
		</div>
		<?
			$fullnode = node_load($node->nid);
			print check_markup($fullnode->body, $fullnode->format, FALSE);
		?>
		
		<div class="excerpt">

			<? if ($field_description[0]['view'] != '') : ?>
			<p><?= substr($field_description[0]['view'], -(strlen($field_description[0]['view'])), 217) ?>...</p>
			<? endif; ?>
			
			<ul class="related">
			
				<? if ($field_url[0]['view'] != '') : ?>
				<li><strong>URL: </strong><?= $field_url[0]['view'] ?> <img src="<?= base_path() . path_to_theme() ?>/images/link.png" alt="" /></li>			
				<? endif; ?>
				
				<? if ($field_related_categories[0]['view'] != '') : ?>
				<li>
					<strong>Related Categories: </strong>
					<? for ($i = 0; $i <= sizeof($field_related_categories); $i++) { $separator = ($i < sizeof($field_related_categories)-1 ? ', ' : ''); print $field_related_categories[$i]['value'] . $separator; } ?>					
				</li>	
				<? endif; ?>
				
				<? if ($field_keywords[0]['view'] != '') : ?>
				<li>
					<strong>Keywords: </strong>
					<? for ($i = 0; $i <= sizeof($field_keywords); $i++) { $separator = ($i < sizeof($field_keywords)-1 ? ', ' : ''); print $field_keywords[$i]['view'] . $separator; } ?>					
				</li>	
				<? endif; ?>
				
				<? if ($field_related_sites[0]['view'] != '') : ?>
				<li>
					<strong>Related Departments: </strong>
					<? for ($i = 0; $i <= sizeof($field_related_sites); $i++) { $separator = ($i < sizeof($field_related_sites)-1 ? ', ' : ''); print $field_related_sites[$i]['view'] . $separator; } ?>					
				</li>	
				<? endif; ?>		
				
				
				<? if ($field_related_faculty[0]['view'] != '') : ?>
				<li>
					<strong>Related Faculty: </strong>
				<? for ($i = 0; $i <= sizeof($field_related_faculty); $i++) { $separator = ($i < sizeof($field_related_faculty)-1 ? ', ' : ''); print $field_related_faculty[$i]['view'] . $separator; } ?>					
			</li>	
			<? endif; ?>
			
		</ul>

	</div>

	<? if(!empty($field_related_publications[0][nid])) { ?>
	<h3>Publications</h3>
	<ul>
	<? foreach($field_related_publications as $pub) { ?>
		<? $pubNode = node_load($pub[nid]); ?>
		<li><?= $pubNode->{'body'} ?></li>
	<? } ?>
	</ul>
	<? } ?>
</div>

</div>

<hr /><br />
	
<ul class="inline">
<li><a href="<?= base_path() . 'research' ?>"> &laquo; View all research</a></li>

<? if (in_array('webmaster', array_values($user->roles))) : ?>
		<li>|</li>
		<li><a href="<?= base_path() . '/node/add/research-profile' ?>">Add a Research Profile &raquo;</a></li>
	<? endif; ?>    

</ul>


<? } else { include 'node-research_profile-teaser.tpl.php'; } ?>
