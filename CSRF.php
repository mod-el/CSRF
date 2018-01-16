<?php namespace Model\CSRF;

use Model\Core\Module;

class CSRF extends Module
{
	/**
	 * @param array $options
	 */
	public function init(array $options)
	{
		if (!isset($_SESSION['csrf']))
			$_SESSION['csrf'] = md5(uniqid(rand(), true));

		$this->model->addJS('csrf.js');
	}

	/**
	 * Checks if the token was sent and it's correct
	 *
	 * @return bool
	 */
	public function checkCsrf()
	{
		if (isset($_POST['c_id']) and $_POST['c_id'] === $_SESSION['csrf'])
			return true;
		else
			return false;
	}

	/**
	 * Print a hidden input with the token as value
	 */
	public function csrfInput()
	{
		echo '<input type="hidden" name="c_id" value="' . entities($_SESSION['csrf']) . '" />';
	}

	/**
	 * @param array $request
	 * @param string $rule
	 * @return array
	 */
	public function getController(array $request, string $rule){
		return [
			'controller' => 'CSRF',
		];
	}
}
