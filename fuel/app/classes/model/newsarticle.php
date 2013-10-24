<?php

class Model_Newsarticle extends \Model
{
	protected static $_table_name = 'newsarticles';

	protected static $_properties = array(
		'id',
		'subject',
		'body',
		'active',
		'created_at',
		'updated_at',
	);


}
