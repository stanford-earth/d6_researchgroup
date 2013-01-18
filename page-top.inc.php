<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8" />
<title><?= $head_title ?> | Stanford University</title>
<meta name="robots" content="all" />
<meta name="description" content="Stanford Earth scientists work to gain a better understanding of our planet's history and future, energy and resources, geologic hazards, and changing climate. " />
<meta name="keywords" content="Stanford University, Earth Sciecnes, land use, geoscience, carbon sequestration, climate change, subsurface flow processes, earthquake, sustainability, nutrient cycles" />
<?= $head ?>
<?= $styles ?>


<!--[if lt IE 8]><link type="text/css" rel="stylesheet" href="<?= base_path() ?>sites/all/themes/ses_main/stylesheets/ie.css" media="all" /><![endif]-->
</head>
	<? $pathalias = explode('/', drupal_get_path_alias($_GET['q']));?>
	<? if ($pathalias[0] == 'search') : $search_id_tag = 'id="search"'; ?><? endif; ?>
  <body <?= drupal_attributes($attr) ?> <?= $search_id_tag ?>>
	<p class="skip-to-content"><a href="#maincontent" accesskey="1">Skip to main content</a></p>
	<p class="skip-to-content"><a href="#navigation" accesskey="2">Skip to navigation</a></p>
	<? include 'globalnav.php'; ?>
  
  <div id="page-header">
	<?
		$logoType = ($logo) ? 'image' : 'text';
		
		if ($logo) {
			$html = '<img src="'. $logo. '" alt="School of Earth Sciences" />'; 
		} else {
			$html = '<span class="affiliation univ">Stanford University</span><span class="name">' . variable_get('site_name', 'Research Group') . '</span><span class="affiliation school">School of Earth Sciences</span>';
		}
		?>

		<div id="branding" class="<? echo $logoType ?>"><a href="<?= $front_page ?>"><? echo $html ?></a></div>      
  </div><!-- end header -->

  <div id="container">
				<div id="navigation">  
			<? if (isset($primary_links)) : ?>
			<?= theme('links', $primary_links, array('class' => 'ses_nav primary-links')) ?>
			<? endif; ?>
		
			<div id="search-box">
				<form action="<?= base_path() ?>search/node"  accept-charset="UTF-8" method="post" id="search" class="search-form">
					<div>
					<input type="text" maxlength="255" name="keys" id="query" size="40" value="Enter your search keywords here..." class="form-text" />
					<input type="submit" name="op" id="edit-submit" value="" class="btn" />
					</div>
				</form>
			</div>              
		</div>
	
    <div id="page"> 
		<? if ( !$is_front) : ?>
			<? if ( !isset($search_id_tag) ) : ?>

	    <div id="breadcrumb">
				<?= $breadcrumb ?><? if ($title != "") : ?>&raquo; <?= $title ?><? endif; ?>
	    </div>
	    
	    <div id="subpage-navigation">
				<?= $left ?>
				<? if (isset($alumni_links)) : print $alumni_links; endif; ?>					
				<? if (isset($faculty_staff_links)) : print $faculty_staff_links; endif; ?>
				<? if (isset($current_student_links)) : print $current_student_links; endif; ?>
				<? if (isset($prospective_student_links)) : print $prospective_student_links; endif; ?>
				<? if (!isset($admin)) : print $admin; endif; ?>

				<? if ($pathalias[0] == 'alumni') : ?>
	
				<br /><img src="<?= base_path() . $directory ?>/images/stayconnected.png" alt="" />
				<ul class="stay-connected">
					<li>Attend an earth sciences <a href="events">event</a>, find an event on <a href="http://events.stanford.edu/" target="_blank">campus</a>, or in your <a href="https://alumni.stanford.edu/get/page/regions/landing" target="_blank">local</a> area.</a></li>
					<!-- <li><a href="#">Submit</a> a class note &ndash; we'd love to hear your news!</a></li> -->
					<li>Ensure your <a href="https://alumni.stanford.edu/get/page/login?pg=yes&nu=https:**alumni.stanford.edu/get/page/my-account/profile" target="_blank">directory listing</a> is up to date</li>
				</ul>

				<div style="width: 168px; height: 130px; padding: 10px; background-image: url(<?= base_path() . $directory ?>/images/bubble.png); background-repeat: no-repeat;">
					<h3>Have you moved?</h3>
					<p>Update your information by contacting Associate Director of Development <a title="Mona Tekchandani" href="people/staff/mona-tekchandani">Mona Tekchandani</a>.</p>
				</div>

				<? endif; //$alumni ?>	    		
								
		    </div>
			<? endif; ?>
		<? endif; //$is_front ?>	    

		<a class="skip-to-content" id="maincontent"></a> 
