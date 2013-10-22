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


	public static getAllActive() {

		$query = DB::select('hostname','port','ssl','username','password','name','current_article')->from('NNTPGroup');
		$query->join('NNTPServer');
		$query->on('NNTPGroup.NNTPServer_id', '=', 'NNTPServer.id');
		$query->where('NNTPGroup.active', '=', '1');
		$query->and_where('NNTPGroup.active', '=', '1');
		return $query->execute()->as_array();
	}

}
