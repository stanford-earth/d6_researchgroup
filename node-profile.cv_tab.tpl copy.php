<?

# Check if user has permission to edit CV

global $user;
$adminRoles= array('webmaster','webeditor');
$adminAble= FALSE;
foreach($adminRoles as $role) { if( in_array($role, array_values($user->roles)) || $user->uid == $node->uid ) $adminAble= TRUE; }

?>


<!-- begin CV tab content -->

<h4>Education</h4>
<? // Allow owner OR admin to ADD entry 'node/add/education' ?>
<? if ($adminAble) : ?><a class="create-entry" href="<?= base_path() ?>node/add/education">Create a new entry for Education</a><? endif; ?>

<?
$edu_output  = '<div class="expandable_data" id="cv_education">' . "\n";
$edu_result = db_query("SELECT * FROM node, content_type_education, content_field_year, content_field_degree,content_field_institution WHERE node.uid='$node->uid' AND node.type='education' AND node.nid=content_type_education.nid AND node.nid=content_field_year.nid AND node.nid=content_field_degree.nid AND node.nid=content_field_institution.nid ORDER BY content_field_year.field_year_value DESC;");
$edu_index = 0;

while ($edu_node = db_fetch_object($edu_result)) {

	$edu_year = substr($edu_node->field_year_value, 0, 4);
	$edu_output .= ' <div class="cvlisting">' . "\n";
	$edu_output .= '  <div class="date">'. $edu_year .'</div>' . "\n";
	
	if ( $adminAble ) {	// Allow owner OR admin to edit this entry
		$edu_output .= '  <div class="title">'. $edu_node->field_degree_value  . ',&nbsp;' .  $edu_node->field_area_value . ',&nbsp;'.  $edu_node->field_institution_value;
		$edu_output .= '<a href="'. base_path() .'node/'. $edu_node->nid .'/edit"> <img src="'. base_path() .'sites/all/themes/ses_main/images/edit_btn.png" alt="" /></a>' .'</div>' . "\n";
	} else { $edu_output .= '  <div class="title">'. $edu_node->field_degree_value  . ',&nbsp;' .  $edu_node->field_area_value . ',&nbsp;'.  $edu_node->field_institution_value .'</div>' . "\n"; }
	
	$edu_output .= ' </div>' . "\n";
	$edu_index++;
}

$edu_output  .= '</div>' . "\n\n";

if ($edu_index != 0) : print $edu_output;
else : ?>
	<div class="cvlisting"><div class="title"><span class="small"><strong>There are no entries for Education</strong></span></div></div>
<? endif; ?>



<h4 class="for-profile">Professional Experience</h4>
<? // Allow owner OR admin to ADD entry 'node/add/professional-experience' ?>
<? if ($adminAble) : ?><a class="create-entry" href="<?= base_path() ?>node/add/professional-experience">Create a new entry for Professional Experience</a><? endif; ?>

<?
$pro_output  = '<div class="expandable_data" rel="cv_professional experience">' . "\n";
$pro_result = db_query("SELECT * FROM node, content_field_start_year, content_field_end_year, content_field_title, content_field_institution, content_type_professional_experience WHERE node.uid='$node->uid' AND node.type='professional_experience' AND node.nid=content_field_start_year.nid AND node.nid=content_field_end_year.nid AND node.nid=content_field_title.nid AND node.nid=content_field_institution.nid AND node.nid=content_type_professional_experience.nid  ORDER BY field_start_year_value DESC;");
$pro_index = 0;

while ($pro_node = db_fetch_object($pro_result)) {
	$pro_index++;
	$pro_start_year = substr($pro_node->field_start_year_value, 0, 4);
	$pro_end_year = ($pro_node->field_end_year_value == '' ? "Present" : substr($pro_node->field_end_year_value, 0, 4) );
	$pro_years = ($pro_start_year == $pro_end_year ? $pro_start_year : "$pro_start_year &ndash; $pro_end_year" );

	$pro_output .= ' <div class="cvlisting">' . "\n";
	$pro_output .= '   <div class="date">'. $pro_years .'</div>' . "\n";

	if ( $adminAble ) {	// Allow owner OR admin to edit this entry

			$pro_output .= '   <div class="title">'. $pro_node->field_title_value  . ',&nbsp;' .  $pro_node->field_institution_value;
			$pro_output .= '<a href="'. base_path() .'node/'. $pro_node->nid .'/edit"> <img src="'. base_path() .'sites/all/themes/ses_main/images/edit_btn.png" alt="" /></a>' .'</div>' . "\n";

	} else { $pro_output .= '   <div class="title">'. $pro_node->field_title_value  . ',&nbsp;' .  $pro_node->field_institution_value .'</div>' . "\n"; } 

	$pro_output .= ' </div>' . "\n";

}

$pro_output  .= '</div>' . "\n\n";

if ($pro_index != 0) : print $pro_output;
else : ?>
	<div class="cvlisting"><div class="title"><span class="small"><strong>There are no entries for Professional Experience</strong></span></div></div>
<? endif; ?>

<? if ($pro_index > 4) : ?><a href="#" class="toggle_cv_data" rel="professional experience">Expand professional experience</a> <span class="row-count">(<?= $pro_index ?> entries)</span></p><? endif; ?>

<h4 class="for-profile">Honors &amp; Awards</h4>
<? // Allow owner OR admin to ADD entry 'node/add/honors-and-awards' ?>
<? if ($adminAble) : ?><a class="create-entry" href="<?= base_path() ?>node/add/honors-and-awards">Create a new entry for Honors &amp; Awards</a><? endif; ?>
<?
$awards_output  = '<div class="expandable_data" rel="cv_honors and awards">' . "\n";
$awards_result = db_query("SELECT * FROM node, content_type_honors_and_awards, content_field_start_year, content_field_end_year, content_field_description WHERE node.uid='$node->uid' AND node.type='honors_and_awards' AND node.nid=content_type_honors_and_awards.nid AND node.nid= content_field_start_year.nid AND node.nid= content_field_end_year.nid AND node.nid= content_field_description.nid ORDER BY content_field_start_year.field_start_year_value DESC;");	
$awards_index = 0;

while ($awards_node = db_fetch_object($awards_result)) {
	$awards_index++;
	$awards_start_year = substr($awards_node->field_start_year_value, 0, 4);
	$awards_end_year 	 = substr($awards_node->field_end_year_value, 0, 4);
	$awards_years = ($awards_start_year == $awards_end_year ? $awards_start_year : "$awards_start_year &ndash; $awards_end_year" );

	$awards_output .= ' <div class="cvlisting">' . "\n";
	$awards_output .= '   <div class="date">'. $awards_years .'</div>' . "\n";
	$awards_output .= '   <div class="title">'. $awards_node->field_description_value;

	if ( $adminAble ) {	// Allow owner OR admin to edit this entry
		$awards_output .= '<a href="'. base_path() .'node/'. $awards_node->nid .'/edit"> <img src="'. base_path() .'sites/all/themes/ses_main/images/edit_btn.png" alt="" /></a>';
	}

	$awards_output .= '</div>' . "\n";
	$awards_output .= ' </div>' . "\n";

}

$awards_output  .= '</div>' . "\n\n";

if ($awards_index != 0) : print $awards_output;
else : ?>
	<div class="cvlisting"><div class="title"><span class="small"><strong>There are no entries for Honors &amp; Awards</strong></span></div></div>
<? endif; ?>

<? if ($awards_index > 4) : ?><p><a href="#" class="toggle_cv_data" rel="honors and awards">Expand honors and awards</a> <span class="row-count">(<?= $awards_index ?> entries)</span></p><? endif; ?>


<h4 class="for-profile">University Service</h4>
<? // Allow owner OR admin to ADD entry 'node/add/university-service' ?>
<? if ($adminAble) : ?><a class="create-entry" href="<?= base_path() ?>node/add/university-service">Create a new entry for University Service</a><? endif; ?>
<?
$service_output  = '<div class="expandable_data" rel="cv_university service">' . "\n";
$service_result = db_query("SELECT * FROM node, content_type_university_service, content_field_start_year, content_field_end_year, content_field_description WHERE node.uid='$node->uid' AND node.type='university_service' AND node.nid=content_type_university_service.nid AND node.nid= content_field_start_year.nid AND node.nid= content_field_end_year.nid AND node.nid= content_field_description.nid ORDER BY content_field_start_year.field_start_year_value DESC;");	
$service_index = 0;

while ($service_node = db_fetch_object($service_result)) {
	$service_index++;
	$service_start_year = substr($service_node->field_start_year_value, 0, 4);
	$service_end_year 	 = substr($service_node->field_end_year_value, 0, 4);
	$service_end_year = ($service_node->field_end_year_value == '' ? "Present" : substr($service_node->field_end_year_value, 0, 4) );
	$service_years = ($service_start_year == $service_end_year ? $service_start_year : "$service_start_year &ndash; $service_end_year" );
	
	$service_output .= ' <div class="cvlisting">' . "\n";
	$service_output .= '   <div class="date">'. $service_years .'</div>' . "\n";
	$service_output .= '   <div class="title">'. $service_node->field_description_value;

	if ( $adminAble ) {	// Allow owner OR admin to edit this entry
		$service_output .= '<a href="'. base_path() .'node/'. $service_node->nid .'/edit"> <img src="'. base_path() .'sites/all/themes/ses_main/images/edit_btn.png" alt="" /></a>';
	}

	$service_output .= '</div>' . "\n";
	$service_output .= ' </div>' . "\n";

}

$service_output  .= '</div>' . "\n\n";

if ($service_index != 0) : print $service_output;
else : ?>
	<div class="cvlisting"><div class="title"><span class="small"><strong>There are no entries for University Service</strong></span></div></div>
<? endif; ?>

<? if ($service_index > 4) : ?><p><a href="#" class="toggle_cv_data" rel="university service">Expand university service</a> <span class="row-count">(<?= $service_index ?> entries)</span></p><? endif; ?>



<h4 class="for-profile">Professional Activities</h4>
<? // Allow owner OR admin to ADD entry 'node/add/professional-activities' ?>
<? if ($adminAble) : ?><a class="create-entry" href="<?= base_path() ?>node/add/professional-activities">Create a new entry for Professional Activities</a><? endif; ?>
<?
$proact_output  = '<div class="expandable_data" rel="cv_professional activities">' . "\n";
$proact_result = db_query("SELECT * FROM node, content_type_professional_activities, content_field_start_year, content_field_end_year, content_field_description WHERE node.uid='$node->uid' AND node.type='professional_activities' AND node.nid=content_type_professional_activities.nid AND node.nid= content_field_start_year.nid AND node.nid= content_field_end_year.nid AND node.nid= content_field_description.nid ORDER BY content_field_start_year.field_start_year_value DESC;");	
$proact_index = 0;

while ($proact_node = db_fetch_object($proact_result)) {
	$proact_index++;
	$proact_start_year = substr($proact_node->field_start_year_value, 0, 4);
	$proact_end_year 	 = substr($proact_node->field_end_year_value, 0, 4);
	$proact_end_year = ($proact_node->field_end_year_value == '' ? "Present" : substr($proact_node->field_end_year_value, 0, 4) );
	$proact_years = ($proact_start_year == $proact_end_year ? $proact_start_year : "$proact_start_year &ndash; $proact_end_year" );
	
	$proact_output .= ' <div class="cvlisting">' . "\n";
	$proact_output .= '   <div class="date">'. $proact_years .'</div>' . "\n";
	$proact_output .= '   <div class="title">'. $proact_node->field_description_value;

	if ( $adminAble ) {	// Allow owner OR admin to edit this entry
		$proact_output .= '<a href="'. base_path() .'node/'. $proact_node->nid .'/edit"> <img src="'. base_path() .'sites/all/themes/ses_main/images/edit_btn.png" alt="" /></a>';
	}

	$proact_output .= '</div>' . "\n";
	$proact_output .= ' </div>' . "\n";

}

$proact_output  .= '</div>' . "\n\n";

if ($proact_index != 0) : print $proact_output;
else : ?>
	<div class="cvlisting"><div class="title"><span class="small"><strong>There are no entries for Professional Activities</strong></span></div></div>
<? endif; ?>

<? if ($proact_index > 4) : ?><p><a href="#" class="toggle_cv_data" rel="professional activities">Expand professional activities</a> <span class="row-count">(<?= $proact_index ?> entries)</span></p><? endif; ?>


<h4 class="for-profile">Courses Taught</h4>	
<? // Allow owner OR admin to ADD entry 'node/add/courses-taught' ?>
<? if ($adminAble) : ?><a class="create-entry" href="<?= base_path() ?>node/add/courses-taught">Create a new entry for Courses Taught</a><? endif; ?>
<?
$courses_output  = '<div class="expandable_data" rel="cv_courses taught">' . "\n";
$courses_result = db_query("SELECT * FROM node, content_type_courses_taught, content_field_year WHERE node.uid='$node->uid' AND node.type='courses_taught' AND node.nid=content_type_courses_taught.nid AND node.nid= content_field_year.nid ORDER BY content_field_year.field_year_value DESC;");	
$courses_index = 0;

while ($courses_node = db_fetch_object($courses_result)) {
	$courses_index++;
	$courses_year = substr($courses_node->field_year_value, 0, 4);

	$courses_output .= ' <div class="cvlisting">' . "\n";
	$courses_output .= '   <div class="date">'. $courses_year .' ('. $courses_node->field_quarter_value .')</div>' . "\n";
	$courses_output .= '   <div class="title"><span class="small">'. $courses_node->field_course_number_value .'</span><br /> '. $courses_node->field_course_title_value . ' [Enrolled '. $courses_node->field_enrolled_value .']';

	if ( $adminAble ) {	// Allow owner OR admin to edit this entry
		$courses_output .= '<a href="'. base_path() .'node/'. $courses_node->nid .'/edit"> <img src="'. base_path() .'sites/all/themes/ses_main/images/edit_btn.png" alt="" /></a>';
	}

	$courses_output .= '</div>' . "\n";
	$courses_output .= ' </div>' . "\n";

}

$courses_output  .= '</div>' . "\n\n";

if ($courses_index != 0) : print $courses_output;
else : ?>
	<div class="cvlisting"><div class="title"><span class="small"><strong>There are no entries for Courses Taught</strong></span></div></div>
<? endif; ?>

<? if ($courses_index > 4) : ?><p><a href="#" class="toggle_cv_data" rel="courses taught">Expand courses taught</a> <span class="row-count">(<?= $courses_index ?> entries)</span></p><? endif; ?>





<h4 class="for-profile">Publications</h4>
<? // Allow owner OR admin to ADD entry 'node/add/publications' ?>
<? if ($adminAble) : ?><a class="create-entry" href="<?= base_path() ?>node/add/publication">Create a new entry for Publications</a><? endif; ?>
<?
$pubs_output  = '<div class="expandable_data" rel="cv_publications">' . "\n";
$pubs_result = db_query("SELECT * FROM node, content_type_publication, content_field_citation, content_field_peer_reviewed, content_field_publication_status,  content_field_url, content_field_year WHERE node.type='publication' AND node.uid='$node->uid' AND node.nid=content_type_publication.nid  AND node.nid= content_field_citation.nid AND node.nid= content_field_peer_reviewed.nid  AND node.nid= content_field_publication_status.nid  AND node.nid=content_field_url.nid  AND node.nid=content_field_year.nid  ORDER BY content_field_year.field_year_value DESC;");
$pubs_index = 0;
while ($pubs_node = db_fetch_object($pubs_result)) {
	$pubs_index++;
	
	# If publication does not have a date, append the status
	if ( $pubs_node->field_year_value == '' ) { $year = $pubs_node->field_publication_status_value; }
	else { $year = substr($pubs_node->field_year_value, 0, 4); }
	
	# Append a '*' to peer reviewed publications
	$year .= ($pubs_node->field_peer_reviewed_value == 'Yes' ? '<sup>*</sup>' : '');

	# Check to see if there are associated files or links, and create a link
	# if true query the table to find the file location
	
	if (isset($pubs_node->field_url_url)) { $title = '<a href="'. $pubs_node->field_url_url .'" target="_blank">'. $pubs_node->title .'</a>'; } 
	else if (isset($pubs_node->field_file_fid)) { 
		$result_file = db_query("SELECT * FROM files  WHERE files.fid='$pubs_node->field_file_fid'");	
		$node_file = db_fetch_object($result_file);
		$title = '<a href="'. base_path() . $node_file->filepath .'" target="_blank">'. $pubs_node->field_citation_value .'</a>'; 
	} 
	else { $title = $pubs_node->title; }

	$pubs_output .= '<div class="cvlisting">' . "\n";
	$pubs_output .= '	 <div class="date">'. $year .'</div>' . "\n";
	$pubs_output .= '	 <div class="title">'. $title;

	if ( $adminAble ) {	// Allow owner OR admin to edit this entry
		$pubs_output .= '<a href="'. base_path() .'node/'. $pubs_node->nid .'/edit"> <img src="'. base_path() .'sites/all/themes/ses_main/images/edit_btn.png" alt="" /></a>';
	} 

	$pubs_output .= '</div>' . "\n";
	$pubs_output .= '</div>' . "\n";

}

$pubs_output  .= '</div>' . "\n\n";

if ($pubs_index != 0) : print $pubs_output;
else : ?>
	<div class="cvlisting"><div class="title"><span class="small"><strong>There are no entries for Publications</strong></span></div></div>
<? endif; ?>

<? if ($pubs_index > 4) : ?><p><a href="#" class="toggle_cv_data" rel="publications">Expand publications</a> <span class="row-count">(<?= $pubs_index ?> entries)</span></p><? endif; ?>

	







<h4 class="for-profile">Advisees Receiving Degrees</h4>	
<? // Allow owner OR admin to ADD entry 'node/add/advisee-degrees' ?>
<? if ($adminAble) : ?><a class="create-entry" href="<?= base_path() ?>node/add/advisee-degrees">Create a new entry for Advisees Receiving Degrees</a><? endif; ?>
<?
$advisee_output  = '<div class="expandable_data" rel="cv_receiving degrees">' . "\n";
$advisee_result = db_query("SELECT * FROM node, content_type_advisee_degrees, content_field_degree, content_field_year WHERE node.uid='$node->uid' AND node.type='advisee_degrees' AND node.nid=content_type_advisee_degrees.nid AND node.nid= content_field_degree.nid AND node.nid= content_field_year.nid ORDER BY content_field_year.field_year_value DESC;");	
$advisee_index = 0;

while ($advisee_node = db_fetch_object($advisee_result)) {
	$advisee_index++;
	$courses_year = substr($advisee_node->field_year_value, 0, 4);

	$advisee_output .= ' <div class="cvlisting">' . "\n";
	$advisee_output .= '   <div class="date">'. $courses_year .'</div>' . "\n";
	$advisee_output .= '   <div class="title">'. $advisee_node->field_name_value .', '. $advisee_node->field_degree_value .'<br /> '. $advisee_node->field_place_of_employment_value .' ('. $advisee_node->field_employment_sector_value .')';

	if ( $adminAble ) {	// Allow owner OR admin to edit this entry
		$advisee_output .= '<a href="'. base_path() .'node/'. $advisee_node->nid .'/edit"> <img src="'. base_path() .'sites/all/themes/ses_main/images/edit_btn.png" alt="" /></a>';
	}

	$advisee_output .= '</div>' . "\n";
	$advisee_output .= ' </div>' . "\n";

}

$advisee_output  .= '</div>' . "\n\n";

if ($advisee_index != 0) : print $advisee_output;
else : ?>
	<div class="cvlisting"><div class="title"><span class="small"><strong>There are no entries for Advisees Receiving Degrees</strong></span></div></div>
<? endif; ?>

<? if ($advisee_index > 4) : ?><p><a href="#" class="toggle_cv_data" rel="receiving degrees">Expand receiving degrees</a> <span class="row-count">(<?= $advisee_index ?> entries)</span></p><? endif; ?>




<h4 class="for-profile">Advisee Publications</h4>	
<? // Allow owner OR admin to ADD entry 'node/add/advisee-publications' ?>
<? if ($adminAble) : ?><a class="create-entry" href="<?= base_path() ?>node/add/advisee-publications">Create a new entry for Advisees Publications</a><? endif; ?>
<?
$adviseepub_output  = '<div class="expandable_data" rel="cv_advisee publications">' . "\n";
$adviseepub_result = db_query("SELECT * FROM node, content_type_advisee_publications, content_field_citation, content_field_peer_reviewed, content_field_publication_status, content_field_year WHERE node.type='advisee_publications' AND node.uid='$node->uid' AND node.nid=content_field_year.nid AND node.nid=content_type_advisee_publications.nid AND node.nid=content_field_citation.nid AND node.nid=content_field_peer_reviewed.nid AND node.nid=content_field_publication_status.nid");	
$adviseepub_index = 0;

while ($adviseepub_node = db_fetch_object($adviseepub_result)) {
	$adviseepub_index++;
	$courses_year = substr($adviseepub_node->field_year_value, 0, 4);

	$adviseepub_output .= ' <div class="cvlisting">' . "\n";
	$adviseepub_output .= '   <div class="date">'. $courses_year .'</div>' . "\n";
	$adviseepub_output .= '   <div class="title">'. $adviseepub_node->field_citation_value;

	if ( $adminAble ) {	// Allow owner OR admin to edit this entry
		$adviseepub_output .= '<a href="'. base_path() .'node/'. $adviseepub_node->nid .'/edit"> <img src="'. base_path() .'sites/all/themes/ses_main/images/edit_btn.png" alt="" /></a>';
	}

	$adviseepub_output .= '</div>' . "\n";
	$adviseepub_output .= ' </div>' . "\n";

}

$adviseepub_output  .= '</div>' . "\n\n";

if ($adviseepub_index != 0) : print $adviseepub_output;
else : ?>
	<div class="cvlisting"><div class="title"><span class="small"><strong>There are no entries for Advisee Publications</strong></span></div></div>
<? endif; ?>

<? if ($adviseepub_index > 4) : ?><p><a href="#" class="toggle_cv_data" rel="advisee publications">Expand advisee publications</a> <span class="row-count">(<?= $adviseepub_index ?> entries)</span></p><? endif; ?>



