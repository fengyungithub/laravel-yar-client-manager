<?php

namespace Fengyun\YarClient;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class YarClientServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Publish config file setup
		$this->publishes([
			__DIR__.'/config.php' => config_path('yar_client.php'),
		]);

		// Register Facades
        $loader = AliasLoader::getInstance();
        $loader->alias('YarClient', 'Fengyun\YarClient\YarClientFacade');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Shared Client
		$this->app->singleton('YarClient', function($app)
		{
			$client = new YarClientManager();
			return $client;
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('YarClient');
	}

}
