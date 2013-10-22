<?php

class Model_Nntpserver extends \Model
{
	protected static $_table_name = 'nntpservers';

	protected static $_properties = array(
		'id',
		'hostname',
		'port',
		'ssl',
		'username',
		'password',
		'active',
		'created_at',
		'updated_at',
	);
}
