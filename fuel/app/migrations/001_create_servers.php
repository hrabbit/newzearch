<?php

namespace Fuel\Migrations;

class Create_servers
{
	public function up()
	{
		\DBUtil::create_table('servers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'hostname' => array('constraint' => 255, 'type' => 'varchar'),
			'port' => array('constraint' => 11, 'type' => 'int'),
			'ssl' => array('constraint' => 40, 'type' => 'varchar'),
			'username' => array('constraint' => 255, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'active' => array('type' => 'boolean'),
			'created_at' => array('type' => 'date', 'null' => true),
			'updated_at' => array('type' => 'date', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('servers');
	}
}