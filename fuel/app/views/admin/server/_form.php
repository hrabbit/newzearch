<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Hostname', 'hostname', array('class'=>'control-label')); ?>

				<?php echo Form::input('hostname', Input::post('hostname', isset($server) ? $server->hostname : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Hostname')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Port', 'port', array('class'=>'control-label')); ?>

				<?php echo Form::input('port', Input::post('port', isset($server) ? $server->port : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Port')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Ssl', 'ssl', array('class'=>'control-label')); ?>

				<?php echo Form::input('ssl', Input::post('ssl', isset($server) ? $server->ssl : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ssl')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($server) ? $server->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($server) ? $server->password : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Active', 'active', array('class'=>'control-label')); ?>

				<?php echo Form::input('active', Input::post('active', isset($server) ? $server->active : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Active')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>