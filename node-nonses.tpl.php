<?
// Convert ACRNM to full department name
$department = trim(strtolower($field_primary_affiliations[0]['value']));
switch ($department) {
	
	case 'dean\'s office': $primary_affiliations = 'Dean\'s Office'; break;
	case 'ges': $primary_affiliations = '<a href="http://ges.stanford.edu/">Department of Geological & Environmental Sciences</a>'; break;
	case 'geophysics': $primary_affiliations = '<a href="http://geophysics.stanford.edu/">Department of Geophysics</a>'; break;
	case 'ere': $primary_affiliations = '<a href="http://ere.stanford.edu/">Department of Energy Resources Engineering</a>'; break;
	case 'eess': $primary_affiliations = '<a href="http://eess.stanford.edu/">Department of Environmental Earth System Science</a>'; break;
	case 'esys': $primary_affiliations = '<a href="http://earthsystems.stanford.edu/">Earth Systems Program</a>'; break;
	case 'eees': $primary_affiliations = '<a href="http://eess.stanford.edu/">Earth, Energy, and Environmental Sciences</a>'; break;
	case 'e-iper': $primary_affiliations = '<a href="http://e-iper.stanford.edu/">Emmett Interdisciplinary Program in Environment & Resources</a>'; break; 
}

?>

<? if ( !$teaser ) { ?>

<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
   <ul class="profile-tabs">
			<li><a id="profile" href="#profile_content">Profile</a></li>
			<li><a id="cv" href="#cv_content">Curriculum Vitae</a></li>
			<!-- <li><a id="news-and-media" href="#newsandmedia_content">Related News</a></li> -->
    </ul>

		<div class="profile-vcard"><div>
			<div class="photo"><a href="people.faculty.profile.php"><?= isset($field_ses_headshot[0]['value']) ? $field_ses_headshot[0]['value'] : $field_photo[0]['view'] ?></a></div>
			<div class="description">
			
				<table>
					<tr><td>Title:</td><td><?= $field_title[0]['view'] ?></td></tr>
					<tr><td>Primary Affiliation:</td><td><?= $primary_affiliations ?></td></tr>
					<!-- secondary_affiliations -->
					<? if ($field_secondary_affiliations[0]['value'] || $field_secondary_affiliations[1]['value'] || $field_secondary_affiliations[2]['value'] || $field_secondary_affiliations[3]['value'] || $field_secondary_affiliations[4]['value'] || $field_secondary_affiliations[5]['value']) {
					
					print '<tr><td>Other Affiliations:</td><td>';
					
					for ($i = 0; $i < count($field_secondary_affiliations); $i++) {
						
						if ($i != count($field_secondary_affiliations)-1 ) {print $field_secondary_affiliations[$i]['value'] . ', '; }
						else { print $field_secondary_affiliations[$i]['value']; }
					}
					
					if ($field_other_affiliations[0]['value']) { print ', '. $field_other_affiliations[0]['value']; }

					print '</td></tr>'; 
					
					}
					
					?>
									
					
					<tr><td>Office Location:</td><td><?= $field_office_location[0]['value'] ?></td></tr>
					<? if ($field_researchgroup[0]['view']) { print '<tr><td>Research Group:</td><td>'. $field_researchgroup[0]['view'] . '</td></tr>'; } ?>
					<? if ($field_lab[0]['view']) { print '<tr><td>Research Lab:</td><td>'. $field_lab[0]['view'] . '</td></tr>'; } ?>
					<? if ($field_personal_url[0]['view']) { print '<tr><td>Alternative Website:</td><td>'. $field_personal_url[0]['view'] . '</td></tr>'; } ?>
										
					<? if ($field_phone[0]['view']) { print '<tr><td>Phone:</td><td>'. $field_phone[0]['view'] . '</td></tr>'; } ?>
					<? if ($field_fax[0]['view']) { print '<tr><td>Fax:</td><td>'. $field_fax[0]['view'] . '</td></tr>'; } ?>
					<? if ($field_stanford_email[0]['view']) { print '<tr><td>E-mail:</td><td>'. $field_stanford_email[0]['view'] . '</td></tr>'; } ?>


				</table>
		
			</div><!-- end #description -->
		</div></div><!-- end #profile-vcard -->
		<br />

    
    <div class="tab_container">
			<div id="profile_content" class="tab_content">
				<? include 'node-profile.profile_tab.tpl.php' ?>
			</div>

      <div id="cv_content" class="tab_content">
				<? include 'node-profile.cv_tab.tpl.php' ?>				
      </div>

      <div id="newsandmedia_content" class="tab_content">
				<? include 'node-profile.news_tab.tpl.php' ?>				
      </div>
  </div>
</div><!-- end #node -->

<? } else { include 'node-nonses-teaser.tpl.php'; } ?>

