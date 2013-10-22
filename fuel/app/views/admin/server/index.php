<h2>Listing Servers</h2>
<br>
<?php if ($servers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Hostname</th>
			<th>Port</th>
			<th>Ssl</th>
			<th>Username</th>
			<th>Password</th>
			<th>Active</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($servers as $item): ?>		<tr>

			<td><?php echo $item->hostname; ?></td>
			<td><?php echo $item->port; ?></td>
			<td><?php echo $item->ssl; ?></td>
			<td><?php echo $item->username; ?></td>
			<td><?php echo $item->password; ?></td>
			<td><?php echo $item->active; ?></td>
			<td>
				<?php echo Html::anchor('admin/server/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/server/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/server/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Servers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/server/create', 'Add new Server', array('class' => 'btn btn-success')); ?>

</p>
