<?php

class Model_Nntpgroup extends \Model
{
	protected static $_table_name = 'nntpgroups';

	protected static $_properties = array(
		'id',
		'message_id',
		'title',
		'creation_time',
		'description',
		'created_at',
		'updated_at',
	);


	public static function getAllActive() {

		return \DB::select()
			->from('nntpgroups')
			->join('nntpservers')
			->on('nntpgroups.nntpserver_id', '=', 'nntpservers.id')
			->where('nntpgroups.active', '=', '1')
			->and_where('nntpgroups.active', '=', '1')
			->execute()
			->as_array();
	}

}
