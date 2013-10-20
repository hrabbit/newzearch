<h2>Listing Settings</h2>
<br>
<?php if ($settings): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Key</th>
			<th>Value</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($settings as $item): ?>		<tr>

			<td><?php echo $item->key; ?></td>
			<td><?php echo $item->value; ?></td>
			<td>
				<?php echo Html::anchor('admin/settings/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/settings/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/settings/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Settings.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/settings/create', 'Add new Setting', array('class' => 'btn btn-success')); ?>

</p>
