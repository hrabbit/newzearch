<h2>Editing Server</h2>
<br>

<?php echo render('admin/server/_form'); ?>
<p>
	<?php echo Html::anchor('admin/server/view/'.$server->id, 'View'); ?> |
	<?php echo Html::anchor('admin/server', 'Back'); ?></p>
