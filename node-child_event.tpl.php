<?
$date = date('F d, Y', strtotime($field_date[0]['value']));
$start = date('g:i A', strtotime($field_date[0]['value']));
$end = date('g:i A', strtotime($field_date[0]['value2']));
$desc = ($field_description[0]['view']) ? $field_description[0]['view'] : false;
$location = ($field_location_name[0]['view']) ? $field_location_name[0]['view'] : false;
?>
<? if ( !$teaser ) { ?>

<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<div class="news-clip">
	
		<table width='98%' class="noborder"> 
			<tr><td valign="top" width="150"><strong><span class="small">Date(s):</span></strong></td><td><?= $date ?></td></tr>
			<? if($start != $end) { ?><tr><td valign="top" width="150"><strong><span class="small">Time:</span></strong></td><td><?= $start ?> - <?= $end ?></td></tr><? } ?>
			
			<? if ($field_location_name[0]['view'] != '') : ?>
				<tr><td valign="top" width="150"><strong><span class="small">Location:</span></strong></td>
				<td><a href="<?= $field_location_url[0]['url'] ?>" rel="nofollow" target="_blank"><?= $field_location_name[0]['view'] ?></a><br />
						<?= $field_location_address[0]['view'] ?><br />
						<?= $field_location_city[0]['view'] ?>,
						<?= $field_location_state[0]['view'] ?>
						<?= $field_location_zip[0]['view'] ?>
				</td>
				</tr>
				
			<? endif; ?>

			<? if ($field_related_categories[0]['view'] != '') : ?>
			<tr><td valign="top"><strong><span class="small">Related Categories:</span></strong></td>
		
			<td valign="top">
				<? for ($i = 0; $i < sizeof($field_related_categories); $i++) { print $field_related_categories[$i]['value'] . '<br />'; } ?>
				<? endif; ?>		
			</td></tr>
					
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

			<? if ($field_contact_name[0]['view'] != '') : ?>
				<tr><td valign="top" width="150"><strong><span class="small">Contact:</span></strong></td>
				<td>
					<a href="mailto:<?= $field_contact_email[0]['value'] ?>"><?= $field_contact_name[0]['view'] ?></a> <br />
					<?= $field_contact_phone[0]['view'] ?>
				</td></tr>
			<? endif; ?>
	
			<? if ($field_description[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Description:</span></strong></td>
				<td><?= $field_description[0]['view'] ?></td></tr>
			<? endif; ?>

		</table>

		<?
			date_default_timezone_set('America/Los_Angeles'); //drupal requires timezone 
			$result = db_query("SELECT DISTINCT node.nid, node.title, content_type_child_event.field_speaker_name_value, content_type_child_event.field_speaker_institute_value, content_field_date.field_date_value, content_field_description.field_description_value FROM node, content_type_child_event, content_field_date, content_field_description WHERE (node.status <> 0) AND (node.type in ('child_event'))  AND  (content_type_child_event.nid = node.nid) AND (content_field_date.nid = node.nid) AND (content_field_description.nid = node.nid) AND (content_type_child_event.field_parent_event_nid = '$node->nid') ORDER BY  content_field_date.field_date_value ASC;");
			$result_count = db_query("SELECT COUNT(node.nid) as 'row_count' FROM node, content_type_child_event, content_field_date, content_field_description WHERE (node.status <> 0) AND (node.type in ('child_event')) AND (content_type_child_event.nid = node.nid) AND (content_field_date.nid = node.nid) AND (content_field_description.nid = node.nid) AND (content_type_child_event.field_parent_event_nid = '$node->nid') ORDER BY content_field_date.field_date_value ASC;");

			$count_node = db_fetch_object($result_count);
			$events_in_series = $count_node->row_count;			 

			$child_node_index = 0;

			if ($events_in_series > 0) { print	'<div id="events-in-series"><h4>All events in this series</h4></div>'; }			
			while ($node = db_fetch_object($result)) {

			?>			

			<div class="events">
				<div class="date">
					<span class="day-of-week"><span class="small"><?= date('F', strtotime($node->field_date_value));  ?></span><br />
					<span class="day-of-month"><?= date('jS', strtotime($node->field_date_value));  ?></span>			
				</div>				
				<div class="events-for-day">
					<div class="event">
						<div class="time"><?= $node->field_start_time_value .' - '.$node->field_end_time_value ?></div>
						<div class="event-name">			
							<? 	
								if (in_array('webmaster', array_values($user->roles))) { print '<h5>'.$node->title.'</h5>'; }
								else { print $node->title; }
							?> 
							<?=$node->field_description_value ?>
							
							<ul class="related">
								<li><strong>Speaker: </strong><?= $node->field_speaker_name_value ?></li>
								<li><strong>Related Departments: </strong><?= $node->field_speaker_institute_value ?></li>
							</ul>
						  <? if (in_array('webmaster', array_values($user->roles))) { print '<a class="edit-node" href="'. base_path() . 'node/' . $node->nid . '/edit"><img src="'. base_path() . path_to_theme() . '/images/edit_btn.png" alt="edit" /></a>'; } ?>
					</div>
					</div><!-- end event -->
				</div>
			</div><!-- end events -->
		<? }	?>
	
		<? if ($events_in_series > 0) { print	'<div id="events-month-view-footer"></div>'; }  ?>

	</div>
</div>

<br /><br /><hr /><br />


<ul class="inline">
	<li><a href="<?= base_path() . 'events' ?>"> &laquo; View all events</a></li>

	<? if (in_array('webmaster', array_values($user->roles))) : ?>
		<li>|</li>
		<li><a href="<?= base_path() . '/node/add/parent-event' ?>">Add a Event &raquo;</a></li>
	<? endif; ?>    

</ul>

<? } else { include 'node-child_event-teaser.tpl.php'; } ?>
