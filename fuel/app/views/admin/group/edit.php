<h2>Editing Group</h2>
<br>

<?php echo render('admin/group/_form'); ?>
<p>
	<?php echo Html::anchor('admin/group/view/'.$group->id, 'View'); ?> |
	<?php echo Html::anchor('admin/group', 'Back'); ?></p>
