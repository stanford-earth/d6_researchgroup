<? if ( !$teaser ) { ?>

<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<div class="news-clip">
		<table width='98%' class="noborder"> 
			<? if ($field_description[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Related Description:</strong></td>
				<td><?= $field_description[0]['view'] ?></td></tr>
			<? endif; ?>

			<? if ($field_url[0]['view'] != '') : ?>
				<tr><td width="150"><strong><span class="small">URL:</strong></td>
				<td><span><?= $field_url[0]['view'] ?></span></td></tr>
			<? endif; ?>
			
			<? if ($field_related_categories[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Related Categories:</strong></td>
			
				<td valign="top">
					<span><? for ($i = 0; $i < sizeof($field_related_categories); $i++) { print $field_related_categories[$i]['value'] . '<br />'; } ?></span>
					<? endif; ?>		
				</td></tr>
					
			<? if ($field_related_sites[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Related Sites:</strong></td>
				<td valign="top">			
					<span>
						<? for ($i = 0; $i <= sizeof($field_related_sites)-1; $i++) { 						
						if (sizeof($field_related_sites)-1 == $i) { $nbsp = '&nbsp;'; }
						else { $nbsp = ',&nbsp;'; }
						print $field_related_sites[$i]['value'] . $nbsp; } ?>

					</span>
				</td></tr>
			<? endif; ?>
	
			<? if ($field_related_faculty[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Related Faculty:</strong></td>

				<td valign="top">
					<span><? for ($i = 0; $i < sizeof($field_related_faculty); $i++) { print $field_related_faculty[$i]['view'] . '<br />'; } ?></span>
				</td></tr>

			<? endif; ?>
	
		</table>

	</div>
	<div class="align-right"><span class="small">Submitted on <?= date('M d, Y', strtotime($date)) ?></div>	
</div>

<hr class="clearfix" /><br />
<ul class="inline">
	<li><a href="<?= base_path() . 'news/clips' ?>"> &laquo; View all news clips</a></li>

	<? if (in_array('webmaster', array_values($user->roles))) : ?>
		<li>|</li>
		<li><a href="<?= base_path() . '/node/add/news' ?>">Add a news clip &raquo;</a></li>
	<? endif; ?>    

</ul>

<? } else { include 'node-news-teaser.tpl.php'; } ?>
