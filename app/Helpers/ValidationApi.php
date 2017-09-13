<?php
namespace App\Helpers;

use Validator;

class ValidationApi
{
	/**
	 * see https://laravel.com/docs/5.5/validation
	 */

	/**
	 * validation for action test param
	 * @param  array  $data formData
	 * @return Validator
	 */
	public static function validateTestParam(array $data)
	{
		return Validator::make($data, [
			'id' => 'required'
		]);
	}

	/**
	 * validation for action login
	 * @param  array  $data formData
	 * @return Validator
	 */
	public static function validateLogin(array $data)
	{
		return Validator::make($data, [
			'email' => 'required|email',
			'password' => 'required|min:8'
		]);
	}
}