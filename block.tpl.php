<div id="block-<?= $block->module .'-'. $block->delta; ?>" class="clear-block block block-<?= $block->module ?> <?php print block_class($block); ?>">
	 <? if (
	 (in_array('webeditor', array_values($user->roles)) || in_array('webmaster', array_values($user->roles))) &&
	 $block->module != 'menu' &&
	 $block->module != 'menu_block' &&
	 $block->module != 'views'
	 ) : ?>
	 <a href="<?= base_path() ?>admin/build/block/configure/block/<?= $block->delta; ?>?destination=<?= get_path(); ?>" class="edit-entry-tab">Edit block</a>
	 <? endif; ?>
	<div class="content">
		<div class="hd">
			<? if (!empty($block->subject)): ?>
			<h2><?= $block->subject ?></h2>
			<? endif;?>
		</div>
		<div class="bd">
			<?= $block->content ?>
		</div>
	</div>
</div>
