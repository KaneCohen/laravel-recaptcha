<?php
namespace Cohensive\Recaptcha;

use Illuminate\Foundation\Application;
use Cohensive\Validation\Factory as Validator;

class RecaptchaValidator
{

	protected $app;
	protected $validator;

	public function __construct(Application $app, Validator $validator)
	{
		$validator->extend('recaptcha', function($attribute, $value, $parameters, $validator) use ($app) {
			$response = $app['recaptcha']->check();
			return $response->isValid();
		});
	}

}
