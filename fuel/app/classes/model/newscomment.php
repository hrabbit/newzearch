<?php

class Model_Newscomment extends \Model
{
	protected static $_table_name = 'newscomments';

	protected static $_properties = array(
		'id',
		'useraccount_id',
		'body',
		'active',
		'created_at',
		'updated_at',
	);

}
