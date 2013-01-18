<div id="globalnav">
	<div id="linksbar">
		<div id="stanford-home"><a href="http://stanford.edu" title="Stanford University Homepage"></a></div>
    <? if (!$user->uid) : ?>			
    <a class="sunet" href="<?= base_path() ?>webauth/login?destination=<?= get_path(); ?>">Login with your SUNet ID</a> |
    <? else : ?>
    <a class="sunet" href="<?= base_path() ?>people"><?= $user->name ?></a> | <a class="sunet" href="<?= base_path() .'logout' ?>">Logout</a> |
    <? endif; ?>
    <a class="sunet" title="Stanford School of Earth Sciences Homepage" href="http://pangea.stanford.edu/">Stanford Earth Sciences</a>
		<a id="explore-menu" href="#">Explore</a></div>
</div>  
<div id="explore-shelf-pos">
	<div id="explore-shelf">
	<div>
		<h3>Departments &amp; Programs</h3>
		<ul>
			<li><h4><a href="http://pangea.stanford.edu/ERE/">Department of Energy Resources Engineering</a></h4></li>
			<li><h4><a href="http://eess.stanford.edu/">Department of Environmental Earth System Science</a></h4></li>
			<li><h4><a href="http://ges.stanford.edu/">Department of Geological &amp; Environmental Sciences</a></h4></li>
			<li><h4><a href="http://geophysics.stanford.edu/">Department of Geophysics</a></h4></li>
			<li><h4><a href="http://earthsystems.stanford.edu/">Earth Systems Program</a></h4></li>
			<li><h4><a href="http://e-iper.stanford.edu/">Emmett Interdisciplinary Program in Environment &amp; Resources</a></h4></li>
		</ul>
	</div>
	<div>
		<h3>More</h3>
		<ul id="more-links">
			<li><a href="http://pangea.stanford.edu/faculty-research/research-groups">Research Groups</a></li>
			<li><a href="http://pangea.stanford.edu/faculty-research/shared-facilities">Shared Analytical Facilities</a></li>
			<li><a href="http://pangea.stanford.edu/faculty-research/affiliate-programs">Industrial Affiliate Programs</a></li>
			<li><a href="http://pangea.stanford.edu/academics/field-programs">Field Programs</a></li>
			<li><a href="http://pangea.stanford.edu/academics/outreach-programs">Outreach Programs</a></li>
		</ul>
	</div>
	</div>
</div>

