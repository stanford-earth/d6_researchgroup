<?
// $Id: node.tpl.php,v 1.1.2.24 2008/10/11 21:48:14 andregriffin Exp $
?>
<div id="node-<? print $node->nid; ?>" class="<?= $node->type ?> node<? if ($sticky) { print ' sticky'; } ?><? if (!$status) { print ' node-unpublished'; } ?>">
  <?= $picture ?>

  <? if ($page == 0): ?>
    <h2><a href="<?= $node_url ?>" title="<?= $title ?>"><?= $title ?></a></h2>
  <? endif; ?>
  
  <?
  # Hiding Last modified for now.  Why would we ever want it?
  $submitted = false;
  ?>
  <? if ($submitted): ?>
    <span class="submitted">Last modified: <?= $submitted; ?></span>
  <? endif; ?>

  <? $pathalias = explode('/', drupal_get_path_alias($_GET['q']));?>

<? if (count($field_page_image) > 1 ) { ?>

<!-- article-image gallery -->      
	<div class="article-image">		
		<div id="sesgallery-article" rel="slideshow">
			<div class="belt">
			
			<? for ( $i = 0; $i < count($field_page_image); $i++ ) { ?>
			
				<div class="panel">
				<?= $related_image = ($field_page_image[$i]['view'] != '' ? '<img src="'. base_path() . 'sites/default/files/imagecache/feature_tier3/' . $field_page_image[$i]['filename'] .'" alt="" />' : '' ); ?>	
				<div class="caption"><span><?= substr($field_page_image[$i]['data']['title'], 0,160) ?></span></div>	
				</div>
		
			<? } ?>
			
			</div>

			<div id="gallery-controls">
				<p>Current image <span id="statusA"></span> of <span id="statusC"></span></p>		
				<div>
					<a class="carousel-navLeft" href="javascript:stepcarousel.stepBy('sesgallery-article', -1)"><img src="<?= base_path().$directory ?>/images/prev.gif" alt="previous" /></a>
					<a class="carousel-navRight" href="javascript:stepcarousel.stepBy('sesgallery-article', 1)"><img src="<?= base_path().$directory ?>/images/next.gif" alt="next" /></a>                         
				</div>
			</div>
		
		</div>	

	</div><!-- end #article-image -->   
  
<? } else { ?>  
  
  	<? if ($field_page_image[0]['view']) : ?>
			<div class="article-image">			
				<?= $related_image = ($field_page_image[0]['view'] != '' ? '<img src="'. base_path() . 'sites/default/files/imagecache/feature_tier3/' . $field_page_image[0]['filename'] .'" alt="" />' : '' ); ?>	
				<div class="caption"><span><?= $field_page_image[0]['data']['title'] ?></span></div>
			</div>
		<? endif; ?>

<? } ?>
    
    <? # For some reason, Martin restricted what is output to [body][value].  I've added a list of exceptions here. ?>		
    <? if ($node->type =='webform' || $node->type == 'stanford_event' || $node->type == 'event' || $node->type == 'parent_event' || $node->type == 'simplenews' || $node->type == 'gallery') : ?>
      <?= $content ?>
    <? else : ?>
    		<?= $node->content['body']['#value'] ?>
    <? endif; ?>

 	  <?
	  # hiding links and taxonomy for now.  Not sure if we ever show them.
	  $links = false;
	  $taxonomy = false;
	  ?> 
	  <? if ($links||$taxonomy){ ?>
	    <div class="meta">
	
	      <? if ($links): ?>
	        <div class="links">
	          <?= $links; ?>
	        </div>
	      <? endif; ?>
	
	      <? if ($taxonomy): ?>
	        <div class="terms">
	          <?= $terms ?>
	        </div>
	      <? endif;?>
	
	      <span class="clear"></span>
	
	    </div>
	  <? } ?>

</div>


