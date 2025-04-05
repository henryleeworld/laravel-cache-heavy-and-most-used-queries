<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;

Route::get('articles/', [ArticlesController::class, 'show']);
