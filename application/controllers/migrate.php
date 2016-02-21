<?php

/**
 * Class Migrate
 *
 * @property CI_Loader          $load
 * @property CI_Input           $input
 * @property CI_Session         $session
 * @property CI_Config          $config
 * @property CI_Form_validation $form_validation
 * @property CI_URI             $uri
 * @property CI_Migration       $migration
 */
class Migrate extends CI_Controller
{
	/**
	 * Migrate constructor
	 */
	public function __construct()
	{
		parent::__construct();
		if (!$this->input->is_cli_request()) {
			show_error('Migration should be called from CLI.');
		}
		$this->load->library('migration');
	}

	public function current()
	{
		$this->migration->current();
	}

	public function rollback($version)
	{
		$this->migration->version($version);
	}

	public function latest()
	{
		$this->migration->latest();
	}
}
