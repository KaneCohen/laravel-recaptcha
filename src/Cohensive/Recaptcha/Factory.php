<?php
namespace Cohensive\Recaptcha;

use Captcha\Captcha;
use Illuminate\Foundation\Application as Application;

class Factory
{

	protected $app;
	protected $validator;
	protected $captcha;

	public function __construct(Application $app)
	{
		$this->app = $app;
		$config = $this->app['config'];

		$captcha = new Captcha();
		$captcha->setPublicKey($config->get('recaptcha::publicKey'));
		$captcha->setPrivateKey($config->get('recaptcha::privateKey'));
		$this->captcha = $captcha;
	}

	/**
	 * Handle dynamic calls to class methods.
	 *
	 * @param  string  $method
	 * @param  array   $parameters
	 * @return mixed
	 */
	public function __call($method, $parameters)
	{
		return call_user_func_array(array($this->captcha(), $method), $parameters);
	}

}
