<?php

namespace Mattmangoni\NovaBlogifyTool\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Mattmangoni\NovaBlogifyTool\Migrations\Migrator;

class BlogifyBaseController
{
    /**
     * Migrations list.
     *
     * @var array
     */
    protected $migrations = [];

    /**
     * Response messages.
     *
     * @var array
     */
    protected $messages = [];

    /**
     * Instantiate controller.
     *
     * @param Migrator $migrator
     */
    public function __construct(Migrator $migrator)
    {
        $this->migrations = $migrator->getMigrations();
    }

    /**
     * Undocumented function.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function execute() : JsonResponse
    {
        $this->processTask();

        return response()->json(['messages' => $this->messages], 200);
    }
}
