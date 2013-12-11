<?php namespace Cohensive\Recaptcha;

use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{

	public function boot()
	{
		$this->registerRecaptchaValidator();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
    $this->package('cohensive/recaptcha');
		$this->app->bindShared('recaptcha', function($app)
		{
			return new Factory($app);
		});
	}

	/**
	 * Register validator.
	 *
	 * @return void
	 */
	protected function registerRecaptchaValidator()
	{
		new RecaptchaValidator($this->app, $this->app['validator']);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('recaptcha');
	}

}
