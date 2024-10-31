<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return redirect('/empleados');
});
Route::resource('empleados', EmpleadoController::class);
