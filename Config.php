<?php namespace Model\CSRF;

use Model\Core\Module_Config;

class Config extends Module_Config
{
	public $configurable = false;

	/**
	 * Rules for fake js file
	 *
	 * @return array
	 */
	public function getRules(): array
	{
		return [
			'rules' => [
				'csrf.js',
			],
			'controllers' => [
				'CSRF',
			],
		];
	}

	public function getConfigData(): ?array
	{
		return [];
	}
}
