	<div id="footer">
	<div id="school-address">
		<?= $footer ?>
		
		</div>
		
		<div id="resources">
			<h4>Related Resources</h4>
			<ul>
				<li><a href="http://pangea.stanford.edu/resources/hartley">Hartley Conference Center</a></li>
				<li><a href="http://pangea.stanford.edu/resources/health-safety"> Health and Safety</a></li>
				<li><a href="http://pangea.stanford.edu/computing/">Computers Resources</a></li>
				<li><a href="http://pangea.stanford.edu/resources/health-safety">Room Resources</a></li>	
			</ul>
		</div>
	
		<div id="helpful-links">
			<h4>How Can We Help?</h4>
			<ul>
				<li><a href="http://pangea.stanford.edu/about/maps-directions" target="_blank"  rel="nofollow">Maps & Directions</a></li>
				<li><a href="http://stanfordwho.stanford.edu/SWApp" target="_blank" rel="nofollow">StanfordWho</a></li>
				<li><a href="http://studentaffairs.stanford.edu/registrar" target="_blank"  rel="nofollow">Office of the Registrar</a></li>
				<li><a href="http://pangea.stanford.edu/about/contact">Contact Us</a></li>
			</ul>
		</div>
		
		<div>
			<h4>Connect to Earth Sciences</h4>
			<div id="social-links">
				<a href="http://www.facebook.com/pages/Stanford-School-of-Earth-Sciences/60350681195" id="facebook"><img src="<?= base_path() . $directory ?>/images/facebook_btn.png" alt="" /> <p>Facebook</p></a>
				<a href="http://itunes.stanford.edu/" id="itunes"><img src="<?= base_path() . $directory ?>/images/itunes_btn.png" alt="" /> <p>iTunes U</p></a><br />
				<a href="http://twitter.com/stanford" id="twitter"><img src="<?= base_path() . $directory ?>/images/twitter_btn.png" alt="" /> <p>Twitter</p></a>
				<a href="http://www.youtube.com/stanford" id="youtube"><img src="<?= base_path() . $directory ?>/images/youtube_btn.png" alt="" /> <p>YouTube</p></a>
			</div>
		</div>
	</div><!-- end footer -->

	<?= $scripts ?>	
	<?= $closure ?>

</body>
</html>
