<?php
namespace Cohensive\Recaptcha;

use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{

	/*
	 *Bootstrap application events
	 */
	public function boot()
	{
    $this->package('cohensive/recaptcha');
    // Register the package configuration with the loader.
    $this->app['config']->package('cohensive/recaptcha', __DIR__.'/../config');
		$this->registerRecaptchaValidator();
	}


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['recaptcha'] = $this->app->share(function($app)
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
