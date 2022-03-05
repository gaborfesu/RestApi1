<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;

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
// Route::get('/employees', function(){
//     return 'employees';
// });
// Route::get('/employees', function(){
//     return Employee::all();
// });
// Route::post('/employees',function(){
//     return Employee::create([
//         'name' => 'Rágó Ferenc',
//         'city' => 'Szolnok',
//         'salary' => 2873000
//     ]);
// });
// Route::resource('/employees', EmployeeController::class);
// Route::get('/employees/search/{name}', [EmployeeController::class, 'search']);
// Route::get('/products',[EmployeeController::class,'index']);
// Route::post('/employees',[EmployeeController::class,'store']);
Route::resource('/employees', EmployeeController::class);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/employees/search/{name}', [EmployeeController::class, 'search']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
