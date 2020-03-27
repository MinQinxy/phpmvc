<?php
use Vender\Facade\Route;


Route::view("/cal/index.html","index");
Route::get("/cal/cal.html","CalController@index");