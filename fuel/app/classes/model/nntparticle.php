<?php

class Model_Nntparticle extends \Model
{
	protected static $_table_name = 'nntparticles';

	protected static $_properties = array(
		'id',
		'message_id',
		'title',
		'creation_time',
		'description',
		'created_at',
		'updated_at',
	);

    public static processArticle($header)
    {
        
        \DB::insert
        
        
    }

}
