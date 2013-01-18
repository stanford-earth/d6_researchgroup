<? if ( !$teaser ) { ?>

<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<div class="news-clip">
		<span class="small"><?= $authored_by = ($field_author[0]['view'] != '' ? '<em>by '.$field_author[0]['view'] .'</em>' : '' ) ?></span><br /><br />

		<?
			$fullnode = node_load($node->nid);
			print check_markup($fullnode->body, $fullnode->format, FALSE);
		?>
		
		<div class="clearfix"></div>
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
		
	</div>
	
</div>

<br /><hr />
<ul class="inline">
	<li><a href="<?= base_path() . 'news/blogs' ?>"> &laquo; View all blogs</a></li>

	<? if (in_array('webmaster', array_values($user->roles))) : ?>
		<li>|</li>
		<li><a href="<?= base_path().'comment/reply/'.$node->nid ?>">Post a comment</a></li>
		<li>|</li>
		<li><a href="<?= base_path() . '/node/add/blog' ?>">Add a blog entry &raquo;</a></li>
	<? endif; ?>    

</ul>

<br /><br /><br />

<h4>User Comments</h4>


<? } else { include 'node-blog-teaser.tpl.php'; } ?>
