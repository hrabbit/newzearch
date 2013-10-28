<?php

namespace Fuel\Migrations;

class Create_nntpgroups
{
	public function up()
	{
		\DBUtil::create_table('nntpgroups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'nntpserver_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'current_article' => array('constraint' => 11, 'type' => 'int'),
			'active' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));

		\DB::insert('nntpgroups')->set(array(
			'nntpserver_id' => 1,
			'name' => 'a.b.hdtv.x264',
			'current_article' => 1,
			'active' => 1,
 		))->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('nntpgroups');
	}
}
