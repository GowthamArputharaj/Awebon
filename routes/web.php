<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwebonController;

Route::get('/', [AwebonController::class, 'index']);