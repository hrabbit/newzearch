<h2>Listing Groups</h2>
<br>
<?php if ($groups): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Server id</th>
			<th>Name</th>
			<th>Current article</th>
			<th>Active</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($groups as $item): ?>		<tr>

			<td><?php echo $item->server_id; ?></td>
			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->current_article; ?></td>
			<td><?php echo $item->active; ?></td>
			<td>
				<?php echo Html::anchor('admin/group/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/group/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/group/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Groups.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/group/create', 'Add new Group', array('class' => 'btn btn-success')); ?>

</p>
