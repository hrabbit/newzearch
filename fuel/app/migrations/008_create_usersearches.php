<?php

namespace Fuel\Migrations;

class Create_usersearches
{
	public function up()
	{
		\DBUtil::create_table('usersearches', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'UserAccount_id' => array('constraint' => 11, 'type' => 'int'),
			'search' => array('type' => 'text'),
			'rows' => array('constraint' => 11, 'type' => 'int'),
			'active' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('usersearches');
	}
}