<h2>Viewing #<?php echo $setting->id; ?></h2>

<p>
	<strong>Key:</strong>
	<?php echo $setting->key; ?></p>
<p>
	<strong>Value:</strong>
	<?php echo $setting->value; ?></p>

<?php echo Html::anchor('admin/settings/edit/'.$setting->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/settings', 'Back'); ?>