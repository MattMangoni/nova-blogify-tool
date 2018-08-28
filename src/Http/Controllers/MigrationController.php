<?php

namespace Mattmangoni\NovaBlogifyTool\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Mattmangoni\NovaBlogifyTool\BlogifyResponder;

class MigrationController extends BlogifyBaseController
{
    protected function processTask() : void
    {
        foreach ($this->migrations as $tableName => $migrationClass) {
            if (Schema::hasTable($tableName)) {
                $this->messages[] = BlogifyResponder::tableAlreadyCreated($tableName);
            }

            try {
                $migrationClass->up();
                $this->messages[] = BlogifyResponder::migrationSuccess($tableName);
            } catch (\Exception $e) {
                $this->messages[] = BlogifyResponder::migrationFailure($tableName);
            }
        }
    }
}
