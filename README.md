# reCaptcha for Laravel 4

## Installation

Add following require to your `composer.json` file:

~~~
    "cohensive/recaptcha": "dev-master"
~~~

Then run `composer install` or `composer update` to download it and autoload.

In `providers` array you need to add new package:

~~~
'providers' => array(

	//...
	'Cohensive\Recaptcha\RecaptchaServiceProvider',
	//...

)
~~~

In aliases:

~~~
'aliases' => array(

	//...
	'Recaptcha' => 'Cohensive\Recaptcha\Facades\Recaptcha'
	//...

)
~~~

And after all that, we need to add config file, which will hold our private and public keys.
Run following line in command line:

~~~
	php artisan config:publish cohensive/recaptcha
~~~
