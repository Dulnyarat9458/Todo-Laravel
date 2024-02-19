<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Resources\UserResource;


use App\Http\Resources\UserCollection;
use App\Models\User;

use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    return UserResource::collection(User::all());
});

Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});

Route::post('/users', [TodoController::class, 'getUsersByLimit']);

// Route::get('/users', function () {
//     return new UserCollection(User::paginate());
// });



// Route::get('/users', function () {
//     return UserResource::collection(User::all()->keyBy->id);
//     // return new UserCollection(User::all());
// });