<?php if(count($articles) || 1 == 1): ?>
<table class="table table-bordered table-striped table-condensed">
<thead>
	<tr>
		<th>Title</th>
		<th>Time</td>
	</tr>
</thead>
</table>
<?=Pagination::instance('mypagination')->first()?> <?=Pagination::instance('mypagination')->previous()?> <?=Pagination::instance('mypagination')->render()?> <?=Pagination::instance('mypagination')->next()?> <?=Pagination::instance('mypagination')->last() ?>
<?php else: ?>
	No articles available
<?php endif ?>

