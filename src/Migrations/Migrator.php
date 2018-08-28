<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

use Mattmangoni\NovaBlogifyTool\Migrations\PostMigration;
use Mattmangoni\NovaBlogifyTool\Migrations\CategoryMigration;
use Mattmangoni\NovaBlogifyTool\Migrations\CommentMigration;
use Mattmangoni\NovaBlogifyTool\Migrations\TagMigration;

class Migrator
{
    public function getMigrations()
    {
        return [
            'categories' => new CategoryMigration,
            'posts' => new PostMigration,
            'comments' => new CommentMigration,
            'tags' => new TagMigration,
        ];
    }
}
