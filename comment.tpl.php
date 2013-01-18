<?
/**
 * @file comment.tpl.php
 * Default theme implementation for comments.
 *
 * Available variables:
	* - $author: Comment author. Can be link or plain text.
	* - $content: Body of the post.
	* - $date: Date and time of posting.
	* - $links: Various operational links.
	* - $new: New comment marker.
	* - $picture: Authors picture.
	* - $signature: Authors signature.
	* - $status: Comment status. Possible values are: comment-unpublished, comment-published or comment-preview.
	* - $submitted: By line with date and time.
	* - $title: Linked title.
 *
 * Each $item in $items contains:
 * - 'view' - the themed view for that item
 *
 * @see template_preprocess_field()
 */

?>

<div class="comment<? print ($comment->new) ? ' comment-new' : ''; print ' '. $status; print ' '. $zebra; ?>">

	<? if ($comment->new) : ?>
	  <span class="new"><img src="<?= base_path() . $directory . '/images/new.png' ?>" alt="New" /></span>
	<? endif; ?>
	
	<div class="comment">
		<div class="user-photo"></div>
		<div class="user-comment">
			<h5><?= $title ?></h5>
			<? if ($submitted): ?><span class="small"><?= $submitted; ?></span><? endif; ?>
		  <?= $content ?>
			<? if ($signature): print $signature; endif; ?>
		</div>
	  
	  <? if ($links): ?><?= $links ?><? endif; ?>
	</div>

</div>
