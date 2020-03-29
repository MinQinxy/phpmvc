<?php
use Vender\Facade\Route;


Route::view("/cal/index.html","cal");
Route::get("/cal/cal.html","CalController@index");

Route::get("/fs/fs.html","wfs.WebFileSystemController@index");