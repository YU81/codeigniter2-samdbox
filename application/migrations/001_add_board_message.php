<?php


/**
 * @property CI_DB_forge $dbforge
 */
class Migration_Add_Board_Message extends CI_Migration
{
	// See http://qiita.com/shikataka/items/d3fd15f650f85a8ce118
	public function __construct(array $config)
	{
		parent::__construct($config);
	}

	public function up()
	{
		$this->dbforge->add_field([
			'message_id' => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'author'     => [
				'type'       => 'VARCHAR',
				'constraint' => '65535',
			],
			'content'    => [
				'type'       => 'VARCHAR',
				'constraint' => '65535',
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			],
		]);
		$this->dbforge->add_key('message_id', true);
		$this->dbforge->create_table('board_message');
	}

	public function down()
	{
	}
}