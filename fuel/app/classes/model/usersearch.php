<?php

class Model_Usersearch extends \Model
{
	protected static $_table_name = 'usersearches';

	protected static $_properties = array(
		'id',
		'UserAccount_id',
		'search',
		'rows',
		'active',
		'created_at',
		'updated_at',
	);


}
