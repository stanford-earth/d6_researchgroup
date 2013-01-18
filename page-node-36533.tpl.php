<? include 'page-top.inc.php' ?>
<? /* Alumni and Friends   */ ?>
    <div id="main-content">

		<div class="content20" id="related-information">    

			<div class="side-content">
					<div class="related">
					  <h6>The 3min Interview</h6>
					  <div class="photo"><a href="alumni/3min/steve-munn-85"><img src="<?= base_path() . $directory ?>/images/alumni_3min.png" alt="STEVE MUNN '85" title="STEVE MUNN '85" /></a></div>
					  <div class="description"><strong>STEVE MUNN '85</strong><br />
					  Steve is the President of JanSport, the gear brand for backpacks, messenger bags, and collegiate apparel. JanSport is the global market leader in the daypack category, and is a domestic leader in the collegiate apparel business. The company is headquartered in San Leandro, CA.
					  <br /><a href="alumni/3min/steve-munn-85">Read more</a></div>
					</div>
			</div>




			<div class="side-content">
				<div class="gift"><span><?= $giving ?></span></div>
			</div>


<!--
			<div class="side-content">
				<div class="related">
					<h6>Facts & Figures</h6>
						<ul id="getting-started">
						<li>There are 4,605 Earth Sciences alums living world wide </li>
						<li>12% of our alumni live outside the U.S.A. </li>
						<li>20% of all alumni live in the Bay Area; </li>
						<li>and 55% live elsewhere in the U.S.A. with concentrations in Colorado and Texas </li>

					</ul> 				
					<ol><br /><a href="about/facts-figures">View more</a></ol>
				</div>
			</div>
-->



			<div class="side-content-blank"></div>
				
		</div><!-- end #related-information -->

			<?= views_embed_view('feature_stories', 'block_2') ?>
			
			<h3>Alumni Events</h3>
			<?= views_embed_view('alumni_events', 'block_1') ?>

			<div class="resources">
				<?= $alumni_resources ?>
			</div>
			
			<div class="resources">			
				<?= $alumni_publications ?>
			</div>
			

	  </div>  
  </div>  
	</div>			
 </div><!-- end container -->

<? include 'page-footer.inc.php' ?>



