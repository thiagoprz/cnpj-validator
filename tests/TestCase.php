<?php

namespace Thiagoprz\CnpjValidator\Test;

use Thiagoprz\CnpjValidator\CnpjServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{

    /**
     * Load package service provider
     * @param \Illuminate\Foundation\Application $app
     * @return \Thiagoprz\CnpjValidator\CnpjServiceProvider
     */
    protected function getPackageProviders($app)
    {
        return [CnpjServiceProvider::class];
    }

}