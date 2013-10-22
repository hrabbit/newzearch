<?php

class Model_Useraccount extends \Model
{
	protected static $_table_name = 'useraccounts';

	protected static $_properties = array(
		'id',
		'email',
		'password',
		'active',
		'created_at',
		'updated_at',
	);


}
