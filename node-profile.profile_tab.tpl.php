<!-- begin profile tab content -->
<? if ($field_bio[0]['value']) : ?>
	<!-- Research tab -->
	<h4>Biographical Information</h4>
	<p><?= $field_bio[0]['value'] ?></p>
<? endif; ?>

<? if ($field_research_activities[0]['value']) : ?>
	<!-- Research tab -->
	<h4>Research</h4>
	<p><?= $field_research_activities[0]['value'] ?></p>
<? endif; ?>

<? if ($field_teaching_activities[0]['value']) : ?>
	<h4>Teaching</h4>
	<p><?= $field_teaching_activities[0]['value'] ?></p>
<? endif; ?>

<? if ($field_professional_activities[0]['value']) : ?>
	<h4>Professional Activities</h4>
	<p><?= $field_professional_activities[0]['value'] ?></p>
<? endif; ?>


<?
switch($_SERVER['SERVER_NAME']) {
  case 'pangea.stanford.edu' : $photo_path = '/WWWcms/' . $field_photo[0]['filepath']; break;
  default       : $photo_path = '/WWW/ses/'. $field_photo[0]['filepath'];
}
?>

<?
// Convert ACRNM to full department name
$department = trim(strtolower($field_primary_affiliations[0]['value']));
switch ($department) {
	
	case 'dean\'s office': $primary_affiliations = 'Dean\'s Office'; break;
	case 'ges': $primary_affiliations = 'Department of Geological & Environmental Sciences'; break;
	case 'geophysics': $primary_affiliations = 'Department of Geophysics'; break;
	case 'ere': $primary_affiliations = 'Department of Energy Resources Engineering'; break;
	case 'eess': $primary_affiliations = 'Department of Environmental Earth System Science'; break;
	case 'esys': $primary_affiliations = 'Earth Systems Program'; break;
	case 'eees': $primary_affiliations = 'Earth, Energy, and Environmental Sciences'; break;
	case 'e-iper': $primary_affiliations = 'Emmett Interdisciplinary Program in Environment & Resources'; break; 
}
?>


<? if (in_array('webmaster', array_values($user->roles))) : ?>
  <br /><br />
  <form action="<?= base_path() ?>sites/all/libraries/fpdf/profile2pdf.php?pdf=true"  accept-charset="UTF-8" method="post" id="pdf">
    <input type="hidden" name="name" value='<?= htmlspecialchars($title, ENT_QUOTES) ?>'>
    <input type="hidden" name="photo" value='<?= $photo_path ?>'>
    <input type="hidden" name="title" value='<?= htmlspecialchars($field_title[0]['value'], ENT_QUOTES) ?>'>
    <input type="hidden" name="primary_affiliation" value='<?= $primary_affiliations ?>'>
    <input type="hidden" name="research" value='<?= htmlspecialchars($field_research_activities[0]['value'], ENT_QUOTES) ?>'>
    <input type="hidden" name="teaching" value='<?= htmlspecialchars($field_teaching_activities[0]['value'], ENT_QUOTES) ?>'>
    <input type="hidden" name="professional_activities" value='<?= htmlspecialchars($field_professional_activities[0]['value'], ENT_QUOTES) ?>'>
    <input type="submit" name="createpdf" id="createpdf" value='Save As PDF' class="alt-display-btn" />
  </form>
<? endif; ?>    

