<?php

namespace Digitalmiig\Usuariomiig;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class UsuariomiigServiceProvider extends ServiceProvider
{
	
	 public function register()
	{
		$this->app->bind('usuariomiig', function($app) {
			return new Usuariomiig;

		});
	}

	public function boot()
	{
		require __DIR__ . '/Http/routes.php';


		$this->loadViewsFrom(__DIR__ . '/../views', 'usuariomiig');

		$this->publishes([

			__DIR__ . '/migrations/2015_07_25_000000_create_usuario_table.php' => base_path('database/migrations/2015_07_25_000000_create_usuario_table.php'),

			]);


	}

}
