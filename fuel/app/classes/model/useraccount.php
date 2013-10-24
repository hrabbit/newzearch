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

    public function authenticate($email = string, $password = string)
    {
        $result = \DB::select('useraccount.*', 'usergroup.level', 'usergroup.name')
            ->from('useraccount')
            ->join('usergroup')
            ->on('useraccount.usergroup_id', '=', 'usergroup.id')
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->where('active', '=', 1)
            ->limit(1)
            ->execute();
    }
}
