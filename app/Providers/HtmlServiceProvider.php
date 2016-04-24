<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 24/04/2016
 * Time: 1:53
 */

namespace Calls\Providers;

use Collective\Html\HtmlServiceProvider as CollectiveHtmlServiceProvider;
use Calls\Components\HtmlBuilder;

class HtmlServiceProvider extends CollectiveHtmlServiceProvider
{

    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->singleton('html', function ($app) {
            return new HtmlBuilder($app['url'], $app['view']);
        });
    }


}