<?php

namespace Mattmangoni\NovaBlogifyTool\Bootstrap;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Schema;
use Mattmangoni\NovaBlogifyTool\Resources\Post;
use Mattmangoni\NovaBlogifyTool\Resources\Category;
use Mattmangoni\NovaBlogifyTool\Resources\Comment;
use Mattmangoni\NovaBlogifyTool\Resources\Tag;

class Blogify
{
    public static function isInstalled()
    {
        return Schema::hasTable('posts') && Schema::hasTable('categories') && Schema::hasTable('comments') && Schema::hasTable('tag') && Schema::hasTable('post_tags');
    }

    public static function injectToolResources()
    {
        if (!self::isInstalled()) {
            return;
        }

        Nova::resources([
            Category::class,
            Post::class,
            Comment::class,
            Tag::class
        ]);
    }
}
