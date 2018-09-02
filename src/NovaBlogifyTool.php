<?php

namespace Mattmangoni\NovaBlogifyTool;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaBlogifyTool extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-blogify-tool', __DIR__.'/../dist/js/tool.js');
        Nova::style('nova-blogify-tool', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-blogify-tool::navigation');
    }
}
