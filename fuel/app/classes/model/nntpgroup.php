<?php

class Model_Nntpgroup extends \Model
{
	protected static $_table_name = 'nntpgroups';

	protected static $_properties = array(
		'id',
		,
		'message_id',
		'title',
		'creation_time',
		'description',
		'created_at',
		'updated_at',
	);


	public static function getAllActive() {

		return \DB::select()
			->from('NNTPGroup')
			->join('NNTPServer')
			->on('NNTPGroup.NNTPServer_id', '=', 'NNTPServer.id')
			->where('NNTPGroup.active', '=', '1')
			->and_where('NNTPGroup.active', '=', '1')
			->execute()
			->as_array();
	}

}
