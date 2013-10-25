<?php

class Model_Systemsetting extends \Model
{
	protected static $_table_name = 'systemsettings';

	protected static $_properties = array(
		'id',
		'key',
		'value',
		'created_at',
		'updated_at',
	);

    public static function add($key = string, $value = string)
    {
        // This is bad, we need it to update, not delete and re-add.
        // self::delete($key);
        // \DB::insert('systemsettings')
        //     ->set(array(
        //         $key => $value,
        //         'updated_at' => date('Y-m-d H:i:s'),
        //     ))
        //     ->execute();

    }

    public static function remove($key = string)
    {
        \DB::delete()
            ->from('systemsettings')
            ->where('key', '=', $key)
            ->limit(1)
            ->execute();
    }

    public static function getAll()
    {
        $result = \DB::select(
                'key',
                'value',
                'updated_at',
                'created_at'
            )
            ->from('systemsettings')
            ->execute()
            ->as_array();

        $data = array();
        foreach($result as $row)
        {
            $data[$row['key']]['value'] = $row['value'];
            $data[$row['key']]['updated_at'] = $row['updated_at'];
            $data[$row['key']]['created_at'] = $row['created_at'];
        }
        return $data;
    }

    public static function get($key = string)
    {
        return \DB::select(array(
                'value',
                'updated_at',
                'created_by',
            ))
            ->from('systemsettings')
            ->where('key', '=', $key)
            ->limit(1)
            ->execute()
            ->current();
    }
}
