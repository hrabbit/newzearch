<h2>Viewing #<?php echo $group->id; ?></h2>

<p>
	<strong>Server id:</strong>
	<?php echo $group->server_id; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $group->name; ?></p>
<p>
	<strong>Current article:</strong>
	<?php echo $group->current_article; ?></p>
<p>
	<strong>Active:</strong>
	<?php echo $group->active; ?></p>

<?php echo Html::anchor('admin/group/edit/'.$group->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/group', 'Back'); ?>