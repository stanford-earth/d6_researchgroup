<? if ( !$teaser ) { ?>

<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<div class="news-clip">
		<span class="small">Submitted on <?= $date ?></span>

		<table width='98%' class="noborder"> 

			<? if ($field_url[0]['view'] != '') : ?>
				<tr><td width="150"><strong><span class="small">URL:</span></strong></td>
				<td><?= $field_url[0]['view'] ?></td></tr>
			<? endif; ?>
	
			<? if ($field_related_categories[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Related Categories:</span></strong></td>
			
				<td valign="top">
					<? for ($i = 0; $i < sizeof($field_related_categories); $i++) { print $field_related_categories[$i]['value'] . '<br />'; } ?>
				</td></tr>
  		<? endif; ?>
  		
			<? if ($field_related_sites[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Related Sites:</span></strong></td>
				<td valign="top">			
				
					<? for ($i = 0; $i < sizeof($field_related_sites); $i++) { print $field_related_sites[$i]['value'] . '<br />'; } ?>
				</td></tr>
			<? endif; ?>
	
			<? if ($field_related_faculty[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Related Faculty:</span></strong></td>

				<td valign="top">
					<? for ($i = 0; $i < sizeof($field_related_faculty); $i++) { print $field_related_faculty[$i]['view'] . '<br />'; } ?>				
				</td></tr>
			<? endif; ?>
	
			<? if ($field_url[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Related Description:</span></strong></td>
				<td><?= $field_description[0]['view'] ?></td></tr>
			<? endif; ?>

		</table>

	</div>
</div>

<hr /><br />
	
<ul class="inline">
	<li><a href="<?= base_path() . 'news/honors-awards' ?>"> &laquo; View all honors and awards</a></li>

	<? if (in_array('webmaster', array_values($user->roles))) : ?>
		<li>|</li>
		<li><a href="<?= base_path() . '/node/add/award' ?>">Add an honor and or award &raquo;</a></li>
	<? endif; ?>    

</ul>


<? } else { include 'node-news-teaser.tpl.php'; } ?>

