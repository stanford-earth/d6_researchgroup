<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
		
	<div class="news-teaser">

		<div class="photo">
			<?= $teaser_img = ($field_page_image[0]['view'] != '' ? $field_page_image[0]['view'] : '' ); ?>			
		</div>

		<div class="description">

		  <? 	
				if (in_array('webmaster', array_values($user->roles))) { print '<h5><a href="'. base_path() . $node->path .'">'. $title .'</a> <span><a href="'. base_path() . 'node/' . $node->nid . '/edit"><img src="'. base_path() . path_to_theme() . '/images/edit_btn.png" alt="edit" /></a></span></h5>'; }
				else { print '<h5><a href="'. base_path() . $node->path .'">'. $title .'</a></h5>'; }
			?>

			<div class="excerpt">
				<span class="small"><?= $field_source[0]['view'] ?> <?= $authored_by = ($field_authored_by[0]['view'] != '' ? '<em>by '.$field_authored_by[0]['view'] .'</em>' : '' ) ?></span>			
				<?= $node->field_summary[0]['view'] ?>


				<? if ($field_description[0]['view'] != '') : ?>
					<p><?= $field_description[0]['view'], -(strlen($field_description[0]['view'])) ?>...</p>
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
	
</div>
