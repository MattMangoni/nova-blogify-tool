<?php

namespace Mattmangoni\NovaBlogifyTool\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Mattmangoni\NovaBlogifyTool\BlogifyResponder;

class ResetController extends BlogifyBaseController
{
    protected function processTask() : void
    {
        foreach ($this->migrations as $tableName => $migrationClass) {
            if (! Schema::hasTable($tableName)) {
                $this->messages[] = BlogifyResponder::resetTableNotFound($tableName);
            }

            try {
                $this->truncateTable($tableName);
                $this->messages[] = BlogifyResponder::resetSuccess($tableName);
            } catch (\Exception $e) {
                $this->messages[] = BlogifyResponder::resetFailure($tableName);
            }
        }
    }

    protected function truncateTable($tableName)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table($tableName)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
