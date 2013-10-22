<?php

class Model_Usergroup extends \Model
{
	protected static $_table_name = 'useraccount_usergroups';

	protected static $_properties = array(
		'id',
		'UserAccount_id',
		'UserGroup_id',
		'created_at',
		'updated_at',
	);


}
