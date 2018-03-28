<?php namespace Model\CSRF\Controllers;

use Model\Core\Controller;

class CSRFController extends Controller {
	public function init(){
		header('Content-Type: application/javascript');
	}

	public function index(){
		?>var c_id = '<?=entities($this->model->_CSRF->getToken())?>';
<?php
		die();
	}
}
