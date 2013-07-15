<?php
/**
 * Created by JetBrains PhpStorm.
 * User: charles
 * Date: 7/11/13
 * Time: 9:03 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Charles\UserAuthenticator;

use Illuminate\Support\ServiceProvider;

class UserSessionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('user_session',function()
        {
            return new UserSession();
        });
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
