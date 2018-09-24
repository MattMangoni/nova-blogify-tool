<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Mattmangoni\NovaBlogifyTool\Bootstrap;

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

Route::get('/check-installation', function () {
    return response()->json(['installation_status' => (new Bootstrap())->isInstalled()], 200);
});

Route::post('/install', function () {
    try {
        Artisan::call('migrate');

        return response()->json(['message' => 'Blogify successfully installed'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Unable to run Blogify\'s migrations.'], 200);
    }
});
