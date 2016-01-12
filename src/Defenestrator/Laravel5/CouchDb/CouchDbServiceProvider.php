<?php namespace Defenestrator\Laravel\Couchdb;
use \Illuminate\Support\ServiceProvider;

class CouchDbServiceProvider extends ServiceProvider {
    /**
     * Register the provider.
     *
     * @return void
     */
    public function register()
    {
        // Add couchdb to the database manager
        $this->app['db']->extend('couchdb', function($config)
        {
            return new CouchdbConnection($config);
        });
    }
}