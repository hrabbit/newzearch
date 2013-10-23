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
        // have to remember what is passed in through header
        
        \DB::insert($_table_name)
            ->columns(array('message_id','title','creation_time','description'))
        ->values(array('blah','blah'));
        
        
    }

}
