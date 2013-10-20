<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Server id', 'server_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('server_id', Input::post('server_id', isset($group) ? $group->server_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Server id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($group) ? $group->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Current article', 'current_article', array('class'=>'control-label')); ?>

				<?php echo Form::input('current_article', Input::post('current_article', isset($group) ? $group->current_article : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Current article')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Active', 'active', array('class'=>'control-label')); ?>

				<?php echo Form::input('active', Input::post('active', isset($group) ? $group->active : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Active')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>