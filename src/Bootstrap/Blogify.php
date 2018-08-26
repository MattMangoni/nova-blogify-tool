<?php

namespace Mattmangoni\NovaBlogifyTool\Bootstrap;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Schema;
use Mattmangoni\NovaBlogifyTool\Resources\Post;
use Mattmangoni\NovaBlogifyTool\Resources\Category;

class Blogify
{
    public static function isInstalled()
    {
        return Schema::hasTable('posts') && Schema::hasTable('categories');
    }

    public static function injectToolResources()
    {
        if (!self::isInstalled()) {
            return;
        }

        Nova::resources([
            Category::class,
            Post::class
        ]);
    }
}
