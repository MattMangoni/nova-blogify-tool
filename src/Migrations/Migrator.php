<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

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
