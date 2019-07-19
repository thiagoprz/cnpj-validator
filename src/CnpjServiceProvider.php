<?php

namespace Thiagoprz\CnpjValidator;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

/**
 * Class CnpjServiceProvider
 * @package Thiagoprz\CnpjValidator
 */
class CnpjServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/lang/', 'cnpj-validator');
        $message = trans('validation.cnpj') != 'validation.cnpj' ? trans('validation.cnpj') : trans('cnpj-validator::validation.cnpj');
        Validator::extend('cnpj', 'Thiagoprz\CnpjValidator\Cnpj@passes', $message);
    }

}