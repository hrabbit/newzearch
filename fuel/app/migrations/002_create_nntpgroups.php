<?php

namespace Fuel\Migrations;

class Create_nntpgroups
{
	public function up()
	{
		\DBUtil::create_table('nntpgroups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'nntpserver_id' => array('constraint' => 11, 'type' => 'int'),
			'message_id' => array('constraint' => 255, 'type' => 'varchar'),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'creation_time' => array('type' => 'datetime'),
			'description' => array('type' => 'text'),
			'active' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('nntpgroups');
	}
}
