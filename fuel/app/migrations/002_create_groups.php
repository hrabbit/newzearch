<?php

namespace Fuel\Migrations;

class Create_groups
{
	public function up()
	{
		\DBUtil::create_table('groups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'server_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'current_article' => array('constraint' => 11, 'type' => 'int'),
			'active' => array('type' => 'boolean'),
			'created_at' => array('type' => 'date', 'null' => true),
			'updated_at' => array('type' => 'date', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('groups');
	}
}