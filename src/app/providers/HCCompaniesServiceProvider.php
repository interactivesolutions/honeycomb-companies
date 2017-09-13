<?php

namespace interactivesolutions\honeycombcompanies\app\providers;

use interactivesolutions\honeycombcore\providers\HCBaseServiceProvider;

class HCCompaniesServiceProvider extends HCBaseServiceProvider
{
    protected $homeDirectory = __DIR__;

    protected $commands = [];

    protected $namespace = 'interactivesolutions\honeycombcompanies\app\http\controllers';

    public $serviceProviderNameSpace = 'HCCompanies';
}





