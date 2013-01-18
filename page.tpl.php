<? include 'page-top.inc.php' ?>
<? /* page.tpl.php */ ?>			

		<div id="main-content">  
	
			<? if ($title != "Public bookings") : ?>
			<?= $tabs ?>
			<? endif; ?>		  
		  <h1><?= $title ?></h1>
			
			<?
			
			switch ($pathalias[0]) { //$pathalias is set inside of page-top.inc.php
				case 'about':
					$blockID = '8';
					break;
			    case 'faculty-research':
			        /* $addItem = '<div id="add-item"><a href="'.base_path().'node/add/research-profile">Add Research Profile</a></div>'; */
			        $blockID = '11';
			        break;
			    case 'news':
			    		if ($pathalias[1] == 'features') { $addItem = '<div id="add-item"><a href="'.base_path().'node/add/feature">Add Feature Story</a></div>'; }
			    		if ($pathalias[1] == 'clips') { $addItem = '<div id="add-item"><a href="'.base_path().'node/add/news">Add News Clip</a></div>'; }
			    		if ($pathalias[1] == 'blogs') { $addItem = '<div id="add-item"><a href="'.base_path().'node/add/blog">Add Blog Entry</a></div>'; }
			    		if ($pathalias[1] == 'honors-awards') { $addItem = '<div id="add-item"><a href="'.base_path().'node/add/award">Add Honors &amp; Awards</a></div>'; }
			    		if ($pathalias[1] == 'press-releases') { $addItem = '<div id="add-item"><a href="'.base_path().'node/add/press-release">Add Press Release</a></div>'; }
			    		if ($pathalias[1] == 'gallery') { $addItem = '<div id="add-item"><a href="'.base_path().'node/add/gallery">Add Photo Gallery</a></div>'; }
			        break;
			    case 'events':
			    		if ($node->type != 'parent_event') { $addItem = '<div id="add-item"><a href="'.base_path().'node/add/parent-event">Add an Event</a></div>'; }
			    		else { $addItem = '<div id="add-item"><a href="'.base_path().'node/add/child-event">Add event to series</a></div>'; }
			        break;
			    case 'people':
//			        $addItem = '<div id="add-item"><a href="'.base_path().'node/add/research-profile">Add Research Profile</a></div>';
			        break;
			    case 'academics':
			    	$blockID = '10';
			    default:
			    	$addItem = false;
			    	$blockId = 'defaul';
			}
			
			?>
		
			<? if (in_array('webmaster', array_values($user->roles))) : ?>
				<?//= $addItem ?>
			<? endif; ?>    
		<? if ($right) : ?>			
        <div class="content20" id="related-information">
    
        	<div class="side-content">
        	  <div class="related">
              <?= $right ?>
        	  </div>
        	</div>
        </div><!-- end #related-information -->
      <? endif ?>
		  <? if ($show_messages && $messages): print '<div class="flash">'.$messages.'</div>'; endif; ?>
			<? if ($help) : $help; endif; ?>   	      
			<?= $content ?>	
		
		</div>  
		</div>
	  
  </div><!-- end container -->

<? include 'page-footer.inc.php' ?>
