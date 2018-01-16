<?php namespace Model\CSRF\Controllers;

use Model\Core\Controller;

class CSRFController extends Controller {
	public function init(){
		header('Content-Type: application/javascript');
	}

	public function index(){
		?>var c_id = '<?=entities($_SESSION['csrf'] ?? '')?>';
<?php
		die();
	}
}
