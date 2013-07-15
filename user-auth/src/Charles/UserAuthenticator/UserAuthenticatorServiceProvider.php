<?php namespace Charles\UserAuthenticator;

use Illuminate\Support\ServiceProvider;

class UserAuthenticatorServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *UserAuthenticator
	 * @return void
	 */
	public function register()
	{
        $this->app['UserAuthenticator'] = $this->app->share(function($app)
        {
            return new UserAuthenticator(/*$app['user']*/);
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('UserAuthenticator');
	}

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('charles/UserAuthenticator');
    }

}