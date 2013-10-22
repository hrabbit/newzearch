<?php

class Model_Usersetting extends \Model
{
	protected static $_table_name = 'usersettings';

	protected static $_properties = array(
		'id',
		'UserAcount_id',
		'key',
		'value',
		'created_at',
		'updated_at',
	);


}
