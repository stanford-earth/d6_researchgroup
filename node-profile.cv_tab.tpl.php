  <input type="button" name="printpage" id="printpage" value='Print Curriculum Vitae' class="alt-display-btn" onclick="javascript:window.print()" />
<?
	# Check if user has permission to edit CV
	global $user;
	$adminRoles= array('webmaster','webeditor');
	$adminAble= FALSE;
	foreach($adminRoles as $role) { if (in_array($role, array_values($user->roles)) || $user->uid == $node->uid ) $adminAble = TRUE; }

	function clean_entries($str) {
		# first remove opening and closing <p>'s
		$searchfor = array('<p>', '</p>');
		$replacewith   = array('', '');
		$cleanstr = str_replace($searchfor, $replacewith, $str);


		$searchfor01 = array('<ul>', '</ul>');
		$replacewith01   = array('', '');
		$cleanstr01 = str_replace($searchfor01, $replacewith01, $cleanstr);
		
	
		#replace <li /> w/ <li>&#32;
		$searchfor02 = '</li>';
		$replacewith02   = '</li>&#32;';
		$cleanstr02 = str_replace($searchfor02, $replacewith02, $cleanstr01);


		#Count how many instants of <br>, <ul>, <li> there are
		#Loop through the # then remove tags 
		

    $entries = explode('</li>&#32;', $cleanstr02); //look for <br>'s and split string into array
    return $entries;
	}
	
?> 


<? if ($field_cv_education[0]['value'] != ''): ?>
<div class="expandable_data" id="for-education">
	<h4>Education</h4>
	<? $entries = clean_entries($field_cv_education[0]['value']);	?>
	<ul class="cv_listings"  id="education">	
		<? for ($i = 0; $i < count($entries); $i++) { print "$entries[$i]"; } ?>
	</ul>
	<? if ($i > 4) : ?>	
	<div><a href="#education" class="toggle_cv_data" rel="education">Expand to full listing</a> <span class="row-count"><?= $i-1 ?> entries</span></div>
	<? endif; ?>
</div>
<? endif; ?>

<? if ($field_cv_professional_experience[0]['value'] != ''): ?>
<div class="expandable_data" id="for-professional-experience">	
	<h4>Professional Experience</h4>
	<? $entries = clean_entries($field_cv_professional_experience[0]['value']);	?>
	<ul class="cv_listings" id="professionalexperience">	
		<? for ($i = 0; $i < count($entries); $i++) { print "$entries[$i]"; } ?>
	</ul>
	<? if ($i > 4) : ?>
	<div><a href="#professionalexperience" class="toggle_cv_data" rel="professionalexperience">Expand to full listing</a> <span class="row-count"><?= $i-1 ?> entries</span></div>
	<? endif; ?>
</div>
<? endif; ?>

<? if ($field_cv_honors_awards[0]['value'] != ''): ?>
<div class="expandable_data" id="for-honors-awards">
	<h4>Honors &amp; Awards</h4>
	<? $entries = clean_entries($field_cv_honors_awards[0]['value']);	?>
	<ul class="cv_listings"  id="honorsawards">	
		<? for ($i = 0; $i < count($entries); $i++) { print "$entries[$i]"; } ?>
	</ul>
	<? if ($i > 4) : ?>	
	<div><a href="#education" class="toggle_cv_data" rel="honorsawards">Expand to full listing</a> <span class="row-count"><?= $i-1 ?> entries</span></div>
	<? endif; ?>
</div>
<? endif; ?>

<? if ($field_cv_university_service[0]['value'] != ''): ?>
<div class="expandable_data" id="for-university-service">
	<h4>University Service</h4>
	<? $entries = clean_entries($field_cv_university_service[0]['value']);	?>
	<ul class="cv_listings"  id="universityservice">	
		<? for ($i = 0; $i < count($entries); $i++) { print "$entries[$i]"; } ?>
	</ul>
	<? if ($i > 4) : ?>
	<div><a href="#education" class="toggle_cv_data" rel="universityservice">Expand to full listing</a> <span class="row-count"><?= $i-1 ?> entries</span></div>
	<? endif; ?>
</div>
<? endif; ?>

<? if ($field_cv_professional_activities[0]['value'] != ''): ?>
<div class="expandable_data" id="for-professional-activities">
	<h4>Professional Activities</h4>
	<? $entries = clean_entries($field_cv_professional_activities[0]['value']);	?>
	<ul class="cv_listings"  id="professionalactivities">	
		<? for ($i = 0; $i < count($entries); $i++) { print "$entries[$i]"; } ?>
	</ul>
	<? if ($i > 4) : ?>
	<div><a href="#education" class="toggle_cv_data" rel="professionalactivities">Expand to full listing</a> <span class="row-count"><?= $i-1 ?> entries</span></div>
	<? endif; ?>
</div>
<? endif; ?>

<? if ($field_cv_courses_taught[0]['value'] != ''): ?>
<div class="expandable_data" id="for-courses-taught">
	<h4>Courses Taught</h4>
	<? $entries = clean_entries($field_cv_courses_taught[0]['value']);	?>
	<ul class="cv_listings"  id="coursestaught">	
		<? for ($i = 0; $i < count($entries); $i++) { print "$entries[$i]"; } ?>
	</ul>
	<? if ($i > 4) : ?>
	<div><a href="#education" class="toggle_cv_data" rel="coursestaught">Expand to full listing</a> <span class="row-count"><?= $i-1 ?> entries</span></div>	
	<? endif; ?>
</div>
<? endif; ?>

<? if ($field_cv_publications[0]['value'] != ''): ?>
<div class="expandable_data" id="for-publications">
	<h4>Publications</h4>
	<? $entries = clean_entries($field_cv_publications[0]['value']);	?>
	<ul class="cv_listings"  id="publications">	
		<? for ($i = 0; $i < count($entries); $i++) { print "$entries[$i]"; } ?>
	</ul>
	<? if ($i > 4) : ?>
	<div><a href="#education" class="toggle_cv_data" rel="publications">Expand to full listing</a> <span class="row-count"><?= $i-1 ?> entries</span></div>	
	<? endif; ?>
</div>

<? endif; ?>

<? if ($field_cv_advisees_degrees[0]['value'] != ''): ?>
<div class="expandable_data" id="for-advisee-degrees">
	<h4>Advisee Degrees</h4>
	<? $entries = clean_entries($field_cv_advisees_degrees[0]['value']);	?>
	<ul class="cv_listings"  id="adviseedegrees">	
		<? for ($i = 0; $i < count($entries); $i++) { print "$entries[$i]"; } ?>
	</ul>
	<? if ($i > 4) : ?>
	<div><a href="#education" class="toggle_cv_data" rel="adviseedegrees">Expand to full listing</a> <span class="row-count"><?= $i-1 ?> entries</span></div>	
	<? endif; ?>
</div>
<? endif; ?>

<? if ($field_cv_advisee_publications[0]['value'] != ''): ?>
<div class="expandable_data" id="for-advisee-publications">
	<h4>Advisee Publications</h4>
	<? $entries = clean_entries($field_cv_advisee_publications[0]['value']);	?>
	<ul class="cv_listings"  id="adviseepublications">	
		<? for ($i = 0; $i < count($entries); $i++) { print "$entries[$i]"; } ?>
	</ul>
	<? if ($i > 4) : ?>
	<div><a href="#education" class="toggle_cv_data" rel="adviseepublications">Expand to full listing</a> <span class="row-count"><?= $i-1 ?> entries</span></div>	
	<? endif; ?>
</div>
<? endif; ?>

