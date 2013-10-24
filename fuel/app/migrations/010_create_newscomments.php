<?php

namespace Fuel\Migrations;

class Create_newscomments
{
	public function up()
	{
		\DBUtil::create_table('newscomments', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'useraccount_id' => array('constraint' => 11, 'type' => 'int'),
			'body' => array('type' => 'text'),
			'active' => array('type' => 'boolean'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('newscomments');
	}
}