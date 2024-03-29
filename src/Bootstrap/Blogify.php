<?php

namespace Mattmangoni\NovaBlogifyTool\Bootstrap;

use Illuminate\Support\Facades\Schema;
use Laravel\Nova\Nova;
use Mattmangoni\NovaBlogifyTool\Resources\Category;
use Mattmangoni\NovaBlogifyTool\Resources\Comment;
use Mattmangoni\NovaBlogifyTool\Resources\Image;
use Mattmangoni\NovaBlogifyTool\Resources\Post;
use Mattmangoni\NovaBlogifyTool\Resources\Tag;

class Blogify
{
    public static function isInstalled()
    {
        return
            Schema::hasTable('posts') &&
            Schema::hasTable('categories') &&
            Schema::hasTable('comments') &&
            Schema::hasTable('tags') &&
            Schema::hasTable('post_tag') &&
            Schema::hasTable('images');
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
            Image::class,
        ]);
    }
}
