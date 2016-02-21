<?php

require_once __DIR__ . '/../../system/core/Model.php';
require_once __DIR__ . '/./ModelTrait.php';

/**
 * BoardMessage Model Class
 *
 * @property CI_DB_active_record $db
 * @property CI_Loader           $load
 * @property int                 $message_id
 * @property string              $author
 * @property string              $content
 * @property string              $created_at
 * @property string              $updated_at
 *
 */
class BoardMessage extends CI_Model
{
	const TABLE_NAME = 'board_message';
	private static $properties = [
		'message_id',
		'author',
		'content',
		'created_at',
		'updated_at',
	];

	private static $primaryKeys = ['message_id'];

	/**
	 * BoardMessage constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * @param int $count
	 * @return mixed
	 */
	public function get_last_entries($count = 100)
	{
//		return $this->stub_get();
		$query = $this->db->get(self::TABLE_NAME, $count);

		return isset($query->result) > 0 ? $query->result : [];
	}

	/**
	 *
	 */
	public function insert()
	{
		foreach (self::$properties as $column) {
			$this->db->set($column, $this->{$column});
		}
		$this->db->insert(self::TABLE_NAME);
	}

	/**
	 * @return array
	 */
	public function stub_get()
	{
		return ['messages' => ['aaaa', 'bbbb']];
	}

	/**
	 * @param array $data
	 * @return BoardMessage
	 */
	public static function fromArray($data)
	{
		$className = __CLASS__;
		$instance  = new $className;
		foreach (self::$properties as $field) {
			if (array_key_exists($field, $data)) {
				$instance->{$field} = $data[$field];
			}
		}

		return $instance;
	}
}
