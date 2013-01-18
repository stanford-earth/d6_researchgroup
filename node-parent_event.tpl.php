<?
$date_from = date('F j, Y', strtotime($field_date[0]['value']));
$date_to = date('F j, Y', strtotime($field_date[0]['value2']));
$date = ($date_from == $date_to) ? $date_from : $date_from . ' - '. $date_to;
$start = date('g:i A', strtotime($field_date[0]['value']));
$end = date('g:i A', strtotime($field_date[0]['value2']));
$desc = ($field_description[0]['view']) ? $field_description[0]['view'] : false;
$location = ($field_location_name[0]['view']) ? $field_location_name[0]['view'] : false;
?>
<? if ( !$teaser ) { ?>

<div id="node-<?php print $node->nid; ?>" class="article vevent<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<div class="news-clip">
	
		<table width='98%' class="noborder"> 
			<summary class="summary" style="display: none"><?= $title ?></summary>
			<tr><td valign="top" width="150"><strong><span class="small">Date(s):</span></strong></td><td><?= $date ?></td></tr>
			<? if($start != $end) { ?><tr><td valign="top" width="150"><strong><span class="small">Time:</span></strong></td><td><span class="dtstart" title="<?= $field_date[0]['value'] ?>"><?= $start ?></span> - <span class="dtend" title="<?= $field_date[0]['value2'] ?>"><?= $end ?></span></td></tr><? } ?>
			
			<? if ($location) : ?>
				<tr><td valign="top" width="150"><strong><span class="small">Location:</span></strong></td>
				<td class="location vcard">
				<? if ($field_location_url[0]['url'] != '') { ?>
				<a href="<?= $field_location_url[0]['url'] ?>" rel="nofollow" class="location org fn"><?= $field_location_name[0]['view'] ?></a>
				<? } else { ?>
				<?= $location ?>
				<? } ?>
				<br />
						<span class="adr">
						<span class="street-address"><?= $field_location_address[0]['view'] ?></span><br />
						<span class="locality"><?= $field_location_city[0]['view'] ?></span>
						<span class="region"><?= $field_location_state[0]['view'] ?></span>
						<span class="postal-code"><?= $field_location_zip[0]['view'] ?></span>
						</span>
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
				<td class="vcard">
					<a href="mailto:<?= $field_contact_email[0]['value'] ?>" class="email fn"><?= $field_contact_name[0]['view'] ?></a> <br />
					<span class="tel"><?= $field_contact_phone[0]['view'] ?></span>
				</td></tr>
			<? endif; ?>
	
			<? if ($field_description[0]['view'] != '') : ?>
				<tr><td valign="top"><strong><span class="small">Description:</span></strong></td>
				<td class="description"><?= $desc ?></td></tr>
			<? endif; ?>

		</table>

		<?
			date_default_timezone_set('America/Los_Angeles'); //drupal requires timezone 
			$result = db_query("SELECT DISTINCT node.nid, node.title, content_type_child_event.field_speaker_name_value, content_type_child_event.field_speaker_institute_value, content_field_date.field_date_value, content_field_date.field_date_value2, content_field_description.field_description_value FROM node, content_type_child_event, content_field_date, content_field_description WHERE (node.status <> 0) AND (node.type in ('child_event'))  AND  (content_type_child_event.nid = node.nid) AND (content_field_date.nid = node.nid) AND (content_field_description.nid = node.nid) AND (content_type_child_event.field_parent_event_nid = '$node->nid') ORDER BY  content_field_date.field_date_value ASC;");
			$result_count = db_query("SELECT COUNT(node.nid) as 'row_count' FROM node, content_type_child_event, content_field_date, content_field_description WHERE (node.status <> 0) AND (node.type in ('child_event')) AND (content_type_child_event.nid = node.nid) AND (content_field_date.nid = node.nid) AND (content_field_description.nid = node.nid) AND (content_type_child_event.field_parent_event_nid = '$node->nid') ORDER BY content_field_date.field_date_value ASC;");

			$count_node = db_fetch_object($result_count);
			$events_in_series = $count_node->row_count;			 

			$child_node_index = 0;

			if ($events_in_series > 0) { print	'<div id="events-in-series"><h4>All events in this series</h4></div>'; }			
			while ($node = db_fetch_object($result)) {
			$child_month = date('F', strtotime($node->field_date_value));
			$child_day = date('jS', strtotime($node->field_date_value));
			$child_start = date('g:i A', strtotime($node->field_date_value));
			$child_end = date('g:i A', strtotime($node->field_date_value2));
			?>			

			<div class="events">
				<div class="date">
					<div class="day-of-week"><span class="small"><?= $child_month ?></div><br />
					<div class="day-of-month"><?= $child_day ?></div>			
				</div>				
				<div class="events-for-day">
					<div class="event">
						<div class="time"><?= $child_start .' - '.$child_end ?></div>
						<div class="event-name">			
							<? 	
								$event_title = '<a href="' . base_path() . 'node/' . $node->nid .'">' . $node->title . '</a>';
								if (in_array('webmaster', array_values($user->roles))) { print '<h5>'.$event_title.'</h5>'; }
								else { print $event_title; }
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

<? } else { include 'node-parent_event-teaser.tpl.php'; } ?>
