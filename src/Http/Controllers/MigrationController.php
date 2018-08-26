<?php

namespace Mattmangoni\NovaBlogifyTool\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Schema;
use Mattmangoni\NovaBlogifyTool\BlogifyResponder;
use Mattmangoni\NovaBlogifyTool\Http\Controllers\BlogifyBaseController;

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
