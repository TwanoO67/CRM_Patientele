<?php

namespace TwanooLib;

use Illuminate\Html\HtmlServiceProvider;

class TwanooHtmlServiceProvider extends HtmlServiceProvider {

    public function boot()
    {
        App::bind('form', function()
        {
            return new TwanooLib\FormPlus;
        });
        
        parent::boot();
    }

}

?>