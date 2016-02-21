<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Class Welcome
 *
 * @property CI_Loader          $load
 * @property CI_Input           $input
 * @property CI_Session         $session
 * @property CI_Config          $config
 * @property CI_Form_validation $form_validation
 * @property CI_URI             $uri
 */
class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('BoardMessage');
		$bm       = new BoardMessage();
		$messages = $bm->get_last_entries();
//		$this->load->view('welcome_message', $messages);
		$this->load->view('board', $messages);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */