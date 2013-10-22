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


	public static function getAllActive()
	{
		return \DB::select()
			->from('NNTPGroups')
			->join('NNTPServers')
			->on('NNTPGroups.NNTPServers_id', '=', 'NNTPServers.id')
			->where(...)
			->execute()
			->as_array();
	}
}
