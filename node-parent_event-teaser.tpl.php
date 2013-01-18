<? if (!$is_front) : ?>
  <div id="node-<?php print $node->nid; ?>" class="article vevent<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>"> 		
  	<div class="media-block">
		<div class="bd">
  		<h5><?= $date ?></h5> 
		<? if($start != $end) { ?>
			<span class="small"><span class="dtstart" title="<?= $field_date[0]['value'] ?>"><?= $start ?></span> - <span class="dtend" title="<?= $field_date[0]['value2'] ?>"><?= $end ?></span></span> 
		<? } ?>
		<div class="summary">
			<h5><a href="<?= base_path() . $node->path ?>"><?= $title ?></a> <?= edit_link($node->nid); ?></h5>
		</div>
  	</div>
	</div>
  </div>

<? else : // Create block view for homepage ?>

	<div class="event">
	  <div class="date"><span class="month"><?= date('M', strtotime($field_date[0]['value'])) ?></span><span class="day"><?= date('d', strtotime($field_date[0]['value'])) ?></span></div>
	  <div class="event-description">
	     <a href="<?= $node->path ?>"><?= $title ?></a>
  	   <?= $field_speaker_name[0]['value'] ?> <?= $field_speaker_institute[0]['value'] ?>
	  </div>
	</div>

<? endif; ?>
