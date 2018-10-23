<?php

namespace Mattmangoni\NovaBlogifyTool\Bootstrap;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Schema;
use Mattmangoni\NovaBlogifyTool\Resources\Tag;
use Mattmangoni\NovaBlogifyTool\Resources\Post;
use Mattmangoni\NovaBlogifyTool\Resources\Comment;
use Mattmangoni\NovaBlogifyTool\Resources\Category;

class Blogify
{
    public static function isInstalled()
    {
        $prefix = config('nova-blogify.table_prefix');

        return
            Schema::hasTable($prefix.'posts') &&
            Schema::hasTable($prefix.'categories') &&
            Schema::hasTable($prefix.'comments') &&
            Schema::hasTable($prefix.'tags') &&
            Schema::hasTable($prefix.'post_tag');
    }

    public static function injectToolResources()
    {
        if (! self::isInstalled()) {
            return;
        }

        Nova::resources([
            Category::class,
            Post::class,
            Comment::class,
            Tag::class,
        ]);
    }
}
