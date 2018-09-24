<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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

Route::delete('/reset-content', function () {
    try {
        foreach (Bootstrap::$expectedTables as $table) {
            DB::table($table)->truncate();
        }

        return response()->json(['message' => 'Blog content reset complete!'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Unable to reset the blog content.'], 500);
    }
});
