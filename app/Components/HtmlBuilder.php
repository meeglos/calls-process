<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 24/04/2016
 * Time: 1:26
 */

namespace Calls\Components;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;

class HtmlBuilder extends CollectiveHtmlBuilder
{

    public function menu()
    {
        return view('partials.menu');
    }

}