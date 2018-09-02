<?php

namespace Mattmangoni\NovaBlogifyTool;

class BlogifyResponder
{
    public static function tableAlreadyCreated($tableName): string
    {
        return "'{$tableName}' table found. Migration skipped.";
    }

    public static function migrationSuccess($tableName): string
    {
        return "The '{$tableName}' table has been successfully created.";
    }

    public static function migrationFailure($tableName): string
    {
        return "Unable to create '{$tableName}' table.";
    }

    ////////////////

    public static function resetTableNotFound($tableName): string
    {
        return "'{$tableName}' not table found. Skipped.";
    }

    public static function resetSuccess($tableName): string
    {
        return "The '{$tableName}' table has been successfully emptied.";
    }

    public static function resetFailure($tableName): string
    {
        return "Unable to reset '{$tableName}' table.";
    }

    ////////////////

    public static function deleteTableNotFound($tableName): string
    {
        return "'{$tableName}' not table found. Skipped.";
    }

    public static function deleteSuccess($tableName): string
    {
        return "The '{$tableName}' table has been successfully deleted.";
    }

    public static function deleteFailure($tableName): string
    {
        return "Unable to delete '{$tableName}' table.";
    }
}
