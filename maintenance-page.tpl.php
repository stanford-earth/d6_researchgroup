<?
/**
 * @file
 * Displays a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   element.
 * - $head: Markup for the HEAD element (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the
 *   current path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled in
 *   theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been
 *   disabled in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been
 *   disabled.
 * - $primary_links (array): An array containing primary navigation links for
 *   the site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links
 *   for the site, if they have been configured.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $content: The main content of the current Drupal page.
 * - $right: The HTML for the right sidebar.
 * - $node: The node object, if there is an automatically-loaded node associated
 *   with the page, and the node ID is the second argument in the page's path
 *   (e.g. node/12345 and node/12345/revisions, but not comment/reply/12345).
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic
 *   content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $language->language ?>" lang="<?= $language->language ?>" dir="<?= $language->dir ?>">
<head>
	<title><?= $head_title ?></title>
	<?= $head ?>
	<?= $styles ?>
	<!--[if lt IE 8]><link type="text/css" rel="stylesheet" href="/ses/sites/all/themes/ses_main/stylesheets/ie.css" media="all" /><![endif]-->
	<?= $scripts ?>
	
</head>
  <body <?= drupal_attributes($attr) ?>>
	<? include 'globalnav.php'; ?>
  
  <div id="page-header">
		<div id="branding"><a href="<?= $front_page ?>"><img src="<?= $logo ?>" alt="School of Earth Sciences" /></a></div>

		<ul id="target-audience">
		  <li><a href="prospective.php">Prospective Students</a></li>
		  <li><a href="students.php">Current Students</a></li>
		  <li><a href="faculty_and_staff.php">Faculty &amp; Staff</a></li>
		  <li><a href="alumni.php">Alumni &amp; Friends</a></li>
		</ul>
		
		<div id="navigation">  
			<? if (isset($primary_links)) : ?>
			<?= theme('links', $primary_links, array('class' => 'ses_nav primary-links')) ?>
			<? endif; ?>
		
			<div id="search-box">
				<form action="/ses/search/node"  accept-charset="UTF-8" method="post" id="search" class="search-form">
					<input type="text" maxlength="255" name="keys" id="query" size="40" value="Enter your search keywords here..." class="form-text" />
					<input type="submit" name="op" id="edit-submit" value="" class="btn" />
				</form>
			</div>              
		</div>      
  </div><!-- end header -->

  <div id="container">
    <div id="page"> 
	    <div id="breadcrumb">
				<?= $breadcrumb ?><? if ($title != "") : ?>&raquo; <?= $title ?><? endif; ?>
	    </div>

	    <div id="subpage-navigation">
				<? if (isset($about_links)) : echo $about_links; endif; ?>
				<? if (isset($people_links)) : print $people_links; endif; ?>
				<? if (isset($academics_links)) : print $academics_links; endif; ?>										
				<? if (isset($research_links)) : print $research_links; endif; ?>
				<? if (isset($news_links)) : print $news_links; endif; ?>			
				<? if (isset($events_links)) : print $events_links; endif; ?>				
				<? if (isset($resources_links)) : print $resources_links; endif; ?>					
				<? if (!isset($admin)) : print $admin; endif; ?>
	    </div>
	
	    <div id="main-content">  

				<? if ($title != "Public bookings") : ?>
				<?= $tabs ?>	
				<? endif; ?>		  
	      <h3><?= $title ?></h3>

<? $pathalias = explode('/', drupal_get_path_alias($_GET['q']));?>

<?

switch ($pathalias[0]) {
    case 'news':
    		if ($pathalias[1] == 'features') { $addItem = '<div id="add-item"><a href="/ses/node/add/'. $pathalias[1] .'">Add Featured Story</a></div>'; }
    		if ($pathalias[1] == 'clips') { $addItem = '<div id="add-item"><a href="/ses/node/add/news">Add News Clip</a></div>'; }
    		if ($pathalias[1] == 'blogs') { $addItem = '<div id="add-item"><a href="/ses/node/add/'. $pathalias[1] .'">Add Blog Entry</a></div>'; }
    		if ($pathalias[1] == 'honors-awards') { $addItem = '<div id="add-item"><a href="/ses/node/add/award">Add Honors &amp; Awards</a></div>'; }
    		if ($pathalias[1] == 'press-releases') { $addItem = '<div id="add-item"><a href="/ses/node/add/'. $pathalias[1] .'">Add Press Release</a></div>'; }
        break;
    case 'resources':
        $addItem = '<div id="add-item"><a href="/ses/node/add/'. $pathalias .'">Add Resource</a></div>';
        break;
    case 'events':
        $addItem = '<div id="add-item"><a href="/ses/node/add/'. $pathalias .'">Add an Event</a></div>';
        break;
}


?>


				<? if (in_array('webmaster', array_values($user->roles))) : ?>
					<?= $addItem ?>
				<? endif; ?>    
	      
	      <?php if ($show_messages && $messages): print '<div class="flash">'.$messages.'</div>'; endif; ?>

        <?php print $help; ?>
	      
				<?= $content ?>	
			
	    </div>  
		</div>
	  
  </div><!-- end container -->

	<div id="footer">

		<div id="school-address">
			<h4>Stanford University<br />School of Earth Sciences</h4>
			<ul>
	
				<li>397 Panama Mall, CA 94305-2210 Mitchell Building 101<br />Tel: (650) 723-2300</li>
				<li><a href="#">Maps &amp; Directions</a></li>
			</ul>
		</div>
		
		<div id="resources">
			<h4>Related Resources</h4>
	
			<ul>
				<li><a href="#">Visit the School</a></li>
				<li><a href="#">Applying Online</a></li>
				<li><a href="#">Campus Resources</a></li>
				<li><a href="#">Technical Support</a></li>
			</ul>
		</div>
	
		<div id="helpful-links">
			<h4>How Can We Help?</h4>
			<ul>
				<li><a href="#">Make a Gift</a></li>
				<li><a href="#">Academic Calendar</a></li>
				<li><a href="http://www.stanford.edu/site/terms.html">Terms of Use</a></li>
	
				<li><a href="http://www.stanford.edu/site/copyright.html">Copyright Complaints</a></li>
			</ul>
		</div>
		
		<div>
			<h4>Welcome to Earth Sciences</h4>
			<p>Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. 
				 Ut in nulla enim. Phasellus molestie magna.</p>
		</div>
	

	</div><!-- end footer -->
	
	<!-- google analytics -->
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-XXXXXXXXXXXXX");
		pageTracker._trackPageview();
		} catch(err) {}</script>
	
	<!-- end google analytics -->

	
	<?= $closure ?>
</body>
</html>

  