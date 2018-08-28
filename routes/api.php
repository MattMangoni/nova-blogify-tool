<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mattmangoni\NovaBlogifyTool\Bootstrap\Blogify;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/check-migrations', function (Request $request) {
    return response()->json([
        'installed' => Blogify::isInstalled(),
    ], 200);
});

Route::get('/migrate-tables', 'Mattmangoni\NovaBlogifyTool\Http\Controllers\MigrationController@execute');
Route::get('/reset-content', 'Mattmangoni\NovaBlogifyTool\Http\Controllers\ResetController@execute');
Route::get('/uninstall', 'Mattmangoni\NovaBlogifyTool\Http\Controllers\UninstallController@execute');
