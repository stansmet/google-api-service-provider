<?php

namespace Stansmet\GoogleApi\Silex;

use Silex\Application;
use Silex\ServiceProviderInterface;
use GoogleApi\Client;
use GoogleApi\Auth\AssertionCredentials;

class GoogleApiServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['google.api.client'] = $app->share(function() use ($app) {
            if (isset($app['google.api.key_file'])) {
                $key = file_get_contents($app['google.api.key_file']);
            } else {
                throw new Exception("Key file must be defined", 1);            
            }
            
            if (isset($app['google.api.service_account_name'])) {
                $accountName = $app['google.api.service_account_name'];
            } else {
                throw new Exception("Service account name must be defined", 1);            
            }

            if (isset($app['google.api.scopes']) 
                && is_array($app['google.api.scopes'])) {

                $scopes = $app['google.api.scopes'];
            } else {
                throw new Exception("Api scopes must be defined", 1);            
            }

            $credentials = new AssertionCredentials($accountName, $scopes, $key);
            $client = new Client;
            $client->setAssertionCredentials($credentials);
            $client->setUseObjects(true);

            return $client;
        });
    }

    public function boot(Application $app)
    {}
}
