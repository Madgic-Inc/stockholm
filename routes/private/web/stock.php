<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stock\StockController;


Route::resource('stock',StockController::class);
