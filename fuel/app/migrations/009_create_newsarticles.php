<?php

namespace Fuel\Migrations;

class Create_newsarticles
{
	public function up()
	{
		\DBUtil::create_table('newsarticles', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'subject' => array('constraint' => 255, 'type' => 'varchar'),
			'body' => array('type' => 'text'),
			'active' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('newsarticles');
	}
}