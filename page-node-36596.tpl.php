<? include 'page-top.inc.php' ?>
<? /* Search Results */ ?>
<? $last_name = $_GET['last_name'];?>

    <div id="main-content">
		<h3>Personnel Search Results</h3>
			<?= views_embed_view('Search', 'page_1') ?>
			<?php
			$viewName = "Search";
			$view = views_get_view($viewName);
			//echo "<pre>" . print_r($view, true) . "</pre>";
			?>
	  </div>  
  </div>  
	</div>			
 </div><!-- end container -->

<? include 'page-footer.inc.php' ?>



