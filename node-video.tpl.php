<? if ( !$teaser ) { ?>

<div id="media">

				<!-- gallery -->      
				<div id="video">
				
                <embed
                    src='http://gemcenter.stanford.edu/player.swf'
                    width='475'
                    height='312'
                    bgcolor='undefined'
                    allowscriptaccess='always'
                    allowfullscreen='true'
                    flashvars='file=E-IPER_edit_2-8-10_1.flv&streamer=rtmp://sv-stream.stanford.edu/earthsci'
                />                    	         	


				</div>         
				<!-- /gallery -->             

	<div id="tools">

		<?
			$fullnode = node_load($node->nid);
			print check_markup($fullnode->body, $fullnode->format, FALSE);
		?>

		
		<div id="social">

			<!-- AddThis Button BEGIN -->
			<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4c804db57a4b93f5"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4c804db57a4b93f5"></script>
			<!-- AddThis Button END -->					
		</div>
		
	</div>
</div><!-- end #media -->

<hr /><br />
<ul class="inline">
	<li><a href="<?= base_path() . 'news/gallery' ?>"> &laquo; View all media galleries</a></li>

	<? if (in_array('webmaster', array_values($user->roles))) : ?>
		<li>|</li>
		<li><a href="<?= base_path() . '/node/'. $node->nid .'/edit' ?>">Edit this gallery (<?= $title ?>) &raquo;</a></li>
	<? endif; ?>    

</ul>



<? } else { include 'node-gallery-teaser.tpl.php'; } ?>


