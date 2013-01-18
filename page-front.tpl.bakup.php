<? include 'page-top.inc.php' ?>
  <div class="content">          
  <div id="top-content">
		
	<div class="module" id="featured-research">	
		<?= views_embed_view('feature_stories', 'block_1') ?>
	</div><!-- end featured content -->
    
    <div class="content40" id="news-and-events" style="position:relative; z-index: 1">   
		<div class="content20" id="announcements">
			<? /* <a class="rss" href="#"><img src="<?= base_path() . path_to_theme() . '/images/rss.png' ?>" alt="RSS" /></a> */ ?>
			<ul class="news-and-announcements">
			<?= $homepage_news ?>
			</ul><br />
			<p class="clearfix"><a href="<?= base_path() . 'news' ?>">View All News<img src="<?= $directory ?>/images/arrow.png" alt=">" /></a></p>      	            
		</div>
		<div class="content20" id="program-calendar">     
			<?= $homepage_events ?>
			<p class="clearfix"><a href="<?= base_path() . 'events' ?>">View All Events<img src="<?= $directory ?>/images/arrow.png" alt=">" /></a></p>      	
		</div>

		<a href="http://pangea.stanford.edu/deepwaterhorizon/#video"><img src="<?= $directory ?>/images/oil.png"  style="float: right; margin: 10px 5px;" alt="" /></a>

		<div class="clearfix"></div>
		<a id="homepage-banner" href="http://oma.stanford.edu/surge.html"><p>Summer Research in Geosciences and Engineering<br />Application Now Available</p></a>
    </div>
  </div>

	<div class="clearfix"></div><br />
        
  <!-- Step carousel -->
  <div id="stepcarousel-wrapper">

    <div class="stepcarousel-heading">
      <h3>School of Earth Sciences Media Gallery</h3>
<!--
      <ul id="galleryNav">
        <li><a href="#" id="showPhotos" class="active" rel="#photoTab">Photos</a></li>
        <li><a href="#" id="showVideos" rel="#videoTab">Videos</a></li>
      </ul>
-->
    </div>

    <div id="photoTab" class="gallery">
      <div class="stepcarousel-excerpt">
        <p>Browse through photos from research sites around the world.</p>
      </div>
      	<div id="sesgallery-photo" class="stepcarousel" rel="slideshow">
      		<div class="belt">
						<?= $homepage_photos ?>
      		</div>												 																																																															
      	</div>
    
      <!-- gallery navigation buttons -->
      <a class="carousel-navLeft" href="javascript:stepcarousel.stepBy('sesgallery-photo', -3)"><img src="<?= $directory ?>/images/arrow_left.png" alt="Left" /></a>
      <a class="carousel-navRight" href="javascript:stepcarousel.stepBy('sesgallery-photo', 3)"><img src="<?= $directory ?>/images/arrow_right.png" alt="Right" /></a>
      <p class="gallery-link"><a href="<?= base_path() ?>news/gallery/photos">View entire Earth Sciences photo gallery</a></p>
    </div>
    
    <div id="videoTab" class="gallery">

      <div class="stepcarousel-excerpt">
        <p>Browse through videos of lectures and talks by faculty and guest speakers.</p>
      </div>
      	<div id="sesgallery-video" class="stepcarousel" rel="slideshow">
      		<div class="belt">
						<?= $homepage_videos ?>
           </div>
      	</div>
    
      <!-- gallery navigation buttons -->
      <a class="carousel-navLeft" href="javascript:stepcarousel.stepBy('sesgallery-video', -3)"><img src="<?= $directory ?>/images/arrow_left.png" alt="Left" /></a>
      <a class="carousel-navRight" href="javascript:stepcarousel.stepBy('sesgallery-video', 3)"><img src="<?= $directory ?>/images/arrow_right.png" alt="Right" /></a>
      <p class="gallery-link"><a href="<?= base_path() ?>news/gallery/videos">View entire Earth Sciences video gallery</a></p>

    </div>
  </div>

  <!-- End Step carousel -->      

  </div>
  <div class="clearfix"></div>

  <div id="bottom-content">
    <div class="content60" id="featured-projects">
			<?= $homepage_research_profiles ?>
      <p><a class="view-more-link" href="<?= base_path() ?>faculty-research/research-profiles">View all research profiles &raquo;</a></p>					
    </div>

    <div class="content40" id="featured-blogs">
			<?= $homepage_blogs ?>
      <p><a class="view-more-link" href="<?= base_path() ?>news/blogs">View all blogs &raquo;</a></p>
    </div>  
  </div>

  <div class="clearfix"></div>
</div>

</div><!-- end content -->


<div class="clearfix"></div>
</div><!-- end #page -->
</div><!-- end container -->

<? include 'page-footer.inc.php' ?>