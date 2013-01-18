<?
// Convert ACRNM to full department name
$department = trim(strtolower($field_primary_affiliations[0]['value']));
switch ($department) {
	case 'ges': $primary_affiliations = 'Department of Geological & Environmental Sciences'; break;
	case 'geophysics': $primary_affiliations = 'Department of Geophysics'; break;
	case 'ere': $primary_affiliations = 'Department of Energy Resources Engineering'; break;
	case 'eess': $primary_affiliations = 'Department of Environmental Earth System Science'; break;
	case 'esys': $primary_affiliations = 'Earth Systems Program'; break;
	case 'eees': $primary_affiliations = 'Earth, Energy, and Environmental Sciences'; break;
	case 'e-iper': $primary_affiliations = 'Emmett Interdisciplinary Program in Environment & Resources'; break; 
}

?>


<div id="node-<?php print $node->nid; ?>" class="article<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<div class="media-block">
	  <div class="photo img"><a href="<?= $node_url ?>"><?= isset($field_ses_thumbnail[0]['value']) ? $field_ses_thumbnail[0]['value'] : $field_photo[0]['view'] ?></a></div>
	  <div class="description bd">
	    <h4><a href="<?= $node_url ?>" title="<?= $title ?>"><?= $title ?>, 
	    		<span><?php print $node->field_title[0]['view'] ?></span></a></h4>
	    <p><cite><strong><?= $primary_affiliations ?></strong></cite></p>
	    <p><?= $field_short_description[0]['view'] ?></p>
			<br />
	  </div>          
	</div>
</div>
