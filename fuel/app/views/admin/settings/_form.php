<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Key', 'key', array('class'=>'control-label')); ?>

				<?php echo Form::input('key', Input::post('key', isset($setting) ? $setting->key : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Key')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Value', 'value', array('class'=>'control-label')); ?>

				<?php echo Form::input('value', Input::post('value', isset($setting) ? $setting->value : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Value')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>