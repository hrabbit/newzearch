<h2>Viewing #<?php echo $server->id; ?></h2>

<p>
	<strong>Hostname:</strong>
	<?php echo $server->hostname; ?></p>
<p>
	<strong>Port:</strong>
	<?php echo $server->port; ?></p>
<p>
	<strong>Ssl:</strong>
	<?php echo $server->ssl; ?></p>
<p>
	<strong>Username:</strong>
	<?php echo $server->username; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $server->password; ?></p>
<p>
	<strong>Active:</strong>
	<?php echo $server->active; ?></p>

<?php echo Html::anchor('admin/server/edit/'.$server->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/server', 'Back'); ?>