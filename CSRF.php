<?php namespace Model\CSRF;

use Model\Core\Module;

class CSRF extends Module
{
	/**
	 * @param array $options
	 */
	public function init(array $options)
	{
		$this->model->addJS('csrf.js?' . time(), [
			'cacheable' => false,
		]);
	}

	/**
	 * Checks if the token was sent and it's correct
	 *
	 * @return bool
	 */
	public function checkCsrf(): bool
	{
		if (isset($_REQUEST['c_id']) and $_REQUEST['c_id'] === $this->getToken())
			return true;
		else
			return false;
	}

	/**
	 * Print a hidden input with the token as value
	 */
	public function csrfInput()
	{
		echo '<input type="hidden" name="c_id" value="' . entities($this->getToken()) . '" />';
	}

	/**
	 * Gets the CSRF token
	 */
	public function getToken(): string
	{
		return $this->model->_RandToken->getToken('CSRF');
	}

	/**
	 * @param array $request
	 * @param string $rule
	 * @return array
	 */
	public function getController(array $request, string $rule): ?array
	{
		return [
			'controller' => 'CSRF',
		];
	}
}
