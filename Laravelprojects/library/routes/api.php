<?php

use App\Http\Controllers\AuthorController;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/author/{id}',function($id){ return new AuthorResource(Author::findOrFail($id));
});

Route::get('authors',function(){
                     return AuthorResource::collection(Author::all());
});

Route::put('/author/{id}', [AuthorController::class,'update']);
Route::delete('/author/{id}', [AuthorController::class,'destroy']);
Route::post('/authors',[AuthorController::class,'store']);
