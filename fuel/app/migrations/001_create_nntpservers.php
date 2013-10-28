<?php

namespace Fuel\Migrations;

class Create_nntpservers
{
	public function up()
	{
		\DBUtil::create_table('nntpservers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'hostname' => array('constraint' => 255, 'type' => 'varchar'),
			'port' => array('constraint' => 11, 'type' => 'int'),
			'ssl' => array('constraint' => 255, 'type' => 'varchar'),
			'username' => array('constraint' => 255, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'active' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
		
		\DB::insert('nntpservers')->set(array(
			'hostname' => 'us.news.astraweb.com',
			'port' => '119',
			'ssl' => '',
			'username' => '',
			'password' => '',
			'active' => 1,
 		))->execute();
	}

	public function down()
	{
		\DBUtil::drop_table('nntpservers');
	}
}