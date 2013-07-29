# Google API Client Service Provider (Silex)
==================================================================

A Silex Service Provider for Google API Client  
[https://github.com/stansmet/google-api-php-client](https://github.com/stansmet/google-api-php-client)

## Installation
--------------

[Composer](http://getcomposer.org) is currently the only way to install the 
google api client into your project.

### Create your composer.json file

      {
          "require": {
              "stansmet/google-api-service-provider": "*@dev"
          }
      }

### Download composer into your application root

      $ curl -s http://getcomposer.org/installer | php

### Install your dependencies

      $ php composer.phar install
 
## Usage
---------

Register the service provider

      $app->register(new Stansmet\GoogleApi\Silex\GoogleApiServiceProvider(), array(
          'google.api.key_file' => __DIR__.'/../google.p12',
          'google.api.scopes' => ['http://www.google.com/calendar/feeds/'],
          'google.api.service_account_name' => '474314885299@developer.gserviceaccount.com',
      ));


Get an instance of the [GoogleApi\Client](https://github.com/stansmet/google-api-php-client/blob/master/src/GoogleApi/Client.php

      $client = $app['google.api.client'];

## Links
--------
https://code.google.com/p/google-api-php-client/wiki/OAuth2#Service_Accounts
