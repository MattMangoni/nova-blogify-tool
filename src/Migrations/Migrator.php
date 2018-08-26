<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

use Mattmangoni\NovaBlogifyTool\Migrations\PostMigration;
use Mattmangoni\NovaBlogifyTool\Migrations\CategoryMigration;

class Migrator
{
    public function getMigrations()
    {
        return [
            'categories' => new CategoryMigration,
            'posts' => new PostMigration
        ];
    }
}
