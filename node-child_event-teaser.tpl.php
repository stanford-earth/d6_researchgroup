<? if (!$is_front) : ?>

<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
		
	<div class="news-teaser">

		<h5><?= date('F d, Y', strtotime($field_date[0]['value'])) ?> </h5> <span class="small"><?= $field_start_time[0]['view'] ?> - <?= $field_end_time[0]['view'] ?></span> 
		<? 	
			if (in_array('webmaster', array_values($user->roles))) { print '<div class="title"><h5><a href="'. base_path() . $node->path .'">'. $title .'</a> <span><a href="'. base_path() . 'node/' . $node->nid . '/edit"><img src="'. base_path() . path_to_theme() . '/images/edit_btn.png" alt="edit" /></a></span></h5></div>'; }
			else { print '<div class="title"><h5><a href="'. base_path() . $node->path .'">'. $title .'</a></h5></div>'; }
		?>  

		<div class="excerpt">

			
			<? if ($field_description[0]['view'] != '') : ?>
				<p><?= substr($field_description[0]['view'], -(strlen($field_description[0]['view'])), 217) ?>...</p>
			<? endif; ?>
			
			<ul class="related">		
				
				<? if ($field_related_sites[0]['view'] != '') : ?>
					<li>
						<strong>Related Departments: </strong>
						<? for ($i = 0; $i <= sizeof($field_related_sites); $i++) { $separator = ($i < sizeof($field_related_sites)-1 ? ', ' : ''); print $field_related_sites[$i]['view'] . $separator; } ?>					
					</li>	
				<? endif; ?>		
				
			</ul>

		</div>
	
	</div>
	
</div>
<? else : // Create block view for homepage ?>

<? $parent_event_path = str_replace(' ' , '-', $field_parent_event[0]['safe']['title']); //Create parent node link by: Adding spaces to parent event title ?>

	<div class="event">
	  <div class="date"><span class="month"><?= date('M', strtotime($field_date[0]['value'])) ?></span><span class="day"><?= date('d', strtotime($field_date[0]['value'])) ?></span></div>
	  <div class="event-description">
	     <a href="<?= $node->path ?>"><?= $title ?></a>
  	   <?= $field_description[0]['view'] ?>
	  </div>
	</div>

<? endif; ?>
