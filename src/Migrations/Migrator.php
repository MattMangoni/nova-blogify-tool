<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

class Migrator
{
    public function getMigrations()
    {
        $prefix = config('nova-blogify.table_prefix');

        return [
            $prefix.'categories' => new CategoryMigration,
            $prefix.'posts' => new PostMigration,
            $prefix.'comments' => new CommentMigration,
            $prefix.'tags' => new TagMigration,
            $prefix.'post_tag' => new PostTagPivotMigration,
            'foreign' => new ForeignKeyMigration,
        ];
    }
}
