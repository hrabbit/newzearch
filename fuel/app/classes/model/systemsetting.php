<?php

class Model_Systemsetting extends \Model
{
	protected static $_table_name = 'systemsettings';
	protected static $_properties = array(
		'id',
		'key',
		'value',
		'created_at',
		'updated_at',
	);

}
